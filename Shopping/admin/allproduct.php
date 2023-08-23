<?php
include 'aside.php';
include 'connect.php';

if(isset($_GET['delid']))
{
    $Delid = $_GET['delid'];
    $del_product_query = "DELETE FROM products WHERE pid='$Delid'";

    $myres = mysqli_query($con,$del_product_query);
    if($myres)
    {
        echo "<script> alert('product deleted successfully')
        window.location.href='allproduct.php'
        </script>";
    }
    else
    {
        echo "<script> alert('product not deleted')'</script>";

    }
}
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
                <h4 class="page-title">MANAGE PRODUCTS</h4>
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
        </div>

        <div class="col-sm-12">
            <div class="white-box">
                <a href="addproduct.php" class='btn btn-info'>ADD NEW PRODUCT</a>
                <hr>
                <h3 class='mb-3'>ALL CATEGORIES </h3>
                <?php
                      $pro_query = "SELECT products.*,categories.cname  FROM products
                      INNER JOIN categories
                      ON categories.cid = products.cid";

                      $products_result = mysqli_query($con,$pro_query);

                      if(mysqli_num_rows($products_result) > 0)
                      {
                    ?>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Id</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Category</th>
                                <th class="border-top-0">Discount</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                        $counter = 1;
                                        while($pro_result = mysqli_fetch_assoc($products_result))

                                        {
                                            ?>
                            <tr>
                                <td><?php echo $counter++ ?></td>
                                <td><?php echo $pro_result['name']?></td>
                                <td><?php echo $pro_result['price']?></td>
                                <td><?php echo $pro_result['cname']?></td>
                                <td><?php echo $pro_result['discount']?></td>
                                <td><?php echo $pro_result['description']?></td>
                                <td><img style='height:70px' src="uploads/products/<?php echo $pro_result['image']?>"
                                        alt=""></td>
                                <td>
                                    <a href="editproduct.php?updateid=<?php echo $pro_result['pid']?>"
                                        class="btn btn-dark">EDIT</a>
                                    <a href="allproduct.php?delid=<?php echo $pro_result['pid']?>"
                                        class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                            <?php
                                        }
                                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
                   }
                   else
                   {
                    echo "<h1>products  not found</h1>";
                   }
                   

                   ?>
            </div>
        </div>
    </div>
    
</div>


<?php
include 'footer.php';
?>