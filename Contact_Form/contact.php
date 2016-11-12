<?php
$servername = "localhost";
$username = "heshan";
$password = "eradb";
$dbname = "gym";


if(isset($_POST['clear'])) 
{ 
    header("Location: contactForm.html");
    
} else {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT message_id FROM web_message WHERE message_id = (SELECT MAX(message_id) FROM web_message);";
    $result = $conn->query($sql);
    $mess_id = 0;
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $mess_id = $row["message_id"]+1;
        }
    } else {
        $mess_id = 1;
    }
    
    $message = $_POST["message"];
    $email = $_POST["email"];
    
    if ( ($email != NULL) and ($message != NULL))
    {
    
        $sql = "INSERT INTO web_message (message_id, name, email,phone,message)
                VALUES ('"
                        .$mess_id."','"
                        .$_POST["name"]."','"
                        .$email."','"
                        .$_POST["phone"]."','"
                        .$message
                        ."')";
        
        
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $question = $_POST["question"];
        
        if (isset($_POST['plan']))
        {
            $workout_plan = true;
        } else {
            $workout_plan = false;
        }

        
        
        
        if ( ($age != NULL) and ($gender != NULL) and ($weight != NULL) and ($height != NULL) and ($question != NULL) )
        {
            $sql2 = "INSERT INTO web_question (message_id, age, gender,weight,height,workout_plan,question)
                     VALUES ('"
                            .$mess_id."','"
                            .$age."','"
                            .$gender."','"
                            .$weight."','"
                            .$height."','"
                            .$workout_plan."','"
                            .$question
                            ."')";
            
            if ( ($conn->query($sql) === TRUE) and ($conn->query($sql2) === TRUE) ) 
            {
                echo $_POST["name"].",<br> Your message successfully submitted!";
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }                
                            
        } else {
            
            if ($conn->query($sql) === TRUE) 
            {
                echo $_POST["name"].",<br> Your message successfully submitted!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        }
    } else {
        
        //header("Location: contactForm.html");
        echo "PLEASE FILL A VALID EMAIL AND THE MESSAGE!";
            
    }
    
    $conn->close(); 
}

?>
