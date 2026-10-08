<?php

$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Database connection failed");
}

$message = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $message = "Login successful";

    } else {

        $message = "Invalid username or password";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
</head>

<body>

<h2>Login Form</h2>

<form method="post">

    Username:

    <input type="text"
           name="username"
           required>

    <br><br>

    Password:

    <input type="password"
           name="password"
           required>

    <br><br>

    <input type="submit"
           name="login"
           value="Login">

</form>

<br>

<?php

echo $message;

?>

</body>
</html>
