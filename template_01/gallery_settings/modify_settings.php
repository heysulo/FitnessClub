<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 11/13/16
 * Time: 1:17 AM
 */
$conn = null;
try{
    $conn = mysqli_connect("localhost","root","mysqler","fitnessclub");
}catch (mysqli_sql_exception $e){
    echo "Error occured";
    die();
}

if ($conn == null) {
    echo "Error occured";
    die();
}

if (isset($_POST['code'])==true){
    if ($_POST['code']=="publish") {
        if (isset($_POST['id']) == true) {
            $sql = "SELECT * FROM gallery_items WHERE gallery_item_id=" . mysqli_escape_string($conn, $_POST['id']);
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)) {
                if (isset($_POST['value']) == true) {
                    $sql = "UPDATE gallery_items SET publish=" . $_POST['value'] . " WHERE gallery_item_id=" . $_POST['id'];
                    $res = mysqli_query($conn, $sql);
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "E1x04";
                    }
                } else {
                    echo "E1x03";
                }
            } else {
                echo "E1x02";
            }

        } else {
            echo "E1x01";
        }
    }else if ($_POST['code']=="drop"){
        if (isset($_POST['id']) == true) {
            $sql = "SELECT * FROM gallery_items WHERE gallery_item_id=" . mysqli_escape_string($conn, $_POST['id']);
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)) {
                $fn = mysqli_fetch_assoc($res);
                $sql = "DELETE FROM gallery_items WHERE gallery_item_id=" . $_POST['id'];
                $res = mysqli_query($conn, $sql);
                if ($conn->query($sql) === TRUE) {
                    unlink("img/".$fn['image']);
                    echo "success";
                } else {
                    echo "E2x04";
                }
            } else {
                echo "E2x02";
            }

        } else {
            echo "E2x01";
        }

    }else{
        echo $_POST['code'];
    }

}else{
    echo "E0x01";
}