<?php
include("db.php");

/* DELETE */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM students WHERE id=$id";
    mysqli_query($conn, $sql);
     header("Location: index1.php");
    exit();
}

/* CREATE */
if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, age, course)
            VALUES ('$name', '$age', '$course')";

    mysqli_query($conn, $sql);
}

/* DELETE */
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $sql = "DELETE FROM students WHERE id=$id";

    mysqli_query($conn, $sql);
}

/* UPDATE */
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $sql = "UPDATE students
            SET name='$name', age='$age', course='$course'
            WHERE id=$id";

    mysqli_query($conn, $sql);
}

/* GET DATA FOR EDIT */
$edit = false;

if (isset($_GET['edit'])) {

    $edit = true;
    $id = $_GET['edit'];

    $result = mysqli_query($conn,
        "SELECT * FROM students WHERE id=$id"
    );

    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>

<body>

<h2>Student Management</h2>

<?php if ($edit) { ?>

<h3>Update Student</h3>

<form method="post">

    <input type="hidden" name="id"
           value="<?php echo $row['id']; ?>">

    Name:
    <input type="text" name="name"
           value="<?php echo $row['name']; ?>" required>

    <br><br>

    Age:
    <input type="number" name="age"
           value="<?php echo $row['age']; ?>" required>

    <br><br>

    Course:
    <input type="text" name="course"
           value="<?php echo $row['course']; ?>" required>

    <br><br>

    <input type="submit" name="update"
           value="Update">

</form>

<?php } else { ?>

<h3>Add Student</h3>

<form method="post">

    Name:
    <input type="text" name="name" required>

    <br><br>

    Age:
    <input type="number" name="age" required>

    <br><br>

    Course:
    <input type="text" name="course" required>

    <br><br>

    <input type="submit" name="add"
           value="Add Student">

</form>

<?php } ?>

<hr>

<h3>Student Records</h3>

<style>
.box {
    border: 2px solid black;
    padding: 15px;
    width: 600px;
}
</style>

<div class="box">

<?php
$result = mysqli_query($conn, "SELECT * FROM students");

if (mysqli_num_rows($result) > 0) {
?>

<table border="1" cellpadding="10" width="100%">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><?php echo $row['course']; ?></td>

    <td>
        <a href="index1.php?delete=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>
</tr>

<?php
}
?>

</table>

<?php
} else {
    echo "No student records found.";
}
?>

</div>
</body>
</html>
