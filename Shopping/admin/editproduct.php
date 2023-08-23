<?php
include 'aside.php';
include 'connect.php';

$update_id = $_GET['updateid'];

$prev_data_res = mysqli_query($con,"SELECT * from products where pid ='$update_id'");

$pre_data_row = mysqli_fetch_assoc($prev_data_res);

if(isset($_POST['update_product']))
{
    $pname = $_POST['pname'];
    $cat_name = $_POST['cat_name'];
    $pprice = $_POST['pprice'];
    $pqty = $_POST['pqty'];
    $pdiscount = $_POST['pdiscount'];
    $pdescription = $_POST['pdescription'];


    $update_pro_res = mysqli_query($con,"UPDATE `products` SET `name`='$pname',`cid`=' $cat_name',`price`='$pprice',`quantity`='$pqty',`description`='$pdescription',`discount`='$pdiscount' WHERE pid= 'update_id' ");

    if ($update_pro_res) {
        echo "<script> alert ('Product Updated Succeefully')
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
                <h4 class="page-title">Update Product</h4>
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

                    <h3 class="box-title">Update Product </h3>
                    <hr>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">

                            
                            <form action="" method="post" >
                                    <div class="mb-3">
                                        <label for="">Product Name</label>
                                        <input type="text" name='pname' class="form-control" value='<?php echo $pre_data_row['name']?>'>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="">Select Category
                                        </label>
                                        <select name="cat_name" class="form-select" class="form-control" id="">
                                            <?php

                                            $cat_sql = "SELECT * FROM categories";

                                            $cat_res = mysqli_query($con, $cat_sql);

                                            while ($cat_row = mysqli_fetch_assoc($cat_res)) 
                                            {
                                                if($cat_row['cid'] == $pre_data_row['cid'])
                                                {?>
<option selected value="<?php echo $cat_row['cid'] ?>"><?php echo $cat_row['cname'] ?></option>
                                                


                                                
                                                
                                            <?php }
                                        
                                        else

                                        {?>
<option  value="<?php echo $cat_row['cid'] ?>"><?php echo $cat_row['cname'] ?></option>
                                        
                                        
                                      <?php  } } ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Price</label>
                                        <input type="text" name='pprice' class="form-control" value='<?php echo $pre_data_row['price']?>'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Qunatity</label>
                                        <input type="text"  class="form-control"  name='pqty' value='<?php echo $pre_data_row['quantity']?>'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product Discount</label>
                                        <input type="text" name='pdiscount' class="form-control" value='<?php echo $pre_data_row['discount']?>'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Product description</label>
                                        <input name="pdescription" id="" type="text" class="form-control" value='<?php echo $pre_data_row['description']?>'>
                                    </div>
                                   

                                    <div class="my-3">
                                        <input type="submit" class="btn btn-success" name='update_product' value="Update">
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