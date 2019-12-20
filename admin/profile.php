<?php
include_once "includes/admin_header.php";
if (isset($_SESSION['username'])) {

    $username = mysqli_escape_string($_SESSION['username']);
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
    if (isset($_POST['edit_user'])) {
        $first_name = mysqli_escape_string($_POST['first_name']);
        $last_name = mysqli_escape_string($_POST['last_name']);
        $role = mysqli_escape_string($_POST['role']);
        $username = mysqli_escape_string($_POST['username']);
        $email = mysqli_escape_string($_POST['email']);
        $password = mysqli_escape_string($_POST['password']);


        if (empty($_FILES['user_image'])) {
            $user_image = $row['user_image'];
        } else {
            $user_image = $_FILES['user_image']['name'];
            $user_image_temp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_temp, "../images/$user_image");
        }

        $query = "UPDATE user SET first_name = '{$first_name}', last_name ='{$last_name}', role ='{$role}', username = '{$username}', user_image = '{$user_image}' , email = '{$email}', password ='{$password}' WHERE username = '{$username}'";
        $update_user_query = mysqli_query($conn, $query);

        confirm($update_user_query);
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
