<?php
include "config.php";

$in_id = $_GET['id'];


$sql = "DELETE FROM inqry WHERE in_id = {$in_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/Dashboard.php");
} else {
    echo "Query Failed";
}