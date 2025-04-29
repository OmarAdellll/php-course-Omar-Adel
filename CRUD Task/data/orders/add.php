<?php
include_once '../../env/database.php';


// Read Orders
$selectOrders = "SELECT * FROM customers_with_products";
$allOrders = mysqli_query($conn, $selectOrders);

// Read Customers
$selectCustomers = "SELECT * FROM customers";
$allCustomers = mysqli_query($conn, $selectCustomers);

// Read Products
$selectProducts = "SELECT * FROM products";
$allProducts = mysqli_query($conn, $selectProducts);

// Insert New Order
$message = null;
if (isset($_POST['add'])) {
    $customer = $_POST['customer'];
    $product = $_POST['product'];
    $amount = $_POST['amount'];

    $insert = "INSERT INTO orders VALUES (null , $amount , $customer , $product)";
    $isDone = mysqli_query($conn, $insert);

    header("location: /PHP-Course/CRUD Task/data/orders/list.php");
}



// Update
$customer = null;
$product = null;
$amount = null;
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $selectOneItem = "SELECT * FROM customers_with_products WHERE id = $id";
    $oneItem = mysqli_query($conn, $selectOneItem);
    $myItem = mysqli_fetch_assoc($oneItem);

    $customer = $myItem['customer'];
    $product = $myItem['product'];
    $amount = $myItem['order_amount'];
}

if (isset($_POST['update'])) {
    $customer = $_POST['customer'];
    $product = $_POST['product'];
    $amount = $_POST['amount'];

    $update = "UPDATE orders SET order_amount = $amount , customer_id = $customer , product_id = $product WHERE id = $id";
    mysqli_query($conn, $update);
    header("location: /PHP-Course/CRUD Task/data/orders/list.php");
}
?>


<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>


<h2 class="text-center my-4 text-primary">Add New Order</h2>
    <div class="container col-4">
        <div class="card-body">
            <form action="" method="post">
                
                <?php if ($message != null): ?>
                    <h4 class="text-center text-success mt-2"> <?= $message ?> </h4>
                <?php endif; ?>

                <div class="from-group text-center mt-3">
                    <label class="text-primary" for="customer">Customer</label>
                    <select class="form-select" name="customer" id="customer">
                        <option disabled selected>Select Customer</option>
                        <?php foreach($allCustomers as $item): ?>
                            <?php if($item['name'] == $customer):?>
                            <option selected value="<?= $item['id']?>"> <?=$item['name'] ?> </option>
                            <?php else: ?>
                            <option value="<?= $item['id']?>"> <?=$item['name'] ?> </option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>


                <div class="from-group text-center mt-3">
                    <label class="text-primary" for="product">Product</label>
                    <select class="form-select" name="product" id="product">
                        <option disabled selected>Select Product</option>
                        <?php foreach($allProducts as $item): ?>
                            <?php if($item['name'] == $product):?>
                            <option selected value="<?= $item['id']?>"> <?=$item['name'] ?> </option>
                            <?php else: ?>
                            <option value="<?= $item['id']?>"> <?=$item['name'] ?> </option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group text-center mt-3">
                    <label class="text-primary" for="price">Product Amount</label>
                    <input value="<?=$amount?>" class="form-control" type="number" id="price" name="amount">
                </div>

                <?php if ($update == false): ?>
                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-primary mt-3" name="add" value="Add Order">
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