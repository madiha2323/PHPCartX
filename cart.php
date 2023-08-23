<?php

    session_start();

    // session_destroy();
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        // echo 1;
        if(isset($_POST["add_to_cart"]))
        {
            if(isset($_SESSION["cart"]))
            {
                $myitems=array_column($_SESSION['cart'],'pid');

                if(in_array($_POST['pid'],$myitems))
                {
                        echo "<script>alert('Product already added')
                        window.location.href = 'shop.php';</script>";
                }
                else
                {
                    $count = count($_SESSION["cart"]);
                    $_SESSION['cart'][$count] =  array(
                        "pid" => $_POST['pid'],
                        "pname" => $_POST['pname'],
                        "pprice" => $_POST['pprice'],
                        "pimage" => $_POST['pimage'],
                        "pqty" => $_POST['pqty'],
                        "purcse_qty" => 1,
                        "total" => 1 * $_POST['pprice']
                    );
                    echo "<script>alert('Product added in Cart')
                    window.location.href = 'cartview.php';</script>";
                }
            }
            else
            {
                $_SESSION["cart"][0] = array(
                    "pid" => $_POST['pid'],
                    "pname" => $_POST['pname'],
                    "pprice" => $_POST['pprice'],
                    "pimage" => $_POST['pimage'],
                    "pqty" => $_POST['pqty'],
                    "purcse_qty" => 1,
                    "total" => 1 * $_POST['pprice']
                );
                echo "<script>alert('Product added in Cart')
                        window.location.href = 'cartview.php';</script>";
               
            }
        }
        else if(isset($_POST["remove_item"]))
        {
            // echo "remove clicked";

            foreach($_SESSION['cart'] as $key => $value)
            {
               
                if($value['pid'] == $_POST['pid'])
                {
                
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                   
                    echo "<script>alert('Product removed From Cart')
                        window.location.href = 'cartview.php';</script>";
                }
               
            }
        }

        else if(isset($_POST['mod_qty']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
               
                if($value['pid'] == $_POST['pid'])
                {
                
                    $_SESSION['cart'][$key]['purcse_qty'] = $_POST['mod_qty'];
                    $_SESSION['cart'][$key]['total'] = $_POST['mod_qty'] * $_SESSION['cart'][$key]['pprice'];
                    
                    echo "<script>
                    window.location.href = 'cartview.php';</script>";
                }
            }
              
        }

    }
    else
    {
        session_destroy();
    }
    
?>