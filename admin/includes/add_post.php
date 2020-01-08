<?php
if (isset($_POST['create_post'])) {
    $post_title = mysqli_escape_string($conn, $_POST['post_title']);
    $post_author = mysqli_escape_string($conn, $_POST['post_author']);
    $post_category_id = mysqli_escape_string($conn, $_POST['post_category_id']);
    $post_status = mysqli_escape_string($conn, $_POST['post_status']);
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = mysqli_escape_string($conn, $_POST['post_tags']);
    $post_content = mysqli_escape_string($conn, $_POST['post_content']);
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp, "../images/$post_image");

    $post_image = mysqli_escape_string($conn, $post_image);
    $query = "INSERT INTO post (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
    $create_post_query = mysqli_query($conn, $query);

    confirm($create_post_query);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
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
        <input type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <option value="draft">Select Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
        </select>

    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>
