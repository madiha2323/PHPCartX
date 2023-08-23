<?php
            include 'connect.php';

            $msg = "";

            if(isset($_GET['id']))
            {
                $del_id = $_GET['id'];
                $res = mysqli_query($con,"DELETE from products where pid = '$del_id'");
                $msg = "Product Delted Successfully";
                header("Refresh: 2 , url=allproducts.php");
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
                            <a class="btn btn-info "href="./addproduct.php">Add New </a>


                            <hr>
                            <h4 class='text-danger'><?php echo $msg?></h4>
                            <h3 class="box-title">Basic Table</h3>
                            
                            <div class="table-responsive">
                                <?php

                                    $sql = "SELECT products.*, catagories.* from products
                                    INNER JOIN catagories ON products.cid=catagories.cid";
                                    $res = mysqli_query($con,$sql);

                                    if(mysqli_num_rows($res)> 0)
                                    {

                                    
                                ?>
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">catagory</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Dioscount</th>
                                            <th class="border-top-0">Qty</th>
                                            <th class="border-top-0">image</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <?php
                                            while($row = mysqli_fetch_array($res))
                                            {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['pname']?></td>
                                                <td><?php echo $row['cname']?></td>
                                                <td><?php echo $row['pprice']?></td>
                                                <td ><?php echo $row['pdecription']?></td>
                                                <td><?php echo $row['pdiscount']?></td>
                                                <td><?php echo $row['pqty']?></td>
                                                <td>
                                                    <img width="100px" src="uploads/<?Php echo $row['pimage']?>" class="img-fluid" alt="">
                                                </td>

                                                <td>
                                                    <a href="./editproduct.php?id=<?php echo $row['pid']?>" class="btn btn-dark">EDIT</a>
                                                    <a href="./allproducts.php?id=<?php echo $row['pid']?>" class="btn btn-danger">DELETE</a>
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
                                    echo "<h1> No Record Found </h1>";
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