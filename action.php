<?php
include_once("connect.php");


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id_card = $_POST['id_card'];
    $image = $_FILES['image'];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];


    if($name == '' || $address == '' || $id_card == '') {
        echo "<script>alert('Any Field Is Empty')</script>";
        exit();
    }

    if($image_type =="image/jpeg" || $image_type == "image/png" || $image_type == "image/gif") {
        if($image_size <= 5000000) {
            move_uploaded_file($image_tmp,"images/$image_name");     // from----> to
        } else {
            echo"<script>alert('Image Size is Too Large, Only 5 Mb File Is Allowed')</script>";
        }
    } else {
        echo"<script>alert('image type is invalid')</script>";
    }

    $query = "insert into Votes (name,address,id_card,image) values ('$name', '$address', '$id_card', '$image_name')";

    $result = mysqli_query($con, $query);
    
     if ($result) {
        echo "<center><h1>Data Has Been Inserted Successfully</h1></center>";
    } else {
        echo "<center><h1>Data Submission Failed</h1></center>";
    }
}   



if(isset($_POST['delete'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id_card = $_POST['id_card'];
    $image = $_FILES['image'];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $query = "insert into Votes (name,address,id_card,image) values ('$name', '$address', '$id_card', '$image_name')";
    $result = mysqli_query($con, $query);
    
     if ($result) {
        echo "<center><h1>Data Has Been Inserted Successfully</h1></center>";
    } else {
        echo "<center><h1>Data Submission Failed</h1></center>";
    }

}



















include_once('data_table.php');
?>