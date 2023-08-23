<?php
include 'aside.php';
include 'connect.php';



$update_id = $admin_data['id'];
if(isset($_POST['update']))
{
    $name = $_REQUEST['username'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    $update_query = "UPDATE admin SET name='$name', password = '$password', number='$number' WHERE id='$update_id'";
    $res = mysqli_query($con,$update_query);
    if($res)
    {
        echo "<script> alert('Profile Updated Successfully')
        window.location.href='profile.php'</script>";
    }
    else
    {
        echo "<script> alert('Some Errors Occurred')</script>";
    }
}


if(isset($_POST['update_image']))
{
    $image_name =$_FILES['image']['name'];
    $temp_name =$_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name,'uploads/admin_profiles/'.$image_name);



    $updare_img_query = "UPDATE admin set image='$image_name' where id='$update_id'";
        $result1 = mysqli_query($con,$updare_img_query);
    if($result1)
    {
        echo "<script>alert('Profile Image Updated Successfully!')
        window.location.href='profile.php'</script>";
    }
    else
    {
        echo "<script>alert('ERROR!')</script>";
    }
}
?>     
        <div class="page-wrapper">
            
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
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
                    
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="uploads/admin_profiles/<?php echo $admin_data['image']?>"
                                                 class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white mt-2"><?php echo $admin_data['name'] ?></h4>
                                        <h5 class="text-white mt-2"><?php echo $admin_data['email'] ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                              <form action="" method="post" enctype="multipart/form-data">
                                  <input type="file" name='image' class="form-control">
                                  <button type="submit" name
                                  ='update_image' class="mt-2 btn btn-info">Update Image</button>
                              </form>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  
                                            value='<?php echo $admin_data['name'] ?>'
                                             class="form-control p-0 border-0" name='username'>  </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input  type="email" value='<?php echo $admin_data['email'] ?>'
                                                class="form-control p-0 border-0" name="example-email"
                                                name='email'
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value='<?php echo $admin_data['password'] ?>' class="form-control p-0 border-0"  name='password'>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone No</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value='<?php echo $admin_data['number'] ?>'
                                                class="form-control p-0 border-0"  name='number'>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type='submit' name='update' class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
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
            <?php
include 'footer.php'?>