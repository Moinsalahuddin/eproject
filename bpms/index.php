<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
 
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegance Salon | Home page</title>
  
  <title>Elegance Salon | Home Page</title>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
/* carousel */
.carousel{
    height: 100vh;
    /* margin-top: -50px; */
    width: 100vw;
    overflow: hidden;
    position: relative;
}
.carousel .list .item{
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0 0 0 0;
}
.carousel .list .item img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.carousel .list .item .content{
    position: absolute;
    top: 20%;
    width: 1140px;
    max-width: 80%;
    left: 50%;
    transform: translateX(-50%);
    padding-right: 30%;
    box-sizing: border-box;
    color: #fff;
    text-shadow: 0 5px 10px #0004;
}
.carousel .list .item .author{
    font-weight: bold;
    letter-spacing: 10px;
}
.carousel .list .item .title,
.carousel .list .item .topic{
    font-size: 5em;
    font-weight: bold;
    line-height: 1.3em;
}
.carousel .list .item .topic{
    color: #f1683a;
}
.carousel .list .item .buttons{
    display: grid;
    grid-template-columns: repeat(2, 130px);
    grid-template-rows: 40px;
    gap: 5px;
    margin-top: 20px;
}
.carousel .list .item .buttons button{
    border: none;
    background-color: #eee;
    letter-spacing: 3px;
    font-family: Poppins;
    font-weight: 500;
}
.carousel .list .item .buttons button:nth-child(2){
    background-color: transparent;
    border: 1px solid #fff;
    color: #eee;
}
/* thumbail */
.thumbnail{
    position: absolute;
    bottom: 50px;
    left: 50%;
    width: max-content;
    z-index: 100;
    display: flex;
    gap: 20px;
}
.thumbnail .item{
    width: 150px;
    height: 220px;
    flex-shrink: 0;
    position: relative;
}
.thumbnail .item img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
}
.thumbnail .item .content{
    color: #fff;
    position: absolute;
    bottom: 10px;
    left: 10px;
    right: 10px;
}
.thumbnail .item .content .title{
    font-weight: 500;
}
.thumbnail .item .content .description{
    font-weight: 300;
}
/* arrows */
.arrows{
    position: absolute;
    top: 80%;
    right: 52%;
    z-index: 100;
    width: 300px;
    max-width: 30%;
    display: flex;
    gap: 10px;
    align-items: center;
}
.arrows button{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #eee4;
    border: none;
    color: #fff;
    font-family: monospace;
    font-weight: bold;
    transition: .5s;
}
.arrows button:hover{
    background-color: #fff;
    color: #000;
}

/* animation */
.carousel .list .item:nth-child(1){
    z-index: 1;
}

/* animation text in first item */

.carousel .list .item:nth-child(1) .content .author,
.carousel .list .item:nth-child(1) .content .title,
.carousel .list .item:nth-child(1) .content .topic,
.carousel .list .item:nth-child(1) .content .des,
.carousel .list .item:nth-child(1) .content .buttons
{
    transform: translateY(50px);
    filter: blur(20px);
    opacity: 0;
    animation: showContent .5s 1s linear 1 forwards;
}
@keyframes showContent{
    to{
        transform: translateY(0px);
        filter: blur(0px);
        opacity: 1;
    }
}
.carousel .list .item:nth-child(1) .content .title{
    animation-delay: 1.2s!important;
}
.carousel .list .item:nth-child(1) .content .topic{
    animation-delay: 1.4s!important;
}
.carousel .list .item:nth-child(1) .content .des{
    animation-delay: 1.6s!important;
}
.carousel .list .item:nth-child(1) .content .buttons{
    animation-delay: 1.8s!important;
}
/* create animation when next click */
.carousel.next .list .item:nth-child(1) img{
    width: 150px;
    height: 220px;
    position: absolute;
    bottom: 50px;
    left: 50%;
    border-radius: 30px;
    animation: showImage .5s linear 1 forwards;
}
@keyframes showImage{
    to{
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 0;
    }
}

.carousel.next .thumbnail .item:nth-last-child(1){
    overflow: hidden;
    animation: showThumbnail .5s linear 1 forwards;
}
.carousel.prev .list .item img{
    z-index: 100;
}
@keyframes showThumbnail{
    from{
        width: 0;
        opacity: 0;
    }
}
.carousel.next .thumbnail{
    animation: effectNext .5s linear 1 forwards;
}

@keyframes effectNext{
    from{
        transform: translateX(150px);
    }
}

/* running time */

.carousel .time{
    position: absolute;
    z-index: 1000;
    width: 0%;
    height: 3px;
    background-color: none;
    left: 0;
    top: 0;
}

.carousel.next .time,
.carousel.prev .time{
    animation: runningTime 3s linear 1 forwards;
}
@keyframes runningTime{
    from{ width: 100%}
    to{width: 0}
}


/* prev click */

.carousel.prev .list .item:nth-child(2){
    z-index: 2;
}

.carousel.prev .list .item:nth-child(2) img{
    animation: outFrame 0.5s linear 1 forwards;
    position: absolute;
    bottom: 0;
    left: 0;
}
@keyframes outFrame{
    to{
        width: 150px;
        height: 220px;
        bottom: 50px;
        left: 50%;
        border-radius: 20px;
    }
}

.carousel.prev .thumbnail .item:nth-child(1){
    overflow: hidden;
    opacity: 0;
    animation: showThumbnail .5s linear 1 forwards;
}
.carousel.next .arrows button,
.carousel.prev .arrows button{
    pointer-events: none;
}
.carousel.prev .list .item:nth-child(2) .content .author,
.carousel.prev .list .item:nth-child(2) .content .title,
.carousel.prev .list .item:nth-child(2) .content .topic,
.carousel.prev .list .item:nth-child(2) .content .des,
.carousel.prev .list .item:nth-child(2) .content .buttons
{
    animation: contentOut 1.5s linear 1 forwards!important;
}

@keyframes contentOut{
    to{
        transform: translateY(-150px);
        filter: blur(20px);
        opacity: 0;
    }
}
@media screen and (max-width: 678px) {
    .carousel .list .item .content{
        padding-right: 0;
    }
    .carousel .list .item .content .title{
        font-size: 30px;
    }
}



 .img-responsive {
border-radius: 20px;
transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

.img-responsive:hover {
opacity: 0.8;
transform: scale(1.1);
}

.img-responsive:not(:hover) {
opacity: 1;
transform: scale(1);
}

  .img-responsive1 {
transition: transform 0.5s ease, opacity 0.5s ease;
border-radius: 20px;
}

.img-responsive1:hover {
opacity: 0.8;
transform: scale(0.9);
}

.img-responsive1:not(:hover) {
transition-delay: 0.1s; /* Delay the reverse transition */
opacity: 1;
transform: scale(1);
}


.w3l-header-4 .absolute-top {
padding: 20px 0px 20px;
background: #D19f68;
border-bottom: none;

}
    /* CSS for header and animation */
    .absolute-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #ffffff; /* Adjust background color */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Example box shadow */
        z-index: 1000; /* Ensure it's on top of other content */
    }

    .container {
        max-width: 1200px; /* Adjust to fit your design */
        margin: 0 auto; /* Center the container */
    }

    .navbar {
        padding: 15px 0;
    }

    .navbar-brand {
        font-size: 1.5rem; /* Adjust font size */
        font-weight: bold; /* Example font weight */
        color: #333333; /* Adjust text color */
        text-decoration: none; /* Remove underline */
    }

    .navbar-brand span {
        color: black; /* Color for the second span */
    }

    .animated-text {
        display: inline-block;
        animation: moveUpDown 2s infinite alternate; /* Animation properties */
    }

    @keyframes moveUpDown {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-10px); /* Adjust this value to control the movement */
        }
    }
/* assets/css/styles.css */


        .card-container {
        display: flex;
        justify-content: center;
        gap: 40px;
        }

        .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
        width: 300px;
        }

        .card:hover {
        transform: scale(1.05);
        }

        .card-image {
        height: 200px;
        background-size: cover;
        background-position: center;
        }

        .manicure {
        background-image: url('assets/img/manicure.jpg'); /* Replace with your image path */
        }

        .pedicure {
        background-image: url('assets/img/pedicure.jpg'); /* Replace with your image path */
        }

        .facial {
        background-image: url('assets/img/facial.jpg'); /* Replace with your image path */
        }

        .card-content {
        padding: 20px;
        text-align: center;
        }

        .card-content h2 {
        margin: 0 0 10px;
        }

        .card-content p {
        color: #555;
        }
        /* Add to your existing CSS file */

        /* Animation for card hover effect */
        .card:hover {
        animation: hoverEffect 0.3s forwards;
        }

        @keyframes hoverEffect {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.05);
        }
        }

        /* Image zoom-in effect */
        .card-image {
        transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-image {
        transform: scale(1.1);
        }

        /* Fade-in effect for card content */
        .card-content {
        animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
        }
        .manicure{
        background-image: url(./assets/images/manicure.jpg);
        }
        .pedicure{
        background-image: url(./assets/images/pedicur.jpg);
        }
        .facial{
        background-image: url(./assets/images/facial.jpg);
        }
        </style>

<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style-starter.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>


  <body id="home">

<?php include_once('includes/header.php');?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
<!-- disable body scroll which navbar is in active -->

<!-- Carousel -->
      <!-- carousel -->
      <div class="carousel mt-5">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="pictures/img1.jpg">
                <div class="content">
                    <div class="author">Discover Your Radience at</div>
                    <div class="title">ELEGANCE SALON</div>
                    <div class="topic"></div>
                    <div class="des">
                        <!-- lorem 50 -->
                        our passionate team is dedicated to making you look and feel your absolute best. Experience the pinnacle of beauty and relaxation at our where every visit promises to elevate your senses and leave you glowing with confidence."
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="pictures/img2.jpg">
                <div class="content">
                    <div class="author">Discover Your Radience at</div>
                    <div class="title">ELEGANCE SALON</div>
                    <div class="topic"></div>
                    <div class="des">
                        <!-- lorem 50 -->
                        our passionate team is dedicated to making you look and feel your absolute best. Experience the pinnacle of beauty and relaxation at our where every visit promises to elevate your senses and leave you glowing with confidence."
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="pictures/img3.jpg">
                <div class="content">
                    <div class="author">Discover Your Radience at</div>
                    <div class="title">ELEGANCE SALON</div>
                    <div class="topic"></div>
                    <div class="des">
                        <!-- lorem 50 -->
                        our passionate team is dedicated to making you look and feel your absolute best. Experience the pinnacle of beauty and relaxation at our where every visit promises to elevate your senses and leave you glowing with confidence."
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="pictures/img4.jpg">
                <div class="content">
                    <div class="author">Discover Your Radience at</div>
                    <div class="title">ELEGANCE SALON</div>
                    <div class="topic"></div>
                    <div class="des">
                        <!-- lorem 50 -->
                        our passionate team is dedicated to making you look and feel your absolute best. Experience the pinnacle of beauty and relaxation at our where every visit promises to elevate your senses and leave you glowing with confidence."
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="pictures/img1.jpg">
            </div>
            <div class="item">
                <img src="pictures/img2.jpg">
            </div>
            <div class="item">
                <img src="pictures/img3.jpg">
            </div>
            <div class="item">
                <img src="pictures/img4.jpg">
                </div>
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>





<!-- Carousel end -->
<section class="w3l-call-to-action_9">
    <div class="call-w3 ">
        <div class="container">
            <div class="grids">
                    <div class="grids-content row">

                        <div class="column col-lg-4 col-md-6 color-2 ">
                            <div>
                            <h4 style="color:black;FONT-Family:arial" class=animated-text>Our Salon is Most Popular</h4>
                            <p class="para ">Eline Hair and Beauty Salon Offers - Beauty Services</p>
                            <a href="about.php" class="poka btn mt-md-4 mt-3" style="color:#d19f68;font-weight:bold">Read more</a>
                        </div>
                    </div>
                        <div class="column col-lg-4 col-md-6 col-sm-6 back-image  ">
                            <img src="assets/images/img5.jpg" alt="product" class="img-responsive ">
                        </div>
                        <div class="column col-lg-4 col-md-6 col-sm-6 back-image2 ">
                            <img src="assets/images/img6.jpg" alt="product" class="img-responsive ">
                          </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<section class="w3l-teams-15">
	<div class="team-single-main ">
		<div class="container">
		
				<div class="column2 image-text">
					<h3 style="color:#d19f68;font-weight:bold" class="animated-text">Come experience the secrets of relaxation</h3>
					<p class="para  text ">
						Best Beauty expert at your home and provides beauty salon at home. Home Salon provide well trained beauty professionals for beauty services at home including Facial, Clean Up, Bleach, Waxing,Pedicure, Manicure, etc.</p>
						<a href="book-appointment.php" class="btn gap  top-margin mt-4"style="color:black;font-weight:bold;background-color:#d19f68">Get An Appointment</a>
				</div>
			</div>
		</div>
	</div>
  <div class="card-container mt-5 mb-5">
        <div class="card">
            <div class="card-image manicure"></div>
            <div class="card-content">
                <h2>Manicure</h2>
                <p>Experience the best manicure services to keep your nails looking fresh and beautiful.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-image pedicure"></div>
            <div class="card-content">
                <h2>Pedicure</h2>
                <p>Relax with our professional pedicure services that leave your feet feeling rejuvenated.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-image facial"></div>
            <div class="card-content">
                <h2>Facial</h2>
                <p>Pamper yourself with our luxurious facial treatments for glowing, healthy skin.</p>
            </div>
        </div>
    </div>
</section>
<section class="w3l-specification-6">
    <div class="specification-layout ">
        <div class="container">
            <div class=" row">
                <div class="col-lg-6 back-image">
                    <img src="assets/images/b1.jpg" alt="product" class="img-responsive1 ">
                </div>
                <div class="col-lg-6 about-right-faq align-self">
                    <h3 class="title-big" ><a href="./about.php" style="color:#d19f68;font-weight:bold" class="animated-text">Clean and Recommended Hair Salon</a></h3>
                    <p class="mt-3 para"> Their array of beauty parlour services include haircuts, hair spas, colouring, texturing, styling, waxing, pedicures, manicures, threading, body spa, natural facials and more.</p>
                        <div class="hair-cut">
                            <div >
                    <ul class="w3l-right-book">
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Hair cut with Blow dry</a></li>
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Color & highlights</a></li>
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Shampoo & Set</a></li>
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Blow Dry & Curl</a></li>
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Advance Hair Color</a></li>
                    </ul>
                </div>
                    <div  class="image-right">
                        <ul class="w3l-right-book">
                            <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Back Massage</a></li>
                            <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Hair Treatment</a></li>
                            <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Face Massage</a></li>
                            <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Skin Care</a></li>
                            <li><span class="fa fa-check" aria-hidden="true"></span><a href="about.php"style="color:#d19f68;font-weight:bold">Body Therapies</a></li>
                        </ul>
                </div>
            </div>
        </div>
</section>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
            document.getElementById("movetop").style.backgroundColor = "#d19f68";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}

  //step 1: get DOM
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');

let carouselDom = document.querySelector('.carousel');
let SliderDom = carouselDom.querySelector('.carousel .list');
let thumbnailBorderDom = document.querySelector('.carousel .thumbnail');
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
let timeDom = document.querySelector('.carousel .time');

thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
let timeRunning = 3000;
let timeAutoNext = 7000;

nextDom.onclick = function(){
    showSlider('next');    
}

prevDom.onclick = function(){
    showSlider('prev');    
}
let runTimeOut;
let runNextAuto = setTimeout(() => {
    next.click();
}, timeAutoNext)
function showSlider(type){
    let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');
    
    if(type === 'next'){
        SliderDom.appendChild(SliderItemsDom[0]);
        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        carouselDom.classList.add('next');
    }else{
        SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
        thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]);
        carouselDom.classList.add('prev');
    }
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext)
}
</script>
<!-- /move top -->
</body>

</html>