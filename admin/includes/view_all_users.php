<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>First_name</th>
        <th>Last_name</th>
        <th>Email</th>
        <th>User_Image</th>
        <th>Role</th>
        <th>Grant admin</th>
        <th>Withdraw admin</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM user";
    $select_users = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = (int)$row['user_id'];
        $username = $row['username'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $user_image = $row['user_image'];
        $role = $row['role'];


        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$first_name}</td>";
        echo "<td>{$last_name}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$user_image}</td>";
        echo "<td>{$role}</td>";
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
if (isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE user SET role = 'admin' WHERE user_id = {$the_user_id}";
    $grant_admin = mysqli_query($conn, $query);
    header("location: users.php");
}

if (isset($_GET['change_to_sub'])) {
    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE user SET role = 'subscriber' WHERE user_id = {$the_user_id}";
    $withdraw_admin = mysqli_query($conn, $query);
    header("location: users.php");
}

if (isset($_GET['delete'])) {
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM user WHERE user_id = {$the_user_id}";
    $delete_user = mysqli_query($conn, $query);
    header("location: users.php");

    confirm($delete_user);
}
?>

