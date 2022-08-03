<?php

include "Admin/config.php";

$in_name = mysqli_real_escape_string($conn, $_POST['name']);
$in_phone = mysqli_real_escape_string($conn, $_POST['phone']);
$in_email = mysqli_real_escape_string($conn, $_POST['email']);
$in_com = mysqli_real_escape_string($conn, $_POST['comment']);
$date = date("d M, Y");


$sql = "INSERT INTO inqry(in_title,in_desc,in_date,in_phone,in_email)
              VALUES('{$in_name}','{$in_com}','{$date}','{$in_phone}','{$in_email}');";

if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/index.php");
} else {
    echo "<div class='alert alert-danger'>Query Failed.</div>";
}