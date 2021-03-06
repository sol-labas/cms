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

        $post_category_id = (int)$_GET['category'];
        $query = "SELECT * FROM post WHERE post_category_id = $post_category_id";
        $all_post = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($all_post)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 100);
            ?>
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
            <hr>
            <img class="img-responsive" src="./images/<?php echo $post_image ?>" alt="">
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>


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