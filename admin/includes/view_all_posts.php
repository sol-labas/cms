<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Content</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM post";
    $select_post = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_post)) {
        $post_id = (int)$row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comm_count'];
        $post_content = $row['post_content'];
        $post_date = $row['post_date'];


        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_category}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img width='100' src='../images/$post_image'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comments}</td>";
        echo "<td width='400'>{$post_content}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "</tr>";
    }

    ?>

    </tbody>

</table>

<?php
if (isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM post WHERE post_id = {$the_post_id}";
    $delete_post = mysqli_query($conn, $query);
    header("location: posts.php");
}
?>