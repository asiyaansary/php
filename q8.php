<?php
include "db.php";

if(isset($_POST['search'])){
    $n=$_POST['name'];
    $r=mysqli_query($conn,"SELECT * FROM students WHERE name LIKE '%$n%'");
}
?>

<h2>Search Student</h2>

<form method="post">
Name: <input type="text" name="name" required>
<input type="submit" name="search" value="Search">
</form>

<?php
if(isset($_POST['search'])){
    if(mysqli_num_rows($r)>0){
        while($row=mysqli_fetch_assoc($r)){
            echo $row['id']." - ";
            echo $row['name']." - ";
            echo $row['age']." - ";
            echo $row['course']."<br>";
        }
    } else {
        echo "No student found";
    }
}
?>
