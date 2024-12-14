<?php include "./includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
         <?php include "./includes/admin_navigation.php"; ?>
            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Welcome to Admin
                                <small>Author</small>
                            </h1>
                            <div class="col-xs-6">
                            <?php
                            //INSERT INTO CATEGORIES
                                if (isset($_POST['submit'])) {
                                    $cat_title = $_POST['cat_title'];
                                    if (empty($cat_title)) {
                                        echo "This field should not be empty!";
                                    } else {
                                        $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
                                        $result = mysqli_query($connection, $query);
                                        if (!$result) {
                                            die("Query Failed!".mysqli_error($connection));
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cat_title">Add Category</label>
                                        <input type="text" class="form-control" name="cat_title" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category" />
                                    </div>
                                </form>
                                <?php include "./includes/update_categories.php"; ?>
                            </div>
                            <div class="col-xs-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- FIND ALL CATEGORIES -->
                                        <?php
                                        $query = "SELECT * FROM categories";
                                        $result = mysqli_query($connection, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<tr>";
                                            echo "<td>$cat_id</td>";
                                            echo "<td>$cat_title</td>";
                                            echo "<td><a href='categories.php?update={$cat_id}'>UPDATE</a></td>";
                                            echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
                                            echo "</tr>";
                                        } 
                                        ?>
                                        <!-- <tr>
                                            <td>BUS 410</td>
                                            <td>ACC 423</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <?php
                                //DELETE CATEGORY
                                if (isset($_GET['delete'])) {
                                    $delete_id = $_GET['delete'];
                                    $query = "DELETE FROM categories WHERE cat_id = $delete_id";
                                    $result = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

    </div>
        <!-- /#page-wrapper -->
<?php include "./includes/admin_footer.php"; ?>
