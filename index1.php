<?php
include "db.php";

/* ADD */
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    mysqli_query($conn,
    "INSERT INTO students(name,age,course)
     VALUES('$name','$age','$course')");
}

/* UPDATE */
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    mysqli_query($conn,
    "UPDATE students
     SET name='$name', age='$age', course='$course'
     WHERE id=$id");
}

$message="";
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM students WHERE id=$id");
    $message="Student deleted successfully"
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>

<body>

<h2>Student Management</h2>

<form method="post">

    ID:
    <input type="number" name="id"><br><br>

    Name:
    <input type="text" name="name" required><br><br>

    Age:
    <input type="number" name="age" required><br><br>

    Course:
    <input type="text" name="course" required><br><br>

    <input type="submit" name="add" value="Add">

    <input type="submit" name="update" value="Update">

</form>

<h3>Student Records</h3>

<?php
$res = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($res)) {

    echo $row['id'] . " - ";
    echo $row['name'] . " - ";
    echo $row['age'] . " - ";
    echo $row['course'] . " ";

    echo "<a href='index.php?delete=".$row['id']."'>Delete</a>";
    echo "<br>";
	echo $message;
}
?>

</body>
</html>
