<?php
function confirm ($result){
    global $conn;
    if (!$result){
        die("FAILED" . mysqli_error($conn));
    }

}

function insert_categories()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $cat_title = mysqli_escape_string($_POST['cat_title']);
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

function select_all_cat(){
    global $conn;
    $query = "SELECT * FROM category";
    $select_cat = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($select_cat)) {
        $cat_id = (int)$row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_cat(){
    global $conn;
    if (isset($_GET['delete'])) {
        $the_cat_id = (int)$_GET['delete'];
        $query = "DELETE FROM category WHERE cat_id = {$the_cat_id}";
        $delete_cat = mysqli_query($conn, $query);
        header("location: categories.php");
    }
}
