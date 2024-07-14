<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $role=$_POST['role'];
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' && role='$role' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['bpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
      // Redirect based on role using if-else condition
      if ($role == 'admin') {
        header("Location: dashboard.php");
    } elseif ($role == 'receptionist') {
        header("Location: receptionist-dash.php");
    } elseif ($role == 'stylist') {
        header("Location: stylist-dash.php");
    } else {
        // Handle unexpected roles or errors
        echo "Invalid role";
    }
} else {
    // Handle invalid login credentials
    echo "";
}

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Elegance | Login Page </title>


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
    body.cbp-spmenu-push {
        background-image: url('/New%20folder/beauty/bpms/admin/images/imge1.jpg');
    background-size: cover; /* Cover the entire background */
    background-repeat: no-repeat; /* Do not repeat the background image */
    background-position: center; /* Center the background image */
    font-family: 'Roboto Condensed', sans-serif; /* Optional: Set font family */
}

.main-content {
    margin: 0 auto;
    max-width: 600px;
    padding-top: 50px;
}

.login-page {
    background: rgba(217, 159, 104, 0.8); /* Added opacity to the background color */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    animation: fadeInAnimation 1s ease-in-out;
    width: 80%;
    max-width: 600px;
    margin: 0 auto;
    text-align: center; /* Center align content inside login-page */
}

.login-page span.title1, .login-page span.title2 {
    display: inline-block; /* Display titles on the same line */
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

.login-page span.title1 {
    color: white; /* Color for SignIn */
    font-weight: bold; /* Make the text bold */
}

.login-page span.title2 {
    color: #000; /* Color for Page */
    font-weight: bold; /* Make the text bold */
    margin-left: 10px; /* Optional: Add margin between the two titles */
}

.login-body {
    padding: 20px;
    border-top: 1px solid #eee;
    text-align: center;
}

.login-body input[type="text"],
.login-body input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

.login-body input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #d19f68;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.login-body input[type="submit"]:hover {
    background-color: #000;
}

.login-body p {
    font-size: 16px;
    color: red;
    text-align: center;
    margin-top: 10px;
}

.forgot-grid {
    margin-top: 10px;
    text-align: center;
}

.forgot-grid a {
    color: #d19f68;
    text-decoration: none;
    position: relative; /* Ensure relative positioning for animation */
    display: inline-block; /* Ensure block-level for animation */
    overflow: hidden; /* Hide overflow for animation */
    transition: color 0.3s ease; /* Smooth transition for color change */
}

.forgot-grid a:hover {
    color: #000; /* Change color to black on hover */
}

.forgot-grid a::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%; /* Align underline to center */
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background-color: #337ab7; /* Initial color for animation */
    transition: width 0.3s ease, background-color 0.3s ease; /* Smooth transitions */
}

.forgot-grid a:hover::before {
    width: 100%; /* Expand width on hover */
    background-color: #000; /* Change color on hover */
}

@keyframes fadeInAnimation {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.howver {
    color: #d19f68; /* Change text color for .howver */
    transition: color 0.3s ease; /* Smooth transition for color change */
}

.howver:hover {
    color: #000; /* Change color to black on hover */

 }


</style>
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- main content start-->
		<div style=" height:800px;">
			<div class="main-page login-page ">
				<span class="title1">SignIn</span><span class="title2">Page</span>
				<div class="widget-shadow">
					<div class="login-top">
                    <h4 style="color: #d19f68;">Welcome back to Elegance Salon AdminPanel ! </h4>

					</div>
					<div class="login-body">
						<form role="form" method="post" action="">
							<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
							<input type="text" class="user" name="username" placeholder="Username" required="true">
							<input type="password" name="password" class="lock" placeholder="Password" required="true">
                            <select name="role" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="stylist">Stylist</option>
                            </select>
							<input type="submit" name="login" value="Sign In">
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="../index.php">Back to Home</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="forgot-password.php">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
		
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