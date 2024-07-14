<div class="sticky-header header-section ">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
          <a href="index.html">
            <h1>Elegance </h1>
            <span>AdminPanel</span>
          </a>
        </div>
        <!--//logo-->

        <style>
          .logo a h1 {
    color: #fff;
    font-size: 1.5em;
    line-height: 1.2em;
    font-weight: 700;
}

.logo a span {
    color: #fff;
    font-size: .7em;
    text-align: center;
    letter-spacing: 7px;
}

 
button#showLeftPush {
    font-size: 1.5em;
    width: 80px;
    padding: 0.87em 0;
    text-align: center;
    cursor: pointer;
    float: left;
    color: #;
    -moz-transition: all 0.2s ease-out 0s;
    -webkit-transition: all 0.2s ease-out 0s;
    transition: all 0.2s ease-out 0s;
    border: none;
    background-color: #d19f68;
    outline: none;
}
button#showLeftPush:hover {
     color: #fff; 
}


.sidebar ul li a {
    /* color: #FFFFFF; */
    color: #d19f68;
    font-size: 1em;
}
.sidebar ul li a:hover {
    color: white;
}
 
 
.cbp-spmenu-vertical {
    width: 309px;
    height: 100%;
    top: 76px;
    z-index: 1000;
    background-color: #26262c;
    padding: 2em 0;
}
 
.logo {
    background: #d19f68;
    text-align: center;
    float: left;
}

button#showLeftPush {
    font-size: 1.5em;
    width: 80px;
    padding: 0.87em 0;
    text-align: center;
    cursor: pointer;
    float: left;
    color: #26262c;
    -moz-transition: all 0.2s ease-out 0s;
    -webkit-transition: all 0.2s ease-out 0s;
    transition: all 0.2s ease-out 0s;
    border: none;
    background-color: #d19f68;
    outline: none;
}
.clearfix{
  background-color:#d19f68;
}

.sticky-header.header-section {
    background-color: #d19f68;
}
 
 
.header-right {
    float: right;
    background-color: #d19f68;
    
}

.cbp-spmenu-push div#page-wrapper {
    margin: 0 0 0 19.3em;
    transition: .5s all;
    background-color: #d9d9d9;
    -webkit-transition: .5s all;
    -moz-transition: .5s all;
}
.row.calender.widget-shadow {
  background-color: #d9d9d9;
  
}
 
.stats-left {
    float: left;
    width: 70%;
   background-color: #26262c;
    text-align: center;
    padding: 1em;
}
 
  

.states-mdl .stats-left {
  background-color: #26262c;
    
}

.states-last .stats-left {
  background-color: #26262c;
}

.stats-right {
    float: right;
    width: 30%;
    text-align: center;
    padding: 1.54em 1em;
    background-color: #d19f68;
    
}

.states-mdl .stats-right {
  background-color: #d19f68;
}

.states-last .stats-right {
  background-color: #d19f68;
}



    </style>

       
       
        <div class="clearfix"> </div>
      </div>
      <div class="header-right">
        <div class="profile_details_left"><!--notifications of menu start -->
          <ul class="nofitications-dropdown">
            <?php
$ret1=mysqli_query($con,"select tbluser.FirstName,tbluser.LastName,tblbook.ID as bid,tblbook.AptNumber from tblbook join tbluser on tbluser.ID=tblbook.UserID where tblbook.Status is null");
$num=mysqli_num_rows($ret1);

?>  
            <li class="dropdown head-dpdn">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $num;?></span></a>
              
              <ul class="dropdown-menu">
                <li>
                  <div class="notification_header">
                    <h3>You have <?php echo $num;?> new notification</h3>
                  </div>
                </li>
                <li>
            
                   <div class="notification_desc">
                     <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
                 <a class="dropdown-item" href="view-appointment.php?viewid=<?php echo $result['bid'];?>">New appointment received from <?php echo $result['FirstName'];?> <?php echo $result['LastName'];?> (<?php echo $result['AptNumber'];?>)</a>
                 <hr />
<?php }} else {?>
    <a class="dropdown-item" href="all-appointment.php">No New Appointment Received</a>
        <?php } ?>
                           
                  </div>
                  <div class="clearfix6"></div>  
                 </a></li>
                 
                
                 <li>
                  <div class="notification_bottom">
                    <a href="new-appointment.php">See all notifications</a>
                  </div> 
                </li>
              </ul>
            </li> 
          
          </ul>
          <div class="clearfi7"> </div>
        </div>
        <!--notification menu end -->
        <div class="profile_details">  
        <?php
$adid=$_SESSION['bpmsaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?> 
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/admin.png" alt="" width="50" height="50"> </span> 
                  <div class="user-name">
                    <p><?php echo $name; ?></p>
                    <span>Administrator</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix8"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>  
        <div class="clearfix9"> </div> 
      </div>
      <div class="clearfix10"> </div> 
    </div>