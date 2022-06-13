<?php
include_once 'connect.php';
$query = ("select * from Votes");
$result = mysqli_query($con, $query) or die ( mysqli_error());
error_reporting(0);
?>
<html>
<head>
    <title>Data Table</title>
    <!-- <link rel="stylesheet" type="text/css" href="table_style.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor="yellow">
<center>
<table cellpadding="5" cellspacing="4" border="2" width="90%">
<tr>
    <Td colspan="8" bgcolor="#kkkk3" aling="Center"> <Font size=+3 color="#cccccc">
        <center><tt ><b>This Is A Data Table</b></font</tt></center>
    <tr style="background-color= skyblue">
        <th bgcolor="pink">Emp_Id</th>
        <th bgcolor="pink">Name</th>
        <th bgcolor="pink">Address</th>
        <th bgcolor="pink">Id_Card</th>
        <th bgcolor="pink">Image</th>
        <th colspan="2" width="2" bgcolor="pink">Operations</th> 
        <th bgcolor="pink">Total Votes</th>
    </tr>


<?php

$res = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{$name=$_['name'];
   
    $name = $_REQUEST['name'];
    $address = $_REQUEST['address'];
    $id_card = $_REQUEST['id_card'];
    $image=$_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];  

    if (isset($image)) {

        if (!empty($image)) {
            $location = '../uploads/';
        }

        if (move_uploaded_file($tempname,"images/$image")) {
            echo  'Updated' ;
        }

    } else {
        echo 'please uploaded';
    }

$update = "update Votes set name='".$name."',address='".$address."', id_card='".$id_card."',
image='".$image."' where name='".$name."'";
$res=mysqli_query($conn,$update) or die(mysqli_error());
}else {
?>
 <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name"value="<?php echo $res['name'];?>"  placeholder="Enter Your Name">
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" value="<?php echo $res['address'];?>" placeholder="Enter Your Address">
            </div>
            <div>
                <label for="id_card">Id_Card</label>
                <input type="text" name="id_card" value="<?php echo $res['id_card'];?>" placeholder="Enter Your Id Card Number" >
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" value="<?php echo $image;?>" name="image">
                
            </div>
            <div class="btn">
                <button style="background:pink; width:100px; height:30px; border-radius:14px;" style="width:40px:" type="submit" name="update">Update</button>
            </div>
        </form>
    </div>


    <?php }   
    ?>

                    <?php
                
                ?>


    
</table>
</center>
</body>
</html>

