<?php
include 'aside.php';
include 'connect.php';


    if (isset($_POST['add_product'])) 
    {
    $pname = $_POST['pname'];
    $cat_name = $_POST['cat_name'];
    $pprice = $_POST['pprice'];
    $pqty = $_POST['pqty'];
    $pdiscount = $_POST['pdiscount'];
    $pdescription = $_POST['pdescription'];


    $image_name = $_FILES['image']['name'];
    $image_temp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_name, 'uploads/products/'.$image_name);


    $ins_sql = "INSERT INTO `products`(`name`, `cid`, `price`, `description`, `quantity`, `discount`, `image`) VALUES ('$pname', '$cat_name','$pprice', '$pdescription', '$pqty', '$pdiscount'  , '$image_name')";
    $res = mysqli_query($con, $ins_sql);

    if ($res) {
        echo "<script> alert ('New Product added')
            window.location.href='allproduct.php'
            </script>";
    } else {
        echo "<script> alert ('Error')</script>";
    }
}


?>
<div class="page-wrapper" style="min-height: 250px;">


    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Products</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>

                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                <a href="./allproduct.php" class="btn btn-success mb-3">See All Products</a>
                <hr>
                    <h3 class="box-title">Add New Product </h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="">Product Name</label>
                                        <input type="text" name='pname' class="form-control" placeholder="Enter Product Name">
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="">Select Category
                                        </label>
                                        <select name="cat_name" class="form-select" class="form-control" id="">
                                            <?php

                                            $cat_sql = "SELECT * FROM categories";

                                            $cat_res = mysqli_query($con, $cat_sql);

                                            while ($cat_row = mysqli_fetch_assoc($cat_res)) { ?>
                                                <option value="<?php echo $cat_row['cid'] ?>"><?php echo $cat_row['cname'] ?></option>
                                            <?php } ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Price</label>
                                        <input type="text" name='pprice' class="form-control" placeholder="Enter Product Price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Qunatity</label>
                                        <input type="text"  class="form-control" placeholder="Enter Product Quantity" name='pqty'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Discount</label>
                                        <input type="text" name='pdiscount' class="form-control" placeholder="Enter Product Discount">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product description</label>
                                        <textarea name="pdescription" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="image" class="form_control">
                                    </div>

                                    <div class="my-3">
                                        <input type="submit" class="btn btn-success" name='add_product'>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
</div>
</div>









</div>
</div>
</div>

</div>
</div>
</div>
<?php
include 'footer.php'
?>