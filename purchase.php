<?php

session_start();
include 'Admin/connect.php';
$user_Data_Query = mysqli_query($con,"SELECT * FROM user where uemail='$_SESSION[user_login]'");
$user_Data = mysqli_fetch_assoc($user_Data_Query);
// echo $user_Data['uemail'];
if($_SERVER['REQUEST_METHOD']=="POST")
{
    // echo 1;
    if(isset($_POST["purchase"]))
    {
        
        $order_query = "INSERT INTO `orders`(`uid`, `pid`, `pname`, `pquatity`, `pprice`, `order_status`) VALUES ('?','?','?','?','?','?')";
        // $stmt = mysqli_prepare($con,$order_query);

        // if($stmt)
        // {
            
            // mysqli_stmt_bind_param($stmt,'iissss',$uid,$pid,$pname,$pqty,$pprice,$status);
            foreach($_SESSION['cart'] as $key => $value)
            {
                $order_query = "INSERT INTO `orders`(`uid`, `pid`, `pname`, `pquatity`, `pprice`, `order_status`) VALUES ('$user_Data[uid]','$value[pid]','$value[pname]','$value[purcse_qty]','$value[pprice]','pending')";

                mysqli_query($con,$order_query);


                mysqli_query($con,"UPDATE `products` SET `pqty` = pqty - $value[purcse_qty]  WHERE pid='$value[pid]'");



               
            }

            echo "<script>alert('Your Order is Placed');
            window.location.href='cartview.php'
            </script>";

            unset($_SESSION['cart']);
        // }
        // else
        // {
        //     echo "<script>alert('error in preparred error')
        //     window.location.href='profile.php'</script>";
        // }
    }
    
    
}

?>