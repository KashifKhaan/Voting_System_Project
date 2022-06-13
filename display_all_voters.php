<html>
    <head>
        <title></title>
    </head>
    <body>
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
        <center><tt ><b>All Voters</b></font</tt></center>
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
</body>
</html>