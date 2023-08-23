<?php
        include 'connect.php';
            
            $errors = array('name'=>'','catagory'=>'','price'=>'','des'=>'','qty'=>'','discount'=>'');
            if(isset($_POST["addproduct"]))
            {
               
                
                if(empty($_POST['name']))
                {
                    $errors['name'] = '<span class="text-danger">Field is Required </span>';
                }
                if(empty($_POST['catagory']))
                {
                    $errors['catagory'] = '<span class="text-danger">Field is Required </span>';
                }
                else if($_POST['catagory'] == 'select')
                {
                    $errors['catagory'] = '<span class="text-danger">Please select some catagory </span>';
                
                }
                if(empty($_POST['price']))
                {
                    $errors['price'] = '<span class="text-danger">Field is Required </span>';
                }
                if(empty($_POST['desciption']))
                {
                    $errors['des'] = '<span class="text-danger">Field is Required </span>';
                }
                if(empty($_POST['pqty']))
                {
                    $errors['qty'] = '<span class="text-danger">Field is Required </span>';
                }
                if(empty($_POST['pdiscount']))
                {
                    $errors['discount'] = '<span class="text-danger">Field is Required </span>';
                }

                if(array_filter($errors))
                {
                    echo "<script>alert('fakse')</script>";
                   
                }
                else
                {
                    $pname = $_POST['name'];
                    $cat = $_POST['catagory'];
                    $price = $_POST['price'];
                    $des = $_POST['desciption'];
                    $qty = $_POST['pqty'];
                    $discount = $_POST['pdiscount'];


                    $imga_name = $_FILES['image']['name'];
                    $imga_temp_name = $_FILES['image']['tmp_name'];
                    move_uploaded_file($imga_temp_name,"uploads/".$imga_name);

                    $sql1 = "INSERT INTO `products`(`pname`, `cid`, `pprice`, `pdecription`, `pimage`, `pdiscount`, `pqty`) VALUES ('{$pname}','{$cat}','{$price}','{$des}','{$imga_name}','{$discount}','{$qty}')";

                    $res1 = mysqli_query($con,$sql1);
                    
                    header('location: allproducts.php');
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
        <div class="page-wrapper" style="min-height: 250px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Blank Page</h4>
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

                            <a class="btn btn-dark" href="./allproducts.php">View ALll PRdoucts</a>


                            <hr>
                            <h3 class="box-title">Add  Product</h3>

                            <div class="row">
                                <div class="col-8 mx-auto shadow ">

                                    <form action="" class="p-3" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="">Product Name</label>
                                                <input type="text" name="name" class="form-control">

                                                <?php echo $errors['name']?>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Product Catagory</label>
                                                <select name="catagory" class="form-control">
                                                    <option value="select">Select Catagory </option>

                                                    <?php
                                                        
                                                        $sql = "SELECT * from catagories";
                                                        $res = mysqli_query($con,$sql);
                                                        
                                                        while($row = mysqli_fetch_array($res))
                                                        {
                                                    ?>
                                                    
                                                    <option value="<?php echo $row['cid']?>"><?php echo $row['cname']?></option>
                                                    
                                                    <?php } ?>

                                                </select>
                                                <?php echo $errors['catagory']?>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Product Price</label>
                                                <input type="number" name="price" class="form-control">
                                                <?php echo $errors['price']?>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Desciption</label>
                                                <textarea  name="desciption" class="form-control"></textarea>
                                                <?php echo $errors['des']?>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label for="">discount</label>
                                                <input type="number" name="pdiscount" class="form-control">
                                                <?php echo $errors['discount']?>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Quanitity</label>
                                                <input type="number" name="pqty" class="form-control">
                                                <?php echo $errors['qty']?>
                                            </div>

                                            <div class="form-group">
                                                <label for="">image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>

                                            <div class="form-group mt-2">
                                                
                                                <input type="submit" name="addproduct" value="Add Product" class="btn btn-dark">
                                            </div>
                                    </form>
                                </div>
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