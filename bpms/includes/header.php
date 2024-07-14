
<section class=" w3l-header-4 header-sticky">

<style>
 
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

        .navbar-brand span.animated-text {
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
</style>
    <header class="absolute-top">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <h1><a class="navbar-brand" href="index.php"> <!--<span class="fa fa-line-chart" aria-hidden="true"></span> -->
            <span class="animated-text"style="color:black;font-family:arial;font-size:22px"> ELEGANCE </span>
            </a></h1>
            <button class="navbar-toggler bg-gradient collapsed" type="button" data-toggle="collapse"
                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fa icon-expand fa-bars"></span>
        <span class="fa icon-close fa-times"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                     
                     <?php if (strlen($_SESSION['bpmsuid']==0)) {?>
                    <li class="nav-item"style="font-weight:bold">
                        <a class="nav-link" href="admin/index.php">Admin</a>
                    </li>
                     <li class="nav-item"style="font-weight:bold">
                        <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                    <li class="nav-item"style="font-weight:bold">
                        <a class="nav-link" href="login.php">Login</a>
                    </li><?php }?>
                    <?php if (strlen($_SESSION['bpmsuid']>0)) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="book-appointment.php">Book Salon</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="booking-history.php">Booking History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="invoice-history.php">Invoice History</a>
                    </li>
                                        <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                                        <li class="nav-item">
                        <a class="nav-link" href="change-password.php">Setting</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  <?php }?>
                </ul>
                
            </div>
        </div>

        </nav>
    </div>
      </header>
</section>