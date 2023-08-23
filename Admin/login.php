<?php
$msg = "";

session_start();

if(isset($_POST['login']))
{
    include 'connect.php';
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql  = "SELECT * FROM admin where email = '{$email}' and pass = '{$pass}'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) == 0)
    {
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Wrong Email or Password
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else
    {
        $row = mysqli_fetch_array($result);

        $_SESSION['admin_email'] = $email;
        header("location: index.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body{
            background-image : linear-gradient(to right, #40407a,#227093 , #40407a,#227093)
        }
    </style>
</head>
<body>
    
    <div class="container my-5">
        <h3 class="text-center text-light pb-3">Admin login</h3>

        <div class="row">
            <div class="col-7 mx-auto">
                <form action="" class="shadow-lg rounded p-4" method="post">

                    <div class="form-group">
                        <?php echo $msg;?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Enter Email" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter Email" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" value="login" class='btn btn-dark' name="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>