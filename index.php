<?php

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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro deleniti eos qui at? Aut odio, ipsam
                    adipisci aliquam dolor nisi accusantium quod non nam possimus tenetur quo sit dolorum molestiae?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro deleniti eos qui at? Aut odio, ipsam
                    <br>
                    adipisci aliquam dolor nisi accusantium quod non nam possimus tenetur quo sit dolorum molestiae?
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
                <h4 class="text-white">Address</h4>
                <p class="text-white">
                    #19, Howllod Stair,
                    3th street, wer ploor,
                    matetae, Misa.
                </p>
                <a href="tel:+8975412367" class="text-white"> <i class="fa fa-phone"></i> +32 546273737</a><br>
                <a href="mailto:ecs@gmail.com" class="text-white"> <i class="fa fa-envelope"></i> ecs@gmail.com</a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.64414927224!2d135.83762821471737!3d34.68892959135734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600139907a0876dd%3A0xf890ac3f9dd53c8f!2zVMWNZGFpLWpp!5e0!3m2!1szh-TW!2stw!4v1681054794941!5m2!1szh-TW!2stw" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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


<?php include('includes/footer.php'); ?>

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