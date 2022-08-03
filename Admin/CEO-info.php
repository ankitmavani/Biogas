<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<body>
    <?php include "nav-bar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "slide-bar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <h2>CEO info</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <?php

                        include "config.php";

                        $sql = "SELECT * FROM ceo_info";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if (mysqli_num_rows($result) > 0) {
                            $index = 1;

                        ?>
                        <thead>
                            <tr>
                                <th>index</th>
                                <th>Name</th>
                                <th>desc</th>
                                <th>date</th>
                                <th>add_by</th>
                                <?php if ($_SESSION["main_admin"] == 1) { ?>
                                <th>update</th><?php } ?>
                            </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $index;
                                            $index++; ?></td>
                                <td><?php echo $row['CEO_name']; ?></td>
                                <td><?php echo $row['CEO_desc']; ?></td>
                                <td><?php echo $row['CEO_date']; ?></td>
                                <td><?php echo $row['CEO_add_by']; ?></td>
                                <?php if ($_SESSION["main_admin"] == 1) { ?>
                                <td><a href="update-ceo.php?id=<?php echo $row['CEO_id']; ?>">UPDATE</a></td><?php } ?>
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