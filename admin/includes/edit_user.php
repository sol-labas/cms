<?php

$query = "SELECT * FROM user ";
$select_cat = mysqli_query($conn, $query);

confirm($select_cat);
while ($row = mysqli_fetch_assoc($select_cat)) {
    $user_id = $row['user_id'];
    $role = $row['role'];

    echo "<option value='{$user_id}'>{$role}</option>";
}
?>
