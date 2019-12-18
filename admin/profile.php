<?php
include_once "includes/admin_header.php";
if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username = '{$username}'";
    $select_profile = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($select_profile)) {
        $user_id = (int)$row['user_id'];
        $username = $row['username'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $user_image = $row['user_image'];
        $role = $row['role'];
        $password = $row['password'];

    }


}

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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" value="<?php echo $first_name; ?>" class="form-control"
                                   name="first_name">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" value="<?php echo $last_name; ?>" class="form-control" name="last_name">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <br>
                            <select name="role" id="role">

                                <option value='admin'><?php echo strtoupper($role); ?></option>
                                <?php
                                if ($role == 'admin') {
                                    echo "<option value='subscriber'>subscriber</option>>";
                                } else {

                                    echo "<option value='admin'>admin</option>>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="user_image">Avatar</label>
                            <input type="file" name="user_image">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" value="<?php echo $password; ?>" class="form-control"
                                   name="password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>


                    </form>


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
