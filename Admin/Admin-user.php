<?php 
include "config.php";
?>

<html lang="en">
<?php include "header.php"; ?>

<body>
    <?php include "nav-bar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "slide-bar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                <div class="row mt-3">
                    <h2 class="col-6">Admin user</h2>
                    <?php if ($_SESSION["main_admin"] == 1) { ?>
                    <div class="col-6 text-right"> <a class="btn btn-primary text-right" href="add-user.php"
                            role="button">Add
                            users</a></div><?php } ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <?php

                        

                        $sql = "SELECT * FROM admin_user ORDER BY admin_id DESC";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if (mysqli_num_rows($result) > 0) {
                            $index = 1;
                        ?>
                        <thead>
                            <tr>
                                <th>index</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>E mail</th>
                                <th>Date to Add</th>
                                <th>Add by admin</th>

                                <?php if ($_SESSION["main_admin"] == 1) { ?>
                                <th>update</th>
                                <th>Delete</th><?php } ?>
                            </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $index;
                                            $index++; ?></td>
                                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['add_by'] ?></td>
                                 <?php

                                        if ($_SESSION["main_admin"] == 1) {
                                            if ($row['username'] == "Akshar biogas") {
                                            } else {
                                        ?>
                                <td><a href="update-user.php?id=<?php echo $row['admin_id']; ?>">UPDATE</a></td>
                                <td><a onclick="return confirm('Please click on OK to continue.');"
                                        href="delete-user.php?id=<?php echo $row['admin_id']; ?>">DEELET</a></td>
<?php } } ?>
                                
                            </tr>

                        </tbody><?php } ?>
                        <?php } ?>
                    </table>

            </main>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>