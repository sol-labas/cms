<?php

function insert_categories()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == '' || empty($cat_title)) {
            echo "Fill the field";
        } else {
            $query = "INSERT INTO category(cat_title) VALUE ('$cat_title')";
            $create_cat = mysqli_query($conn, $query);
            if (!$create_cat) {
                die("Query failed") . mysqli_error($conn);
            }

        }
    }
}


