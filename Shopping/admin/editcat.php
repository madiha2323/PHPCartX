<?php
    include 'aside.php';
    include 'connect.php';
    //edit query
$update_id = $_GET['editid'];
$pre_data_res = mysqli_query($con,"SELECT * FROM `categories` WHERE cid = '$update_id'");
$cat_prev_data = mysqli_fetch_assoc($pre_data_res);

if(isset($_POST['edit_cat']))
{
    $name = $_POST['name'];

    $edit_cat_query = "UPDATE categories set cname = '$name' where cid='$update_id'";

    $edit_query_res = mysqli_query($con, $edit_cat_query);
    if( $edit_query_res)
    {
        echo"<script> alert ('Category Updated Successfully')
        window.location.href='addcate.php'</script>";
    }
    else
    {
        echo"<script> alert ('Category not Updated Successfully')
        </script>";
    }

}
?>

<div class="page-wrapper" style="min-height: 250px;">


    <div class="container-fluid">

        <div class="row center">
            <div class="col-md-10 " >
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="white-box">
                                <h3 class='mb-3'>EDIT CATEGORY</h3>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" 
                                        name='name' value='<?php echo $cat_prev_data['cname']?>'
                                        class="form-control">
                                            
                                        <div class="my-3">
                                            <input type="Submit" class="btn btn-dark"  
                                            value="UPDATE"
                                            name='edit_cat'>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
