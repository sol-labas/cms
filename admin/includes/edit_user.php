<?php
if(isset($_GET['edit_user'])) {
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

//if(isset($_POST['edit_user'])){
    //$user_id = $_POST['user_id'];
    //$first_name = $_POST['first_name'];
    //$last_name = $_POST['last_name'];
    //$role = $_POST['role'];
    //$username = $_POST['username'];
    //$email = $_POST['email'];
    //$password = $_POST['password'];
    //$user_image_temp = $_FILES['user_image']['tmp_name'];
    //$user_image = $_POST['user_image'];
    // $post_date = date('d-m-y');

    //move_uploaded_file($user_image_temp, "../images/$user_image");

   // $query = "INSERT INTO user (username, password, first_name, last_name, email, user_image, role ) VALUES ('{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}', '{$user_image}', '{$role}')";
   // $create_user_query = mysqli_query($conn, $query);

   // confirm($create_user_query);
//}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" value="<?php echo $first_name; ?>" class="form-control" name="first_name">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" value="<?php echo $last_name; ?>"class="form-control" name="last_name">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <br>
        <select name="role" id="role">
            <?php

            $query = "SELECT * FROM user ";
            $select_cat = mysqli_query($conn, $query);

            confirm($select_cat);
            while ($row = mysqli_fetch_assoc($select_cat)) {
                $user_id = $row['user_id'];
                $role = $row['role'];

                echo "<option value='{$user_id}'>{$role}</option>";
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



