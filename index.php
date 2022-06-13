<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        button:hover{
            border-radius: 15px;
            border: 2px dashed;
            /* transform: translate(0, -10%); */
            background-color: black;
            color: blue;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
}

    </style>
    <title>Form</title>
</head>
<body>
    <u><h1>Register Your Vote</h1></u>
    <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Search</label>
                <input type="text" name="search" placeholder="Search By Id">
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter Your Name">
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Enter Your Address">
            </div>
            <div>
                <label for="id_card">Id_Card</label>
                <input type="text" name="id_card" placeholder="Enter Your Id Card Number" >
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image">
                
            </div>
            <div class="btn">
                <button style="background:pink; width:140px; height:50px; border-radius:14px;" type="submit" name="submit">Submit</button>
                <a href="searched_data.php"><button style="background:pink; width:140px; height:50px; border-radius:14px;" type="submit" name="searchdata">Search Record</button></a>
            </div>
        </form>
    </div>
</body>
</html>



<!-- Insertion -->
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
// include_once('data_table.php');
?>











<!-- displaying the records -->
<?php
include_once 'connect.php';
$query = ("select * from Votes");
$result = mysqli_query($con, $query);
?>
<html>
<head>
    <title>Data Table</title>
    <!-- <link rel="stylesheet" type="text/css" href="table_style.css"> -->
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
<?php
$counter = 0;
while ($row = mysqli_fetch_array($result)) {                    //returns array of string

    $id = $row['Id'];
    $name = $row['name'];
    $address = $row['address'];
    $id_card = $row['id_card'];
    $image = $row['image'];

    
?>
    </tr>
    <tr bgcolor="yellow">
        <b>
        <td><?php echo $row['Id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['id_card']; ?></td>
        <td align="center"><img style="border-radius:100px;"style="border-radius=30px" align="center" width="130" src="images/<?php echo $image;?>" alt="Image Not found"></td>
        <td> <button style="background:pink; width:70px; height:30px; border-radius:14px;"><a href="delete.php?id=<?php echo $row['Id']; ?>"> Delete</a></button> </td>
        <td> <button style="background:pink; width:70px; height:30px; border-radius:14px;"><a href="update.php?id=<?php echo $row['Id']; ?>"> Update</a></button> </td>
        <td>Total Votes</td>
        <!-- <td><a href="update.php?name=$row[name]&address=$row[address]&id_card=$row[id_card]">Update</a></td> -->

        <!-- <td><input type="button" name="edit" value="Edit" style="width:100px;"></td>  -->
        
        </b>
    </tr>
    <?php
    $counter++;
    }
    ?>
    
</table>
</center>




<!-- data searching code -->
<center>
<table cellpadding="5" cellspacing="4" border="2" width="90%">
<tr>
    <Td colspan="8" bgcolor="#kkkk3" aling="Center"> <Font size=+3 color="#cccccc">
        <center><tt ><b>Search Result</b></font</tt></center>
    <tr style="background-color= skyblue">
        <th bgcolor="pink">Emp_Id</th>
        <th bgcolor="pink">Name</th>
        <th bgcolor="pink">Address</th>
        <th bgcolor="pink">Id_Card</th>
        <th bgcolor="pink">Image</th>
<?php
include_once("connect.php");
if(isset($_POST['searchdata'])){
    $search = $_POST['search'];
    $query = "SELECT * FROM Votes where Id = '$search'";
    $data = mysqli_query($con, $query);

    if(mysqli_num_rows($data) > 0)
    {

    $row = mysqli_fetch_assoc($data);
    $id = $row['Id'];
    $name = $row['name'];
    $address = $row['address'];
    $id_card = $row['id_card'];
    $image = $row['image'];
    }else {
        echo "Undifined ID";
            $id = "";
            $name = "";
            $address = "";
    }
?>

</tr>
    <tr bgcolor="yellow">
        <b>
        <td><?php echo $row['Id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['id_card']; ?></td>
        <td align="center"><img style="border-radius:100px;"style="border-radius=30px" style="border-radius=30px" align="center" width="100" src="images/<?php echo $image;?>" alt="Image Not found"></td>        
        </b>
    </tr>
    <?php
    }
    ?>
    
</table>
</center>
</body>
</html>
