<?php include('config/database.php') ?>

<?php
    session_start();
    header('location:login.php');

    // $uid = $_POST['username'];
    // $pwd = $_POST['password'];
    // $query = "SELECT * FROM users WHERE username='$uid'";
    // $result = mysqli_query($conn, $query);

    // $num  = mysqli_num_rows($result);
    // if($num == 1) {
    //     echo "Username is already exists!";
    // } else {
    //     $reg = "INSERT INTO users (username, password) VALUES ('$uid', '$pwd')";
    //     mysqli_query($conn, $reg);
    //     echo "registration successfully!";
    // }

    $uid = $_POST['username'];
    $pwd = $_POST['password'];
    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE username='$uid'";
    $result = mysqli_query($conn, $query);

    $num  = mysqli_num_rows($result);
    if($num == 1) {
        echo "Username is already exists!";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
        $stmt->bind_param("ss", $uid, $hashed_password);
        $result = $stmt->execute();
        if($result) {
            echo "registration success!";
        } else {
            echo "something went wrong!";
        }
    }