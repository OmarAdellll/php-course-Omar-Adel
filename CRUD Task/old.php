<?php

// Variables
$count = 1;


// Connect Database
$host = "localhost";
$user = "root";
$password = "";
$dbName = "shop";

try {
    $conn = mysqli_connect($host, $user, $password, $dbName);
} catch (Exception $e) {
    echo $e->getMessage();
}




// Read Categories
$selectCategories = "SELECT * FROM categories";
$allCategories = mysqli_query($conn, $selectCategories);

// Read Products with categories
$selectProducts = "SELECT * FROM products_with_categories ORDER BY id DESC";
$allProducts = mysqli_query($conn, $selectProducts);


// Insert New Product
$message = null;
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $insert = "INSERT INTO products VALUES (null , '$name' , $price , $category)";
    $isDone = mysqli_query($conn, $insert);

    if ($isDone) {
        $message = "Insertion is Done !";
    }
}

// Read One Item
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $selectOneItem = "SELECT * FROM products_with_categories WHERE id = $id";
    $oneItem = mysqli_query($conn, $selectOneItem);
    $myItem = mysqli_fetch_assoc($oneItem);
}

// Delete One item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM products WHERE id = $id";
    $deleteOp = mysqli_query($conn, $delete);
    $allProducts = mysqli_query($conn, $selectProducts);
}


// Update
$name = null;
$price = null;
$categoryId = null;
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $selectOneItem = "SELECT * FROM products WHERE id = $id";
    $oneItem = mysqli_query($conn, $selectOneItem);
    $myItem = mysqli_fetch_assoc($oneItem);

    $name = $myItem['name'];
    $price = $myItem['price'];
    $categoryId = $myItem['category_id'];
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $update = "UPDATE products SET name = '$name' , price = $price , category_id = $category WHERE id = $id";
    mysqli_query($conn, $update);
    header("location: /PHP-Course/CRUD Task/index.php");
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <h2 class="text-center my-4 text-primary">CRUD Using PHP</h2>
    <div class="container col-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="from-group text-center">
                    <label class="text-primary" for="name">Product Name</label>
                    <input value="<?= $name ?>" class="form-control" type="text" id="name" name="name">
                </div>

                <div class="form-group text-center">
                    <label class="text-primary" for="price">Product Price</label>
                    <input value="<?= $price ?>" class="form-control" type="number" id="price" name="price">
                </div>

                <?php if ($message != null): ?>
                    <h4 class="text-center text-success mt-2"> <?= $message ?> </h4>
                <?php endif; ?>

                <div class="from-group text-center mt-3">
                    <select class="form-select" name="category" id="">
                        <option disabled selected>Select Category</option>
                        <?php foreach ($allCategories as $item): ?>
                            <?php if ($item['id'] == $categoryId): ?>
                                <option selected value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                            <?php else: ?>
                                <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>
                <?php if ($update == false): ?>
                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-primary mt-3" name="add" value="Add Product">
                    </div>
                <?php else: ?>
                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-warning mt-3" name="update" value="Update">
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <h2 class="text-center mt-5 text-primary">All Products</h2>
    <div class="container mt-4 col-7">
        <div class="card-body">
            <table class="table table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th colspan="3">Action</th>

                </tr>
                <?php foreach ($allProducts as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['product_name'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['category_name'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td><a href="index.php?view=<?= $item['id'] ?>"><i class="fa-solid fa-eye text-primary"></i></a></td>
                        <td><a href="index.php?edit=<?= $item['id'] ?>"><i class="fa-solid fa-pen text-dark"></i></a></td>
                        <td><a href="index.php?delete=<?= $item['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <?php if (isset($_GET['view'])): ?>
        <div class="myModel">
            <div class="myContent">
                <div class="card p-4">
                    <h6>List The Product
                        <a class="float-end" href="index.php"><i class="fa-solid fa-square-xmark"></i></a>
                    </h6>
                    <hr>
                    <div class="card-body p-3">
                        <h6>Product Name: <?= $myItem['product_name'] ?></h6>
                        <hr>
                        <h6>Price: <?= $myItem['price'] ?></h6>
                        <hr>
                        <h6>Category Name: <?= $myItem['category_name'] ?></h6>
                        <hr>
                        <h6>Description: <?= $myItem['description'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>




</body>

</html>