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
        echo "<td></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php

if (isset($_GET['delete'])) {
    $the_comm_id = $_GET['delete'];
    $query = "DELETE FROM comment WHERE comm_id = {$the_comm_id}";
    $delete_comm = mysqli_query($conn, $query);
    header("location: comments.php");

    $query = "UPDATE post SET post_comm_count = post_comm_count-1 WHERE post_id = {$comm_post_id}";
    $update_comm_count = mysqli_query($conn, $query);

    confirm($update_comm_count);
}
?>

