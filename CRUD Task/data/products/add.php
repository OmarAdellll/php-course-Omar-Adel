<?php
include_once '../../env/database.php';

// Read Categories
$selectCategories = "SELECT * FROM categories";
$allCategories = mysqli_query($conn, $selectCategories);

// Insert New Product
$message = null;
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $insert = "INSERT INTO products VALUES (null , '$name' , $price , $category)";
    $isDone = mysqli_query($conn, $insert);

    header("location: /PHP-Course/CRUD Task/data/products/list.php");
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
    header("location: /PHP-Course/CRUD Task/data/products/list.php");
}
?>


<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>


<h2 class="text-center my-4 text-primary">Add Your Product</h2>
    <div class="container col-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="from-group text-center">
                    <label class="text-primary" for="name">Product Name</label>
                    <input value="<?= $name ?>" class="form-control mt-1" type="text" id="name" name="name">
                </div>

                <div class="form-group text-center">
                    <label class="text-primary" for="price">Product Price</label>
                    <input value="<?= $price ?>" class="form-control mt-1" type="number" id="price" name="price">
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





    <?php include_once '../../shared/script.php' ?>