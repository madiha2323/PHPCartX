<?php
    include 'aside.php';
    include 'connect.php';

//add category
    if(isset($_POST['add_category']))
    {
        $cat_name = $_POST['cat_name'];

        $insert_cat_query = "INSERT INTO categories (cname) values ('$cat_name') ";
        $result = mysqli_query ($con,$insert_cat_query);
        if($result)
        {
            echo "<script> alert ('New category added')</script>";
        }
        else
        {
            echo "<script> alert ('Error')</script>";
            
        }
    }
  
    //delete query
if(isset($_GET['delid']))
{
    $Delid = $_GET['delid'];
    $del_cat_query = "DELETE FROM categories WHERE cid='$Delid'";

    $myres = mysqli_query($con,$del_cat_query);
    if($del_res)
    {
        echo "<script> alert('Deleted Successfully')window.location.href='addcat.php'</script>";
    }
    else
    {
        echo "<script> alert('Deletion Failed')'</script>";

    }
}






?>
<div class="page-wrapper" style="min-height: 250px;">


    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Categories</h4>
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
                    <h3 class="box-title">Add Categories</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <h3 class='mb-3'>ADD NEW CATEGORY</h3>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name='cat_name' class="form-control"
                                            placeholder="Enter Category Name">

                                        <div class="my-3">
                                            <input type="submit" class="btn btn-success" name='add_category'>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class='mb-3'>ALL CATEGORIES</h3>
                    <?php
                               $categories_query = "SELECT *  from 
                               categories ";
                               $cat_result = mysqli_query($con,   $categories_query);
                               if(mysqli_num_rows($cat_result)> 0)
                               {?>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">S.No</th>
                                    <th class="border-top-0">Category Name</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            <tbody>
                                <?php


                                $counter = 1;
                        while($row = mysqli_fetch_assoc($cat_result))
                                    {
                                 ?>
                                <tr>
                                    <td><?php echo $counter++ ?></td>
                                    <td><?php echo $row['cname']?></td>
                                    <td>

                                       <a href="./editcat.php?editid=<?php echo $row['cid']?>" class="btn btn-success"?>EDIT</a>
                                        
                                        <a  href= "addcate.php?delid=<?php echo $row ['cid']?>"class="btn btn-danger">DELETE</a>
                                        
                                    </td>
                                </tr>


                                <?php } ?>
                            </tbody>
                            </thead>

                        </table>
                    </div>


                    <?php
                                // echo"<h5> CATEGOREIS FOUND</h5>";


                                    
                               }
                              else
                               {
                                    echo"<h5> NO CATEGOREIS FOUND</h5>";
                               }
                               
                               ?>
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