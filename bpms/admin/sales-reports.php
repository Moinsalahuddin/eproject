<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>BPMS |  Sales Reports</title>

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

 
.form-title {
    padding: 1em 2em;
    background-color: #d19f68;
    border-bottom: 1px solid #D6D5D5;
}
.forms h4 {
    font-size: 1.3em;
    color: #26262c;
}

h3.title1 {
    font-size: 2em;
    color: #26262c;
    margin-bottom: 0.8em;
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
				<div class="forms">
					<h3 class="title1">Sales reports</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Sales reports:</h4>
						</div>
						<div class="form-body">
							<form method="post" name="bwdatesreport"  action="sales-reports-detail.php" enctype="multipart/form-data">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  
							 <div class="form-group"> <label for="exampleInputEmail1">From Date</label> <input type="date" class="form-control1" name="fromdate" id="fromdate" value="" required='true'> </div> 
							 <div class="form-group"> <label for="exampleInputPassword1">To Date</label><input type="date" class="form-control1" name="todate" id="todate" value="" required='true'> </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Request Type</label><input type="radio" name="requesttype" value="mtwise" checked="true">Month wise
                  <input type="radio" name="requesttype" value="yrwise">Year wise </div>
							 
							
							
							  <button type="submit" name="submit" class="btn btn-default">Submit</button> </form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
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
<?php } ?>