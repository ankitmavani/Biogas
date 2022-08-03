<?php
include "config.php";

$cpm_id = $_GET['id'];

$sql1 = "SELECT * FROM client_project_management WHERE cpm_id = {$cpm_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/client project management/" . $row['cpm_image']);

$sql = "DELETE FROM client_project_management WHERE cpm_id = {$cpm_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/client-project-management.php");
} else {
    echo "Query Failed";
}