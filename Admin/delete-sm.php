<?php
include "config.php";

$sm_id = $_GET['id'];

$sql1 = "SELECT * FROM services_machinary WHERE sm_id = {$sm_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/services machinary/" . $row['sm_image']);

$sql = "DELETE FROM services_machinary WHERE sm_id = {$sm_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/services-machinary.php");
} else {
    echo "Query Failed";
}