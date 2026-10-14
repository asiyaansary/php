<?php
include "db.php";

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    mysqli_query($conn,"DELETE FROM products WHERE id=$id");
    header("Location: q9.php");
    exit();
}

$r=mysqli_query($conn,"SELECT * FROM products");
?>

<h2>Product List</h2>

<table border="1" cellpadding="8">
<tr><th>ID</th><th>Name</th><th>Price</th><th>Action</th></tr>

<?php
while($row=mysqli_fetch_assoc($r)){
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><a href="q9.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
