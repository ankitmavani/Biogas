<?php
include "config.php";

$sb_id = $_GET['id'];

$sql1 = "SELECT * FROM services_bio WHERE sb_id = {$sb_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/services bio/" . $row['sb_image']);

$sql = "DELETE FROM services_bio WHERE sb_id = {$sb_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/services-biogas-plat.php");
} else {
    echo "Query Failed";
}