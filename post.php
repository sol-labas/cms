<?php
include_once "includes/header.php";
include_once "includes/db.php";
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

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
            }

            $query = "SELECT * FROM post WHERE post_id = {$the_post_id}";

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
                <a class="btn btn-primary" href="#">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                <?php
            }
            if (isset($_POST['create_comm'])) {
                $the_post_id = $_GET['p_id'];
                $comm_author = $_POST['comm_author'];
                $comm_email = $_POST['comm_email'];
                $comm_content = $_POST['comm_content'];

                $query = "INSERT INTO comment (comm_post_id, comm_author, comm_email, comm_content, comm_date) VALUES ('{$the_post_id}', '{$comm_author}', '{$comm_email}', '{$comm_content}', now()) ";
                $create_comm_query = mysqli_query($conn, $query);

                confirm($create_comm_query);

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

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>


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