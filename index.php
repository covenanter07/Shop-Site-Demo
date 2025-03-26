<?php
ob_start();
include('includes/header.php');
include('includes/slider.php');
include('functions/userfunction.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <hr>
                <div class="underline mb-2"></div>

                <div class="owl-carousel">
                    <?php
                    $trendingProducts = getAllTrening();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="item">
                                <a href="product-view.php?product=<?= $item['slug']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                            <h5 class="text-center"><?= $item['name']; ?></h5>

                                        </div>
                                    </div>
                                </a>

                            </div>

                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-facede">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <p>
                    Welcome to our fashion shopping website! This is an e-commerce platform dedicated to selling clothing, backpacks, and shoes, aiming to provide high-quality products and a convenient shopping experience. 
                    Whether you're pursuing trendy fashion or practical functionality, we can meet your needs.
                </p>
                <p>
                    You can easily register an account and log in to manage your shopping cart and favorite items anytime. 
                    Additionally, we offer secure payment options to ensure your transactions are safe.
                </p>
                <p>
                    High-quality products: Carefully selected for durability and outstanding design.
                </p>
                <p>
                    Excellent service: Fast delivery and friendly customer support.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">E-shop</h4>
                <div class="underline mb-2"></div>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home</a> <br>
                <a href="#" class="text-white"><i class="fa fa-angle-right"></i> About Us</a> <br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart</a> <br>
                <a href="category.php" class="text-white"><i class="fa fa-angle-right"></i>Our Collections</a>
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Contact</h4>
                <p>
                    <li class="text-white">E-commerce Collaboration</li>
                    <li class="text-white">Online Media Collaboration</li>
                </p>
                <a href="tel:+8975412367" class="text-white"> <i class="fa fa-phone"></i> +32 546273737</a><br>
                <a href="mailto:ecompshop@gmail.com" class="text-white"> <i class="fa fa-envelope"></i> ecompshop@gmail.com</a>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 class=text-white fw-bold">All rights reserved. Copyright @ Hsuan CodeWorker - <?= date('Y') ?>
        </p>
    </div>
</div>


<?php include('includes/footer.php'); 
ob_end_flush();
?>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    });
</script>
