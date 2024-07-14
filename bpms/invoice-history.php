<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{



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

    <title>Elegance Salon | Invoice History</title>

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
            <h3 class="header-name animated-text">Invoice History</h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Invoice History</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div>
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content">
                    <h4 style="padding-bottom: 20px;text-align: center;color: #d19f68;font-weight:bold;font-family:arial">Invoice History</h4>
                        <table class="table" border="1">
                            <thead >
                                <tr> 
                                <th>#</th> 
                                <th>Invoice Id</th> 
                                <th>Customer Name</th>
                                <th>Customer Mobile Number</th>
                                <th>Invoice Date</th> 
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <?php
                                   $userid= $_SESSION['bpmsuid'];
 $query=mysqli_query($con,"select distinct tbluser.ID as uid, tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tblinvoice.BillingId,date(tblinvoice.PostingDate) as PostingDate  from  tbluser   
    join tblinvoice on tbluser.ID=tblinvoice.Userid where tbluser.ID='$userid'order by tblinvoice.ID desc");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
               <tr> 
                            <th scope="row"><?php echo $cnt;?></th> 
                            <td><?php  echo $row['BillingId'];?></td>
                            <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                            <td><?php  echo $row['MobileNumber'];?></td>
                            <td><?php  echo $row['PostingDate'];?></td> 
                                <td><a href="view-invoice.php?invoiceid=<?php  echo $row['BillingId'];?>" class="btn btn-dark">View</a></td> 

                          </tr><?php $cnt=$cnt+1; } ?>
                             
                            </tbody>
                        </table>
                    </div> </div>
                
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

</html><?php } ?>