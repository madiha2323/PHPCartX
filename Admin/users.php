<?php
            include 'connect.php';

            $msg = "";

            if(isset($_GET['id']))
            {
                $update_id = $_GET['id'];
                $res = mysqli_query($con,"UPDATE user set ustatus='disable'   where uid = '$update_id '");
                $msg = "user account disbaled Successfully";
                header("Refresh: 2 , url=users.php");
            }


            include 'aside.php';
            ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Basic Table</h4>
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
            <div class="col-sm-12">
                <div class="white-box">

                    <h4 class='text-danger'><?php echo $msg?></h4>
                    <h3 class="box-title">Basic Table</h3>

                    <div class="table-responsive">
                        <?php

                                    $sql = "SELECT * from user";
                                    $res = mysqli_query($con,$sql);

                                    if(mysqli_num_rows($res)> 0)
                                    {

                                    
                                ?>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">email</th>
                                    <th class="border-top-0">password</th>
                                    <th class="border-top-0">phone</th>
                                    <th class="border-top-0">cnic</th>
                                    <th class="border-top-0">city</th>
                                    <th class="border-top-0">address</th>
                                    <th class="border-top-0">status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                            while($row = mysqli_fetch_array($res))
                                            {
                                        ?>
                                <tr>
                                    <td><?php echo $row['uname']?></td>
                                    <td><?php echo $row['uemail']?></td>
                                    <td><?php echo $row['upassword']?></td>
                                    <td><?php echo $row['uphone']?></td>
                                    <td><?php echo $row['ucnic']?></td>
                                    <td><?php echo $row['uaddress']?></td>
                                    <td><?php echo $row['ustatus']?></td>

                                    <td>
                                        <img width="100px" src="uploads/<?Php echo $row['pimage']?>" class="img-fluid"
                                            alt="">
                                    </td>

                                    <td>
                                        <a href="./updateuser.php?userid=<?php echo $row['uid']?>"
                                            class="btn btn-dark">EDIT</a>
                                        <a href="./users.php?id=<?php echo $row['uid']?>"
                                            class="btn btn-warning">Disbale</a>
                                    </td>
                                </tr>

                                <?php
                                            }
                                            ?>


                            </tbody>
                        </table>

                        <?php
                                }
                                else
                                {
                                    echo "<h3> No users Found </h3>";
                                }
                                ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
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