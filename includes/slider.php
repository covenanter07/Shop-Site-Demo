<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel Example</title>
    <style>
    .carousel-inner img {
        width: 100%;
        height: auto;
        max-height: 500px;
    }

    @media (max-width: 767px) {

        /* 針對寬度小於 768px 的裝置 */
        .carousel-inner img {
            height: 300px;
            /* 根據你的需求調整高度 */
            object-fit: cover;
            /* 保持圖片的比例 */
        }
    }

    @media (min-width: 768px) {

        /* 針對寬度大於等於 768px 的裝置 */
        .carousel-inner img {
            height: auto;
            /* 根據你的需求調整高度 */
            max-height: 500px;
        }
    }
    </style>
</head>

<body>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/slider.jpg" height="500px" class="d-block w-100" alt="slider image">
            </div>
            <div class="carousel-item">
                <img src="assets/images/slider2.jpg" height="500px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/images/slider3.jpg" height="500px" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>