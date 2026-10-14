<?php
include "db.php";

if(isset($_POST['add'])){
    $n=$_POST['name'];
    $a=$_POST['age'];
    $c=$_POST['course'];

    mysqli_query($conn,"INSERT INTO students(name,age,course)
    VALUES('$n','$a','$c')");
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $n=$_POST['name'];
    $a=$_POST['age'];
    $c=$_POST['course'];

    mysqli_query($conn,"UPDATE students SET name='$n',
    age='$a',course='$c' WHERE id=$id");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    mysqli_query($conn,"DELETE FROM students WHERE id=$id");
    header("Location: q7.php");
    exit();
}
?>

<h2>Student CRUD</h2>

<form method="post">
ID: <input type="number" name="id"><br><br>
Name: <input type="text" name="name" required><br><br>
Age: <input type="number" name="age" required><br><br>
Course: <input type="text" name="course" required><br><br>

<input type="submit" name="add" value="Add">
<input type="submit" name="update" value="Update">
</form>

<h3>Student Records</h3>

<table border="1" cellpadding="8">
<tr><th>ID</th><th>Name</th><th>Age</th><th>Course</th><th>Action</th></tr>

<?php
$r=mysqli_query($conn,"SELECT * FROM students");
while($row=mysqli_fetch_assoc($r)){
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><a href="q7.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
