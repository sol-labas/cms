<?php
if(isset($_POST['create_user'])){
    //$user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_image = $_POST['user_image'];
   // $post_date = date('d-m-y');

    //move_uploaded_file($user_image_temp, "../images/$user_image");

    $query = "INSERT INTO user (username, password, first_name, last_name, email, user_image, role ) VALUES ('{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}', '{$user_image}', '{$role}')";
    $create_user_query = mysqli_query($conn, $query);

    confirm($create_user_query);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <br>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_image">Avatar</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>



</form>

