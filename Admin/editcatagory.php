
<?php
            include 'connect.php';
            $errors = array( 'cat_name'=>'','msg'=>'');

            $update_id = $_GET['id'];
            $sql_data = mysqli_query($con,"SELECT * from catagories where cid='$update_id'");
            $data_row = mysqli_fetch_array($sql_data);

          
            
            
            
            if(isset($_POST['update']))
            {
                if(empty($_POST['name']))
                {
                    $errors['cat_name'] = '<span class="text-danger">Field is Required </span>';
                }
                else
                {
            
                    $title= $_POST['name'];
                    $sql_e = "SELECT * FROM catagories WHERE cname='$title'";
                    $res_e = mysqli_query($con, $sql_e);
                    if (mysqli_num_rows($res_e) > 0)
                    {
                    $errors['cat_name'] = '<span class="text-danger">This Catagory  already exist </span>';
                    }
                }

                if(array_filter($errors))
                {
                    $errors['msg']= "<div class='alert alert-danger' role='alert'>
                        something went wrong
                    </div>";
                }
                else
                {
                    $cname = $_POST['name'];

                    $sql1 = "UPDATE catagories set cname='$cname' where cid='$update_id'";
                    $res1 = mysqli_query($con,$sql1);
                    $errors['msg']= "<div class='alert alert-success' role='alert'>
                         catagory updated
                    </div>";
                    header("Refresh: 2 , url=Catagories.php");
                }
                
                
            
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
                        <h4 class="page-title">Catagories</h4>
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
                            <h3 class="box-title text-center">Update Catgory</h3>   
                            <form action="" class="shadow p-3" method="post">
                            <?php echo $errors['msg']?>
                                <div class="form-group">
                                <input type="text" class="form-control" value='<?php echo $data_row['cname']?>' name="name" placeholder="Enter Catagory Name">
                                </div>
                                <div class="form-group">
                                    <?php echo $errors['cat_name']?>
                                </div>

                                <div class="form-group mt-4">
                                    <input type="submit" name="update" value='Update cataory' class="btn btn-success">
                                </div>
                            </form>
                            
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