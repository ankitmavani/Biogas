<!doctype html>
<html lang="en">

<?php include "header.php"; ?>

<body>
    <?php include "nav-bar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include "slide-bar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                <h2>All inquiry</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <?php

                        include "config.php";

                        $sql = "SELECT * FROM inqry ORDER BY in_id DESC";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if (mysqli_num_rows($result) > 0) {
                            $index = 1;
                        ?>
                        <thead>
                            <tr>
                                <th>index</th>
                                <th>name</th>
                                <th>Date to Add</th>
                                <th>desc</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $index;
                                            $index++; ?></td>
                                <td><?php echo $row['in_title'] ?></td>
                                <td><?php echo $row['in_date'] ?></td>
                                <td style="max-width: 300px;"><?php echo $row['in_desc'] ?></td>
                                <td>
                                    <a class="text-decoration-none text-black" href="mailto:<?php echo $row['in_email']; ?>">
                                    <?php echo $row['in_email'] ?></a></td>
                                <td><a class="text-decoration-none text-black" href="tel:<?php echo $row['in_phone']; ?>"><?php echo $row['in_phone'] ?></a></td>
                                <td><a onclick="return confirm('Please click on OK to continue.');"
                                        href="delete-in.php?id=<?php echo $row['in_id']; ?>">DELETE</a></td>
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