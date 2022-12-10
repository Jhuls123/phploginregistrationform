<?php 
    session_start();
    if(isset($_SESSION['username'])) {
        header('location:home.php');
    }
 ?>

<html>
    <head>
        <title>User Login & Registration Form</title>
    </head>
    <body>
        <div>
            <div>
                <h2>Login Form</h2>
                <form action="validation.php" method="POST">
                    <div>
                        <label for="username">username</label>
                        <input type="text" name="username">
                    </div>
                    <div>
                        <label for="password">username</label>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" value="login" name="login">
                </form>
            </div>
            <div>
                <h2>Registration Form</h2>
                <form action="registration.php" method="POST">
                    <div>
                        <label for="username">username</label>
                        <input type="text" name="username">
                    </div>
                    <div>
                        <label for="password">username</label>
                        <input type="password" name="password">
                    </div>
                    <input type="submit" value="register" name="register">
                </form>
            </div>
        </div>
    </body>
</html>