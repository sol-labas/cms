<?php
if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM user WHERE user_id= {$the_user_id}";
    $select_users = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_users)) {
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

if (isset($_POST['edit_user'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    //$post_image = $_FILES['post_image']['name'];
    // $post_image_temp = $_FILES['post_image']['tmp_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //move_uploaded_file($post_image_temp, "../images/$post_image");

    //if (empty($post_image)) {
    //    $query = "SELECT * FROM post WHERE post_id = {$post_id}";
    //   $select_image = mysqli_query($conn, $query);
    //     while ($row = mysqli_fetch_assoc($select_image)) {
    //         $post_image = $row['post_image'];
    //     }
    // }

    $query = "UPDATE user SET user_id='{$user_id}', first_name = '{$first_name}', last_name ='{$last_name}', role ='{$role}', username = '{$username}', email = '{$email}', password ='{$password}' WHERE user_id = {$the_user_id}";
    $update_user_query = mysqli_query($conn, $query);

    confirm($update_user_query);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" value="<?php echo $first_name; ?>" class="form-control" name="first_name">
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
                echo "<option value='subscriber'>Subscriber</option>>";
            } else {

                echo "<option value='admin'>Admin</option>>";
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
        <input type="password" value="<?php echo $password; ?>" class="form-control" name="password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>


</form>



