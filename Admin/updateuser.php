<?php
            include 'aside.php';
            include 'connect.php';

            $updateID = $_GET['userid'];

            $query= mysqli_query($con,"SELECT * FROM user where uid='$updateID'");
            $user_data = mysqli_fetch_array($query);
            ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper" style="min-height: 250px;">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Update user</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Update user</h3>
                    <div class="row">
                        <div class="col-md-8 mx-auto shadow">
                            <form class="  p-3" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="<?= $user_data['uname']?>" required class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" value="<?= $user_data['uemail']?>" disable class="form-control">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" name="password" value="<?= $user_data['upassword']?>" required class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="<?= $user_data['uphone']?>" required class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Cnic</label>
                                    <input type="text" name="cnic" required value="<?= $user_data['ucnic']?>" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">city</label>
                                    <input type="text" name="city" required class="form-control" value="<?= $user_data['ucity']?>">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="city" required class="form-control" value="<?= $user_data['uaddress']?>">
                                </div>


                                <div class="mb-3">
                                    <button type="submit" name="update_user" class="btn btn-primary">Update
                                        Now</button>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php
            include 'footer.php';
            ?>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.js"></script>
</body>

</html>