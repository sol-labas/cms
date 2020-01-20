<?php
session_start();
include_once "includes/header.php";
include_once "includes/db.php";
include_once "admin/function.php";
?>
    <!-- Navigation -->
<?php
include_once "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php

            if(isset($_GET['p_id'])){
                $the_post_id = $_GET['p_id'];
                $the_post_author = $_GET['author'];
            }


            $the_post_id = (int)$_GET['p_id'];
            $the_post_author = mysqli_real_escape_string($conn, $the_post_author);
            $query = "SELECT * FROM post WHERE post_author = '{$the_post_author}'";
            $all_post = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($all_post)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>


                <?php
            }
            if (isset($_POST['create_comm'])) {
                $the_post_id = (int)$_GET['p_id'];
                $comm_author = mysqli_escape_string($conn, $_POST['comm_author']);
                $comm_email = mysqli_escape_string($conn, $_POST['comm_email']);
                $comm_content = mysqli_escape_string($conn, $_POST['comm_content']);

                if (!empty($comm_author) && (!empty($comm_content)) && (!empty($comm_email))) {

                    $query = "INSERT INTO comment (comm_post_id, comm_author, comm_email, comm_content, comm_date) VALUES ('{$the_post_id}', '{$comm_author}', '{$comm_email}', '{$comm_content}', now()) ";
                    $create_comm_query = mysqli_query($conn, $query);

                    confirm($create_comm_query);

                    $query = "UPDATE post SET post_comm_count = post_comm_count+1 WHERE post_id = {$the_post_id}";
                    $update_comm_count = mysqli_query($conn, $query);

                    confirm($update_comm_count);
                } else {
                    echo "<script>alert('Fields cannot be empty!')</script>";
                }
            }

            ?>
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="comm_author">Name</label>
                        <input type="text" class="form-control" name="comm_author">
                    </div>

                    <div class="form-group">
                        <label for="comm_email">Email</label>
                        <input type="email" class="form-control" name="comm_email">
                    </div>

                    <div class="form-group">
                        <label for="comm_content">Comment</label>
                        <textarea class="form-control" name="comm_content" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comm" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Posted Comments -->


            <?php
            $query = "SELECT * FROM comment WHERE comm_post_id = {$the_post_id} AND comm_status = 'approved' ORDER BY comm_id DESC";
            $select_comm_query = mysqli_query($conn, $query);
            if (!$select_comm_query) {
                die ('Query failed' . mysqli_error($conn));
            }
            while ($row = mysqli_fetch_array($select_comm_query)) {
                $comm_date = $row['comm_date'];
                $comm_content = $row['comm_content'];
                $comm_author = $row['comm_author'];
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $comm_author; ?>
                            <small><?php echo $comm_date; ?></small>
                        </h4>
                        <?php echo $comm_content; ?>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        include_once "includes/sidebar.php";
        ?>

    </div>
    <!-- /.row -->

    <hr>
<?php
include_once "includes/footer.php";
?>