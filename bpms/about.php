<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <style>
        .absolute-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            /* Adjust background color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            /* Example box shadow */
            z-index: 1000;
            /* Ensure it's on top of other content */
        }

        .container {
            max-width: 1200px;
            /* Adjust to fit your design */
            margin: 0 auto;
            /* Center the container */
        }

        .navbar {
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            /* Adjust font size */
            font-weight: bold;
            /* Example font weight */
            color: #333333;
            /* Adjust text color */
            text-decoration: none;
            /* Remove underline */
        }

        .navbar-brand span {
            color: black;
            /* Color for the second span */
        }

        .animated-text {
            display: inline-block;
            animation: moveUpDown 2s infinite alternate;
            /* Animation properties */
        }

        @keyframes moveUpDown {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-10px);
                /* Adjust this value to control the movement */
            }
        }

        .favrt {
            color: "d19f68";
        }
    </style>
    <title>Elegance Salon| About us Page</title>

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

    <!-- breadcrumbs -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner about ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name animated-text ">
                        About Us
                    </h3>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone"><a href="index.php" style="color:d19f68">Home <span
                                class="fa fa-angle-right" aria-hidden="true"></span></a>
                        <p>
                    </li>
                    <li class="active ">About</li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- breadcrumbs //-->
    <section class="w3l-content-with-photo-4" id="about">
        <div class="content-with-photo4-block ">
            <div class="container">
                <div class="cwp4-two row">
                    <div class="cwp4-image col-xl-6">
                        <img src="assets/images/about2.jpg" alt="product" width="100%">
                    </div>
                    <div class="cwp4-text col-xl-6 ">
                        <div class="posivtion-grid">
                            <h3 class="animated-text">Beauty and success starts here</h3>
                            <div class="hair-two-colums">
                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">
                                        Waxing</h5>
                                </div>
                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">Facial</h5>
                                </div>
                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">Hair makeup</h5>

                                </div>
                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">Massage</h5>

                                </div>
                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">Menicure</h5>
                                </div>

                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">Pedicure</h5>
                                </div>
                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">Hair Cut</h5>
                                </div>

                                <div class="hair-left">
                                    <h5 style="color:#d19f68;font-weight:bold">Body Spa</h5>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w3l-recent-work">
        <div class="jst-two-col">
            <div class="container">
                <div class="row">
                    <div class="my-bio col-lg-6">

                        <div class="hair-make">
                            <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                            <h5><a href="blog.html">
                                    <?php echo '<span class="animated-text" style="color:#d19f68; font-weight:bold;">' .  $row['PageTitle'];?>
                                </a></h5>
                            <p class="para mt-2">
                                <?php  echo $row['PageDescription'];?>
                            </p>
                            <?php } ?>
                        </div>


                    </div>
                    <div class="col-lg-6 ">
                        <img src="assets/images/b3.jpg" alt="product" class="img-responsive about-me">
                    </div>

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
    </script>
    <!-- /move top -->
</body>

</html>