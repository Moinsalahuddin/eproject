<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {

    $uid=$_SESSION['bpmsuid'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $msg=$_POST['message'];
    $aptnumber = mt_rand(100000000, 999999999);
  
    $query=mysqli_query($con,"insert into tblbook(UserID,AptNumber,AptDate,AptTime,Message) value('$uid','$aptnumber','$adate','$atime','$msg')");

    if ($query) {
$ret=mysqli_query($con,"select AptNumber from tblbook where tblbook.UserID='$uid' order by ID desc limit 1;");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
 echo "<script>window.location.href='thank-you.php'</script>";  
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>
<!doctype html>
<html lang="en">
  <head>
  <style>
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

    .w3l-contact-info-main .cont-right p a:hover {
  color: #d19f68;
  text-decoration: none; 
  transition: 0.5s all;
  font-weight: bold;
}


.w3l-contact-info-main button.btn-contact {
    border: none;
    font-size: 16px;
    padding: 15px 30px;
    margin: 20px auto 0;
    color: #fff;
    background: #000000;
    border-color: #000000;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border-radius: 6px;
}

 </style>

    <title>Elegance Salon | Appointment Page</title>

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
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name animated-text ">Book Appointment</h3>
          </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Book Appointment</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view">
                <div class="cont-details">
                    <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class="fa fa-phone text-darks"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Call Us</h6>
                            <p class="para"><a href="tel:+44 99 555 42" class="text-dark">+<?php  echo $row['MobileNumber'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-darks"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Email Us</h6>
                            <p class="para"><a href="mailto:example@mail.com" class="mail text-dark"><?php  echo $row['Email'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-darks"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Address</h6>
                            <p class="para"> <?php  echo $row['PageDescription'];?></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-darks"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Time</h6>
                            <p class="para"> <?php  echo $row['Timing'];?></p>
                        </div>
                    </div>
               <?php } ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <form method="post">
                        <div style="padding-top: 30px;">
                            <label>Appointment Date</label>
                            
                            <input type="date" class="form-control appointment_date" placeholder="Date" name="adate" id='adate' required="true"></div>
                        <div style="padding-top: 30px;">
                            <label>Appointment Time</label>
                            
                            <input type="time" class="form-control appointment_time" placeholder="Time" name="atime" id='atime' required="true"></div>

                        <div style="padding-top: 30px;">
                        <textarea class="form-control" id="message" name="message" placeholder="Message" required=""></textarea></div>
                        <button type="submit" class="btn btn-contact" name="submit">Make an Appointment</button>
                    </form>
                </div>
    </div>
   
    </div></div>
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
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#adate').attr('min', maxDate);
});</script>
<!-- /move top -->
</body>

</html><?php } ?>