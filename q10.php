<?php
include "db.php";

if(isset($_POST['login'])){
    $name= $_POST['username'];
    $pass = $_POST['password'];

    $res = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$name' AND password='$pass'");

    if(mysqli_num_rows($res) > 0){
        header("Location: welcome.php");
        exit();
    }
    else{
        echo "Invalid username or password";
    }
}
?>

<h2>Login Form</h2>

<form method="post">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" name="login" value="Login">
</form>
