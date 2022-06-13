<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="front_style.css"> -->
    <style>
        /* * {
    background: lightpink:
} */

body {
    /* background: pink; */
    /* background: linear-gradient(to top, pink 20%, yellow 80%); */
    background-image: radial-gradient(at 64% 69%, hsla(199, 91%, 54%, 1) 0, hsla(199, 91%, 54%, 0) 50%),
    radial-gradient(at 13% 89%, hsla(328, 88%, 58%, 1) 0, hsla(328, 88%, 58%, 0) 50%),
    radial-gradient(at 7% 66%, hsla(255, 93%, 55%, 1) 0, hsla(255, 93%, 55%, 0) 50%),
    radial-gradient(at 4% 92%, hsla(276, 93%, 62%, 1) 0, hsla(276, 93%, 62%, 0) 50%),
    radial-gradient(at 46% 51%, hsla(48, 87%, 68%, 1) 0, hsla(48, 87%, 68%, 0) 50%),
    radial-gradient(at 82% 97%, hsla(159, 91%, 55%, 1) 0, hsla(159, 91%, 55%, 0) 50%),
    radial-gradient(at 3% 54%, hsla(258, 89%, 63%, 1) 0, hsla(258, 89%, 63%, 0) 50%),
    radial-gradient(at 80% 73%, hsla(83, 85%, 53%, 1) 0, hsla(83, 85%, 53%, 0) 50%),
    radial-gradient(at 46% 31%, hsla(309, 88%, 51%, 1) 0, hsla(309, 88%, 51%, 0) 50%),
    radial-gradient(at 88% 52%, hsla(346, 87%, 60%, 1) 0, hsla(346, 87%, 60%, 0) 50%),
    radial-gradient(at 31% 84%, hsla(320, 95%, 62%, 1) 0, hsla(320, 95%, 62%, 0) 50%),
    radial-gradient(at 46% 26%, hsla(277, 90%, 69%, 1) 0, hsla(277, 90%, 69%, 0) 50%),
    radial-gradient(at 36% 56%, hsla(176, 90%, 57%, 1) 0, hsla(176, 90%, 57%, 0) 50%),
    radial-gradient(at 59% 34%, hsla(256, 89%, 57%, 1) 0, hsla(256, 89%, 57%, 0) 50%);
      /* display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      height: 100vh;
      background-color: #f1f1f1; */
}


.container {
    padding-top: 200px;
    background: blue;
    justify-content: flex-end;
}

table {
    background-color: yellow;
    color: black;
}

td {
    color: white;
}

button {
    text-align: center;
    padding-right: 10px;
}

button:hover{
    border-radius: 15px;
    border: 2px dashed;
    /* transform: translate(0, -10%); */
	background-color: black;
    color: white;
}


    </style>
    <title>Front Page</title>
</head>
<body>

<center><h1>Welcome To The Voting Center</h1></center>

<?php
include_once("connect.php");
?>

<div class="container"></div>
    <table id="table" border="2" cellspacing="5" cellpadding="6" align="center" width="40%">
        <tr>
        <th><h2>Registration</h2></th>
        <th><h2>Display-Records</h2></th>
        </tr>
        <tr>
            <td><button><a href="index.php"><h3>Register Yourself</h3></a></button></td>
            <td><button><a href="display_all_voters.php"><h3>See All The Voters</h3></a></button></td>
        </tr>
    </table>
</div>
</body>


</html>
