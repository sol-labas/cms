<?php
if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
}

$query = "SELECT * FROM post WHERE post_id = {$post_id} ";
$select_post_by_id = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($select_post_by_id)) {
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
}

if (isset($_POST['update_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM post WHERE post_id = {$post_id}";
        $select_image = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($select_image)) {
            $post_image = $row['post_image'];
        }

    }

    $query = "UPDATE post SET post_category_id ='{$post_category_id}', post_title = '{$post_title}', post_author ='{$post_author}', post_date = now(), post_image = '{$post_image}', post_content ='{$post_content}', post_tags = '{$post_tags}', post_status = '{$post_status}' WHERE post_id = {$post_id }";
    $update_post_query = mysqli_query($conn, $query);

    confirm($update_post_query);
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $post_title ?>" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Category</label>
        <br>
        <select name="post_category_id" id="post_category_id">
            <?php

            $query = "SELECT * FROM category ";
            $select_cat = mysqli_query($conn, $query);

            confirm($select_cat);
            while ($row = mysqli_fetch_assoc($select_cat)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" value="<?php echo $post_author ?>" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" value="<?php echo $post_status ?>" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width='100' src='../images/<?php echo $post_image; ?>'>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" value="<?php echo $post_tags ?>" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30"
                  rows="10"><?php echo $post_content ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>


</form>

