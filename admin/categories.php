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
                        <?php insert_categories(); ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>
                        <?php

                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/edit_categories.php";
                        }


                        ?>

                    </div><!--Add Category Form-->
                    <div class="col-xs-6">

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
                                select_all_cat();
                                delete_cat();
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
