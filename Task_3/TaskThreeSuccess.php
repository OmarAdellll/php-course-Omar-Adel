<?php


$showWarning = 0;

if(isset($_POST['submit']))
{
    if($_POST['newPass'] == $_POST['confirmNewPass']) $showWarning = 1;
    else $showWarning = -1;
   
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Our Registeration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container col-5 my-5">
        <div class="card">
            <div class="card-title">
                <h2 class="card-title text-center text-primary mt-3">Changing Password</h2>
                <hr>
            </div>

            <div class="card-body">
                <form action="" method="post">
                <div class="form-group my-5">
                    
                        <div class="row">
                            <div class="col">
                            <label for="newPass">Enter Your New Password:</label>
                            <input class="form-control" type="password" id="newPass" name="newPass" placeholder="e.g: &4molpqwkk" required>
                            </div>

                            <div class="col">
                            <label for="confirmNewPass">Confirm Your New Password:</label>
                            <input class="form-control" type="password" id="confirmNewPass" name="confirmNewPass" placeholder="e.g: &4molpqwkk" required>
                            </div>
                        </div>

                        <div class="text-center my-3">
                            <?php if($showWarning == 1) { ?>
                            <h4 class="text-success">Password changed successfully !</h4>
                            <?php } else if($showWarning==-1) { ?>
                            <h4 class="text-danger">New password does not match !</h4>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-outline-primary my-3" name="submit" value="Submit">
                    </div>


                </form>
            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>


</html>




