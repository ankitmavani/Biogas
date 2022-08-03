<?php
include "config.php";

$post_id = $_GET['id'];

$sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
$result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/post/" . $row['post_image']);

$sql = "DELETE FROM post WHERE post_id = {$post_id};";


if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/Admin/post.php");
} else {
    echo "Query Failed";
}