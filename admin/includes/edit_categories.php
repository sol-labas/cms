
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
        if(isset($_GET['edit'])){
            $cat_id = (int)$_GET['edit'];

            $query = "SELECT * FROM category WHERE cat_id = '$cat_id'";
            $select_cat_id = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($select_cat_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                ?>
                <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?>">
            <?php } } ?>

        <?php
        if(isset($_POST['edit_category'])){
            $the_cat_title = mysqli_escape_string($_POST['cat_title']);
            $query = "UPDATE category SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
            $update_cat = mysqli_query($conn, $query);
            if(!$update_cat){
                die("Query failed" . mysqli_error($conn));
            }

        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_category" value="Edit Category">
    </div>

</form>

