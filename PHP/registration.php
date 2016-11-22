<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "gym";


// Create connection
$connection = new mysqli($server, $user, $password, $db);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT id FROM register WHERE id = (SELECT MAX(id) FROM register)";
$result = $connection->query($sql);
$id = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"] + 1;
    }
} else {
    $id = 1;
}

$name = $_POST["name"];
$bday = $_POST["bday"];
$nic = $_POST["nic"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$class = $_POST["class"];
$package = $_POST["package"];
$password = $_POST["pass"];

$sql = "INSERT INTO register VALUES('".$id."','".$name."','".$bday."','".$nic."','".$address."','".$phone."','".$gender."','".$email."','".$class."','".$package."')";

$sql2 = "INSERT INTO user VALUES('".$id."','".$email."','".$password."')";

if (($connection->query($sql) === TRUE) AND ( $connection->query($sql2) === TRUE)) {
    echo "<script>
			alert('Member added !!');
			window.location.href='../View/login.html';
		</script>";
} else {
    echo "<script>
			alert('Member not added !!');
			window.location.href='../View/registration.html';
		</script>";

}

$connection->close();
?>