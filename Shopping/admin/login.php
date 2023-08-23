<?php

session_start();
include 'connect.php';

$msg="";

if(isset($_POST['login']))
{
    // echo "1" ;
     $email = $_POST['email'];
     $password = $_POST['password'];

     $login_query = "SELECT * FROM admin WHERE
     email = '$email' AND password = '$password'";
     $result = mysqli_query($con,$login_query);

    //  echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0)
    {
        // echo "<script> alter('Incoorect email and password')</script>";
        //  $msg = '<div class="alert alert-danger role="alert"
        // >Incorrect email or password
        // </div>';
    
        $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Failed</strong> Incorrect email or password
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        
    }
    else
    {

    
        $_SESSION['Admin_login'] = $email;
        header('location: index.php');
        
    
    }
} 
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>login</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-8 mx-auto shadow-lg p-3 my-5">
                <h3 class="text-center">ADMIN LOGIN</h3>
                <form action="" class='shadow p-5' method="post">

                    
                        <?php echo $msg?>

              
                  

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" placeholder="Please Enter Email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="Password" placeholder="Please Enter Password" name="password" class='form-control'>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="login" name="login" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>