<?php
include_once '../../env/database.php';


// Insert New Customer
$message = null;
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $insert = "INSERT INTO customers VALUES (null , '$name' , '$gender' , '$phone')";
    $isDone = mysqli_query($conn, $insert);

    header("location: /PHP-Course/CRUD Task/data/customers/list.php");
}



// Update
$name = null;
$gender = null;
$phone = null;
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $selectOneCustomer = "SELECT * FROM customers WHERE id = $id";
    $oneCustomer = mysqli_query($conn, $selectOneCustomer);
    $myItem = mysqli_fetch_assoc($oneCustomer);

    $name = $myItem['name'];
    $gender = $myItem['gender'];
    $phone = $myItem['phone'];
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $update = "UPDATE customers SET name = '$name' , gender = '$gender' , phone = '$phone' WHERE id = $id";
    mysqli_query($conn, $update);
    header("location: /PHP-Course/CRUD Task/data/customers/list.php");
}
?>


<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>


<h2 class="text-center my-4 text-primary">Add Your Customer</h2>
    <div class="container col-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="from-group text-center">
                    <label class="text-primary" for="name">Customer Name</label>
                    <input value="<?= $name ?>" class="form-control mt-1" type="text" id="name" name="name">
                </div>
                <div class="from-group text-center">
                    <label class="text-primary" for="phone">Customer Phone</label>
                    <input value="<?= $phone ?>" class="form-control mt-1" type="text" id="phone" name="phone">
                </div>



                <div class="from-group text-center mt-3">
                    <select class="form-select" name="gender" id="">
                        <option disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>


                <?php if ($message != null): ?>
                    <h4 class="text-center text-success mt-2"> <?= $message ?> </h4>
                <?php endif; ?>

                <?php if ($update == false): ?>
                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-primary mt-3" name="add" value="Add Customer">
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