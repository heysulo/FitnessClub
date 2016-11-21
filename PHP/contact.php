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
    $date = date("Y-m-d H:i:s");
    
    if ( ($email != NULL) and ($message != NULL))
    {
        
        // Checking for previous messages //
        
        
            $sql = "SELECT message, message_id FROM web_message WHERE email = '".$email."'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $tmp_message =  $row["message"];
                    $message_id = $row["message_id"];
                }
                
                $sql2 = "UPDATE web_message SET ".
                        "name='".$_POST["name"]."',".
                        "phone='".$_POST["phone"]."',".
                        "message='".$message."',".
                        "date='".$date."'".
                        "WHERE message_id='".$message_id."'";
                        
                $age = $_POST["age"];
                $gender = $_POST["gender"];
                $weight = $_POST["weight"];
                $height = $_POST["height"];
                $question = $_POST["question"];        
                        
                $sql3 = "UPDATE web_question SET "
                        ."age='".$age."',"
                        ."gender='".$gender."',"
                        ."weight='".$weight."',"
                        ."height='".$height."',"
                        ."workout_plan='".$workout_plan."',"
                        ."question='".$question
                        ."' WHERE message_id='".$message_id."'";        
 
                if ( ($age != NULL) and ($gender != NULL) and ($weight != NULL) and ($height != NULL) and ($question != NULL) )
                {
 
                    if ( ($conn->query($sql2) === TRUE) and ($conn->query($sql3) === TRUE) ) 
                    {
                        echo "<h1>".$_POST["name"].",<br> Your message successfully submitted!</h1>";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    
                } else if ($conn->query($sql2) === TRUE) {
                    echo "<h1>".$_POST["name"].",<br> Your message successfully submitted!</h1>";
                } else {
                    echo "Error updating record: " . $conn->error;
                } 
                
            } else {
            
            $sql = "INSERT INTO web_message (message_id, name, email,phone,message,date)
                    VALUES ('"
                            .$mess_id."','"
                            .$_POST["name"]."','"
                            .$email."','"
                            .$_POST["phone"]."','"
                            .$message."','"
                            .$date
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
                    echo "<h1>".$_POST["name"].",<br> Your message successfully submitted!</h1>";
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }                
                                
            } else {
                
                if ($conn->query($sql) === TRUE) 
                {
                    echo "<h1>".$_POST["name"].",<br> Your message successfully submitted!</h1>";
                } else {
                    echo "<h1>Error: " . $sql . "<br>" . $conn->error."</h1>";
                } 
            }
        }
        
    } else {
        
        //header("Location: contactForm.html");
        echo "<h1>PLEASE FILL A VALID EMAIL AND THE MESSAGE!</h1>";
            
    }
    
    $conn->close(); 
}

?>
