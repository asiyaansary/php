<?php

$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Database connection failed");
}

$result = null;

if (isset($_POST['search'])) {

    $name = $_POST['name'];

    $sql = "SELECT * FROM students
            WHERE name LIKE '%$name%'";

    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Student</title>
</head>

<body>

<h2>Search Student</h2>

<form method="post">

    Enter Student Name:

    <input type="text" name="name" required>

    <input type="submit"
           name="search"
           value="Search">

</form>

<br>

<?php

if ($result) {

?>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Course</th>
</tr>

<?php

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td><?php echo $row['age']; ?></td>

    <td><?php echo $row['course']; ?></td>

</tr>

<?php

    }

} else {

    echo "<tr><td colspan='4'>No student found</td></tr>";

}

?>

</table>

<?php } ?>

</body>
</html>
