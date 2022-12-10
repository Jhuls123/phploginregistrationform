<?php include('config/database.php') ?>

<?php
    session_start();
    
    // $uid = $_POST['username'];
    // $pwd = $_POST['password'];

    // $query = "SELECT * FROM users WHERE username='$uid' && password='$pwd'";
    // $result = mysqli_query($conn, $query);

    // $num  = mysqli_num_rows($result);
    // if($num == 1) {
    //     $_SESSION['username'] = $uid;
    //     header('location:home.php');
    // } else {
    //     header('location:login.php');
    // }

    $uid = addslashes($_POST['username']);
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username=?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($uid, $pwd);

    if($stmt->num_rows == 1) {
        echo "user doesn'\nt exsits<br>";
        $stmt->fetch();
        if(password_verify($password, $pwd)) {
            echo "The password matches<br>";
            echo "Login success<br>";
            $_SESSION['username'] = $uid;
            header('location:home.php');
            exit;
        } else {
            $_SESSION = [];
            session_destroy();
        }   
    } else {
        $_SESSION = [];
        session_destroy();
        header('location:login.php');
    }