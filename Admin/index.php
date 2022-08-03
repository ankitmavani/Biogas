<?php
include "config.php";
session_start();

if (isset($_SESSION["username"])) {
    header("Location: {$hostname}/Admin/Admin-user.php");
}
?>
<?php
if (isset($_POST['login'])) {
    include "config.php";
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo '<div class="alert alert-danger">All Fields must be entered.</div>';
        die();
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5($_POST['password']);

        $sql = "SELECT admin_id, username FROM admin_user WHERE username = '{$username}' AND password= '{$password}'";

        $result = mysqli_query($conn, $sql) or die("Query Failed.");

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
             
                $_SESSION["username"] = $row['username'];
                $_SESSION["admin_id"] = $row['admin_id'];

                if ($row['username'] == "Akshar biogas") {
                    # code...
                    $_SESSION["main_admin"] = 1;
                } else {
                    $_SESSION["main_admin"] = 0;
                }

                header("Location: {$hostname}/Admin/Admin-user.php");
            }
        } else {
            echo "<script type='text/javascript'>alert('username and password not match');</script>";
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Signin Template · Bootstrap</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/all.min.css">
    <script type="text/javascript" src="../assets/js/all.min.js"></script>
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <img class="mb-4" src="../assets/img/akshar-logo.png" alt="" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email address" required
            autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
    </form>

</body>

</html>