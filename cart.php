<?php
ob_start();
include('includes/header.php');
include('functions/userfunction.php');
include('authencticate.php');
?>


<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="cart.php">
                Cart
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">
                        <?php $items = getCartItems();
                        if (mysqli_num_rows($items) > 0) {
                        ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Remove</h6>
                                </div>
                            </div>

                            <?php
                            foreach ($items as $citem) {

                            ?>
                                <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80">
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['name'] ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>On Sales <?= $citem['selling_price'] ?></h5>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">

                                            <div class="input-group mb-3" style="width:130px;">
                                                <button class="input-group-text decrement-btn updateQty">-</button>
                                                <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled>
                                                <button class="input-group-text increment-btn updateQty">+</button>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                                <i class="fa fa-trash me-2"></i>Remove</button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card card-body">
                                <h4 class="py-3">Your cart is empty</h4>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>
<?php ob_end_flush(); 
