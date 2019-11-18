<?php
include_once "includes/admin_header.php";
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php
    include_once "includes/admin_navigation.php";
    ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Authors</small>
                    </h1>
                    <div class="col-xs-6">
                        <?php
                        if(isset($_POST['submit'])){
                            $cat_title = $_POST['cat_title'];
                            if ($cat_title==''||empty($cat_title)){
                                echo "Fill the field";
                            }else{
                                $query = "INSERT INTO category(cat_title) VALUE ('$cat_title')";
                                $create_cat = mysqli_query($conn, $query);
                                if(!$create_cat){
                                    die("Query failed") . mysqli_error($conn);
                                }

                            }
                        }

                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>

                    </div><!--Add Category Form-->
                    <div class="col-xs-6">
                        <?php

                        $query = "SELECT * FROM category";
                        $select_cat = mysqli_query($conn, $query);

                        ?>


                        <table class="table table-bordered table-hover">
                            <thread>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                </tr>
                            </thread>
                            <tbody>
                            <tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($select_cat)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php
        include_once "includes/admin_footer.php";
        ?>
