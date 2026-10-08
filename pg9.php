<?php

$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Database connection failed");
}

/* DELETE PRODUCT */

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $sql = "DELETE FROM products WHERE id=$id";

    mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>

<body>

<h2>Product List</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php

$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

    <td>
        <?php echo $row['id']; ?>
    </td>

    <td>
        <?php echo $row['name']; ?>
    </td>

    <td>
        ₹<?php echo $row['price']; ?>
    </td>

    <td>

        <a href="products.php?delete=<?php echo $row['id']; ?>">
            Delete
        </a>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>
