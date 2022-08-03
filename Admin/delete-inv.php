<?php
include "config.php";

$inv_id = $_GET['id'];

$sql1 = "SELECT * FROM investor WHERE inv_id = {$inv_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/investor/" . $row['inv_image']);

$sql = "DELETE FROM investor WHERE inv_id = {$inv_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/investor.php");
} else {
    echo "Query Failed";
}