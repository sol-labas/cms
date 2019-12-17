<?php include_once "db.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username= mysqli_real_escape_string($conn, $username);
    $password= mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM user WHERE username = '{$username}'";
    $select_user = mysqli_query($conn, $query);
    if(!$select_user){
        die("QUERY FAILED" . mysqli_error($conn));
    }

    while($row = mysqli_fetch_assoc($select_user)){
        echo  $db_id = $row['user_id'];

    }

}






?>
