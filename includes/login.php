<?php include_once "db.php";
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_escape_string(mysqli_real_escape_string($conn, $username));
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM user WHERE username = '{$username}'";
    $select_user = mysqli_query($conn, $query);
    if (!$select_user) {
        die("QUERY FAILED" . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($select_user)) {
        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_first_name = $row['first_name'];
        $db_last_name = $row['last_name'];
        $db_role = $row['role'];
        $db_password = $row['password'];
    }

    if ($username === $db_username && $password === $db_password) {
        $_SESSION['username'] = $db_username;
        $_SESSION['first_name'] = $db_first_name;
        $_SESSION['last_name'] = $db_last_name;
        $_SESSION['role'] = $db_role;
        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }
}


?>
