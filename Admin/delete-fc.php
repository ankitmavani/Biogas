<?php
include "config.php";

$fc_id = $_GET['id'];

$sql1 = "SELECT * FROM flow_chart WHERE fc_id = {$fc_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/flow chart/" . $row['fc_image']);

$sql = "DELETE FROM flow_chart WHERE fc_id = {$fc_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/flow-chart.php");
} else {
    echo "Query Failed";
}