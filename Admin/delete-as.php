<?php
include "config.php";

$as_id = $_GET['id'];

$sql1 = "SELECT * FROM about_as WHERE as_id = {$as_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/About as/" . $row['as_image']);

$sql = "DELETE FROM about_as WHERE as_id = {$as_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/About-us.php");
} else {
    echo "Query Failed";
}