<?php
include "config.php";

$cer_id = $_GET['id'];

$sql1 = "SELECT * FROM certificate WHERE cer_id = {$cer_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/certificate/" . $row['cer_image']);

$sql = "DELETE FROM certificate WHERE cer_id = {$cer_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/certificate.php");
} else {
    echo "Query Failed";
}