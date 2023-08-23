<?Php
include 'header.php';

?>
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>



<section class="container py-5">

    <?php
        if(@$_SESSION['cart'] == null)
        {
            echo "<h1> Your cart is Empty </h1>";
        }
        else
        {

        ?>
    <div class="row">
        <div class="col-md-9 col-12">
            <h3 class="text-center my-2">Your cart</h3>
            <table class="table table-bordered">
                <tr>
                    <th>imaage</th>
                    <th>name</th>
                    <th>Price</th>
                    <th>qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                <?php

                foreach(@$_SESSION['cart'] as $key=>$value)
                {
                    ?>

                <tr>
                    <td>
                        <img src="Admin/uploads/<?=  $value['pimage']?>" alt="" style="width : 100px">
                    </td>
                    <td><?=  $value['pname']?></td>
                    <td>
                        <?= $value['pprice']?>
                        <input type="hidden" class="price" value='<?= $value['pprice']?>'>
                    </td>
                    <td>
                        <form action="./cart.php" method='post'>
                            <input type="hidden" value='<?=  $value['pid']?>' name='pid'>
                            <input class="qty" type="number" value='<?=  $value['purcse_qty']?>'
                                class="form-control w-75" min="1" max="<?=  $value['pqty']?>"
                                onchange='this.form.submit();' name='mod_qty'>
                        </form>
                    </td>
                    <td class='total'>
                        <?= $value['total']?>
                    </td>
                    <td>
                        <form action="./cart.php" method='post'>
                            <input type="hidden" value='<?=  $value['pid']?>' name='pid'>
                            <button class="btn btn-outline-danger" type='submit' name='remove_item'>Remove</button>
                        </form>

                    </td>


                </tr>

                <?php } ?>

            </table>
        </div>

        <div class="col-12 col-md-3">
            <ul class="list-group mt-5">
                <li class="list-group-item">Total bill is <span id="grand_total"></span> </li>

            </ul>

            <?php
             if (isset($_SESSION['user_login']))
             {
            ?>

            <form action="purchase.php" method='post'>
                <button class='btn btn-info w-100 mt-2' type='submit' name='purchase'>Purchase Now</button>
            </form>

            <?php }
            
            else
            {

            ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Purchase Now
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Login ALert</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            You must Login First To Purchase
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php }  ?>
        </div>
    </div>

    <?php } ?>

            <script>
            var total = document.querySelectorAll(".total");
            var grand_total = document.querySelector("#grand_total");


            function subtotal() {

                var sum = 0;

                for (i = 0; i < total.length; i++) {
                    sum += Number(total[i].innerText);
                }
                grand_total.innerText = sum;

            }
            subtotal();
            </script>

</section>

<!-- Start Footer -->
<?Php
    include 'footer.php';

    ?>
<!-- End Footer -->

<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<!-- End Script -->
</body>

</html>