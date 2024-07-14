<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

$vid=$_GET['viewid'];
$isread=1;
$query=mysqli_query($con, "update   tblcontact set IsRead ='$isread' where ID='$vid'");

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>BPMS || Manage Unread Enquiry</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<style>
	.tables h4 {
		.table-responsive {
    background-color: #d19f68; /* Dark background color on hover */
    color: #26262c; /* White text color on hover */
	 }
    
  }

  .tables h4 {
    font-size: 1.4em;
    margin-bottom: 1em;
    color: #26262c;
}
  h3.title1 {
    font-size: 2em;
    color: #26262c;
    margin-bottom: 0.8em;
}
.form-title {
    padding: 1em 2em;
    background-color: #d19f68;
    border-bottom: 1px solid #D6D5D5;
}
.forms h4 {
    font-size: 1.3em;
    color: #26262c;
}



.forms button.btn.btn-default {
    background-color: #d19f68;
    color: #fff;
    padding: .5em 1.5em;
    border: none;
    outline: none;
    border-radius: inherit;
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */

    /* Default styles for hover */
}

.forms button.btn.btn-default:hover {
    background-color: #26262c; /* Dark background color on hover */
    color: #fff; /* White text color on hover */
}

.table-bordered {
	background-color: #d19f68; /* Dark background color on hover */
	color: #26262c; /* White text color on hover */
}

.table-responsive {
    background-color: #d19f68;

}

.widget-shadow {
    background-color: #d19f68;
}
.table-responsive.bs-example.widget-shadow {
    background-color: #d19f68;
}
.main-content{
	background-color: #d19f68;
}
</style>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1" style="color: #26262c; "> View Enquiry</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow"  style="background-color:#d19f68;" >
					
						 <?php
             
$ret=mysqli_query($con,"select * from tblcontact where ID=$vid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                 <table class="table table-bordered mg-b-0" style="font-size: 20px;">
                                   
                                   <tr style="color: #26262c;font-size: 30px;text-align: center; background-color: #d19f68;" ><td colspan="4">View Enquiry</td></tr>
              
                <tr>
    <th>Name</th>
    <td><?php  echo $row['FirstName']." ".$row['LastName'];?></td>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
  
                </tr>
                <tr>
                	<th>Contact No.</th>
                	<td><?php  echo $row['Phone'];?></td>
                	                	<th >Query Date</th>
                	<td><?php  echo $row['EnquiryDate'];?></td>
                </tr>
                <tr>
    
    <th>Message</th>
    <td colspan="4"><?php  echo $row['Message'];?></td>
  </tr>
              </table><?php $cnt=$cnt+1;} ?> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>