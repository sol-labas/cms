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
        <th>Date</th>
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
        $date = $row['comm_date'];



        echo "<tr>";
        echo "<td>{$comm_id}</td>";
        echo "<td>{$comm_author}</td>";
        echo "<td>{$comm_content}</td>";
        echo "<td>{$comm_email}</td>";
        echo "<td>{$comm_status}</td>";

        $query = "SELECT * FROM post WHERE post_id = $comm_post_id";
        $select_post_id = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_post_id)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
        }
        echo "<td>{$comm_date}</td>";
        echo "<td><a href='comments.php?approve={$comm_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapproved={$comm_id}'>Unapproved</a></td>";
        echo "<td><a href='comments.php?delete={$comm_id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
if (isset($_GET['unapproved'])) {
    $the_comm_id = $_GET['unapproved'];
    $query = "UPDATE comment SET comm_status = 'unapproved' WHERE comm_id = {$the_comm_id}";
    $unapproved_comm = mysqli_query($conn, $query);
    header("location: comments.php");
}

if (isset($_GET['approve'])) {
    $the_comm_id = $_GET['approve'];
    $query = "UPDATE comment SET comm_status = 'approved' WHERE comm_id = {$the_comm_id}";
    $approve_comm = mysqli_query($conn, $query);
    header("location: comments.php");
}

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

