<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<body>
    <?php include "nav-bar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "slide-bar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="row mt-3">
                    <h2 class="col-6">Services Machinary</h2>
                    <div class="col-6 text-right"> <a class="btn btn-primary text-right" href="add-sm.php"
                            role="button">Add
                            services machinary</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <?php

                        include "config.php";

                        $sql = "SELECT * FROM services_machinary ORDER BY sm_id DESC";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if (mysqli_num_rows($result) > 0) {
                            $index = 1;
                        ?>
                        <thead>
                            <tr>
                                <th>index</th>
                                <th>Title</th>
                                <th>Date to Add</th>
                                <th>Add by admin</th>
                                <th>update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $index;
                                            $index++; ?></td>
                                <td><?php echo $row['sm_title'] ?></td>
                                <td><?php echo $row['sm_date'] ?></td>
                                <td><?php echo $row['sm_add_by'] ?></td>
                                <td><a href="update-sm.php?id=<?php echo $row['sm_id']; ?>">UPDATE</a></td>
                                <td><a onclick="return confirm('Please click on OK to continue.');"
                                        href="delete-sm.php?id=<?php echo $row['sm_id']; ?>">DELETE</a></td>
                            </tr>

                        </tbody><?php } ?>
                        <?php } else {
                            echo "<h3>No Results Found.</h3>";
                        } ?>
                    </table>
            </main>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>