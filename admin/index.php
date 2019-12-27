<?php
include_once "includes/admin_header.php";
?>
    <div id="wrapper">

<?php
if ($conn) {
    echo "connected";
}
?>

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
                        <?php echo $_SESSION['username']; ?>

                        <small>Authors</small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $query = "SELECT * FROM post";
                                    $select_all_posts = mysqli_query($conn, $query);
                                    $posts_count = mysqli_num_rows($select_all_posts);

                                    ?>

                                    <div class='huge'><?php echo $posts_count; ?></div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM comment";
                                    $select_all_comm = mysqli_query($conn, $query);
                                    $comm_count = mysqli_num_rows($select_all_comm);

                                    ?>

                                    <div class='huge'><?php echo $comm_count; ?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM user";
                                    $select_all_users = mysqli_query($conn, $query);
                                    $user_count = mysqli_num_rows($select_all_users);

                                    ?>
                                    <div class='huge'><?php echo $user_count; ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM category";
                                    $select_all_categories = mysqli_query($conn, $query);
                                    $category_count = mysqli_num_rows($select_all_categories);

                                    ?>
                                    <div class='huge'><?php echo $category_count; ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--/.row -->

            <?php
            $query = "SELECT * FROM post WHERE post_status = 'published' ";
            $select_published_posts = mysqli_query($conn, $query);
            $posts_published_count = mysqli_num_rows($select_published_posts);

            $query = "SELECT * FROM post WHERE post_status = 'draft' ";
            $select_draft_posts = mysqli_query($conn, $query);
            $posts_draft_count = mysqli_num_rows($select_draft_posts);

            $query = "SELECT * FROM comment WHERE comm_status = 'unapproved' ";
            $select_unapproved_comm = mysqli_query($conn, $query);
            $comm_draft_count = mysqli_num_rows($select_unapproved_comm);

            $query = "SELECT * FROM user WHERE role = 'subscriber' ";
            $select_subscriber_users = mysqli_query($conn, $query);
            $user_subscriber_count = mysqli_num_rows($select_subscriber_users);

            ?>

            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {'packages': ['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['', ''],

                            <?php
                            $element_text = ['All posts','Active posts', 'Draft posts', 'Comments', 'Pending comments', 'Users', 'Subscribers', 'Categories' ];
                            $element_count = [$posts_count, $posts_published_count, $posts_draft_count, $comm_count, $comm_draft_count, $user_count, $user_subscriber_count, $category_count];

                            for ($i = 0; $i < 8; $i++) {
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            }
                            ?>

                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php
include_once "includes/admin_footer.php";
?>