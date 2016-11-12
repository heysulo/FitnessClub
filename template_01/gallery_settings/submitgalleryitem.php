<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 11/12/16
 * Time: 10:23 PM
 */
function diewithhonour($s = 0){
    header('Location: '.'gallery_settings.php?s='.$s);
    die("");
}
$conn = null;
try{
    $conn = mysqli_connect("localhost","root","mysqler","fitnessclub");
}catch (mysqli_sql_exception $e){
    diewithhonour();
}

if ($conn == null) {
    diewithhonour();
}
$title = null;
$desc = null;
//value validation
if (isset($_POST['title']) == false || $_POST['title']==""){
    diewithhonour();
}else{
    $title = mysqli_escape_string($conn,$_POST['title']);
}

if (isset($_POST['description']) == false || $_POST['description']==""){
    diewithhonour();
}else{
    $desc = mysqli_escape_string($conn,$_POST['description']);
}

if ($title == null or $desc == null){
    diewithhonour();
}

//upload
$target_dir = "img/";
$target_file = md5(($_FILES["fileToUpload"]["name"]))."_".md5(date('Y-m-d h:i:sa')).".jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        diewithhonour("valid");
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        diewithhonour("size");
        $uploadOk = 0;
    }

    if($imageFileType != "jpg") {
        diewithhonour("notjpeg");
        $uploadOk = 0;
    }
}
echo $target_file;

if ($uploadOk == 0) {
    diewithhonour();
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$target_file)) {
        $uploadOk = 1;
    } else {
        diewithhonour("upload");
        $uploadOk = 2;
    }
}

$publish = 0;
if (isset($_POST['publish'])){
    $publish = 1;
}



$sql = "INSERT INTO gallery_items (title, description, publish,image)
VALUES ('$title', '$desc', $publish,'$target_file')";

if ($conn->query($sql) === TRUE && $uploadOk==1) {
    header('Location: '.'gallery_settings.php?s=1');
} else {
    if ($uploadOk != 1){
        diewithhonour(3);
    }else {
        diewithhonour(4);

    }
}