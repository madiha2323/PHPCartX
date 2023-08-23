<?Php

    include 'Admin/connect.php';
    $msg= '';
    if(isset($_POST['register']))
    {
        if($_POST['email']=='')
        {

        }
        else
        {
            $email= $_POST['email'];
            $sql_e = "SELECT * FROM user WHERE uemail='$email'";
            $res_e = mysqli_query($con, $sql_e);
            if (mysqli_num_rows($res_e) > 0)
            {
                $msg = '<span class="text-danger">Please use different email </span>';
            }
        }
        
        if($msg == '')
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $phone = $_POST['phone'];
            $cnic = $_POST['cnic'];
            $city = $_POST['city'];
            $adrress = $_POST['address'];
            $status = "pending";

            $sql = "INSERT INTO `user`(`uname`, `uemail`, `upassword`, `uphone`, `ucnic`, `ucity`, `uaddress`, `ustatus`) VALUES ('{$name}','{$email}','{$pass}','{$phone}','{$cnic}','{$city}','{$adrress}','{$status}') ";

            $res = mysqli_query($con,$sql);
            
            header('location: login.php');
        }

    }
    include 'header.php';

    ?>
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid bg-light py-4">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">REGISTER</h1>
        <p>
            Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet.
        </p>
    </div>
</div>



<div class="container-fluid mb-4">
    <div class="row">
        <div class="col-8 mx-auto shadow-lg">

            <form class="p-3 mt-3" method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" placeholder='Enter Name' name="name" required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" placeholder='Enter email' name="email" required class="form-control">
                    <?php echo $msg?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" placeholder='Enter password' name="password" required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" placeholder='Enter Phone' required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cnic</label>
                    <input type="text" name="cnic" placeholder='Enter cnic' required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">city</label>
                    <input type="text" name="city" placeholder='Enter city' required class="form-control">
                </div>


                <div class="mb-3">
                    <label class="form-label">address</label>
                    <textarea name="address" placeholder='Enter Address' required class="form-control" id="" cols="30" rows="10"></textarea>
                </div>


                <div class="mb-3">
                    <button type="submit" name="register" class="btn btn-primary">Register Now</button>

                    <a href="./login.php" class="btn btn-info">Login Now</a>
                </div>


            </form>
        </div>
    </div>
</div>
<!--End Brands-->


<!-- Start Footer -->
<?Php
    include 'footer.php';

    ?>
<!-- End Footer -->

<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<!-- End Script -->
</body>

</html>