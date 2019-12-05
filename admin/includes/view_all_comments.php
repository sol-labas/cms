<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapproved</th>
        <th>Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comment";
    $select_comm = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_comm)) {
        $comm_id = (int)$row['comm_id'];
        $comm_post_id = $row['comm_post_id'];
        $comm_author = $row['comm_author'];
        $comm_content = $row['comm_content'];
        $comm_email = $row['comm_email'];
        $comm_status = $row['comm_status'];
        $comm_date = $row['comm_date'];


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
        echo "<td><a href='posts.php?approve={$comm_id}'>Approve</a></td>";
        echo "<td><a href='posts.php?unapproved={$comm_id}'>Unapproved</a></td>";
        echo "<td><a href='posts.php?delete={$comm_id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM post WHERE post_id = {$the_post_id}";
    $delete_post = mysqli_query($conn, $query);
    header("location: posts.php");
}
?>
