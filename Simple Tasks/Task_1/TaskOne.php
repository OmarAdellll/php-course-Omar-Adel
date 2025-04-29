<?php
$userName="mohamed";
$passWord="123";
$var = 0;

if(isset($_POST['submit']))
{
    if($_POST['username'] == $userName && $_POST['password'] == $passWord) $var = 1;
    else $var = -1;

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instant Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container col-5 my-5">
        <div class="card">
            <div class="card-title">
                <h2 class="card-title text-center badge-lg badge-dark"><span class="text-primary">[i]</span><span>NSTANT</span></h2>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    <div class="from-group">
                        <label for="username">Enter Your Username:</label>
                        <input class="form-control" type="text" id="username" name="username" placeholder="e.g: Omar_Adel">
                    </div>

                    <div class="form-group my-5">
                        <label for="password">Enter Your Password:</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="e.g: &4molpqwkk">
                    </div>

                    <?php if($var==1) { ?>
                    <div class="alert-success">Registeration is Done Successfully ! (Loading to Home Page ... )</div>

                    <?php } else if($var==-1) { ?>
                    <div class="alert-danger"> Incorrect Credentials, Please Try Again"</div>

                    <?php } ?>

                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-dark my-3" name="submit" value="Submit">
                    </div>

                </form>
            </div>
        </div>
    </div>






 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>


</html>