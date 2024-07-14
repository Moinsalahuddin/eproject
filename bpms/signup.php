<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    
    echo "<script>alert('You have successfully registered.');</script>";
  }
  else
    {
    
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <style>
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

.w3l-contact-info-main button.btn-contact:hover {
  background: #d19f68; }
 </style>

    <title>Elegance Salon | Signup Page</title>

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
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name animated-text ">
                
 Signup
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Signup</li>
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
                            <span class="fa fa-phone text-dark"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Call Us</h6>
                            <p class="para"><a class="text-dark" href="tel:+44 99 555 42">+<?php  echo $row['MobileNumber'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-dark"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Email Us</h6>
                            <p class="para"><a class="text-dark href="mailto:example@mail.com" class="mail"><?php  echo $row['Email'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-dark"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Address</h6>
                            <p class="para"> <?php  echo $row['PageDescription'];?></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-dark"></span>
                        </div>
                        <div class="cont-right">
                            <h6 style="color:#d19f68;font-weight:bold">Time</h6>
                            <p class="para"> <?php  echo $row['Timing'];?></p>
                        </div>
                    </div>
               <?php } ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4 animated-text">
                    <h3 style="color:#d19f68">Register with us!!</h3>
                    <form method="post" name="signup" onsubmit="return checkpass();">

                        <div style="padding-top: 30px;">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required=""></div>
                           <div style="padding-top: 30px;">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required="">
                        </div>
                        <div style="padding-top: 30px;">
                            <label>Mobile Number</label>
                           <input type="text" class="form-control" placeholder="Mobile Number" required="" name="mobilenumber" pattern="[0-9]+" maxlength="10"></div>
                           <div style="padding-top: 30px;">
                            <label>Email address</label>
                            <input type="email" class="form-control" class="form-control" placeholder="Email address" required="" name="email">
                        </div>
                         <div style="padding-top: 30px;">
                            <label>Password</label>
                           <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                       </div>
                       <div style="padding-top: 30px;">
                        <label>Repeat password</label>
                            <input type="password" class="form-control" name="repeatpassword" placeholder="Repeat password" required="true">
                        </div>
                      
                        <button type="submit" class="btn btn-contact" name="submit">Signup</button>
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
</script>
<!-- /move top -->
</body>

</html>