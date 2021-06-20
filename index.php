<?php
  include("function.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>I-Cha System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery-2.1.1.min.js"></script>
<link href="css/font-awesome.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/30444f2bd0.js" crossorigin="anonymous"></script>
<script src="js/Chart.min.js"></script>
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <script src="js/chartinator.js" ></script>
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
  <?php
  if(isset($_SESSION['user']))
  {
    ConnectDB();
  ?>
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.php"> <h1>I-Cha</h1>
								  </a>
							</div>
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<!--notification menu end -->
							<div class="profile_details">
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">
												<span class="prfil-img"><img src="images/p1.png" alt="" height="50px;" width="50px;"> </span>
												<div class="user-name">
													<p><?php echo $_SESSION['user'];?></p>
													<span><?php echo $_SESSION['status'];?></span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>
											</div>
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="profile.php"><i class="fa fa-user"></i> Profile</a> </li>
											<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3><?php querySale();?></h3>
						<h4>Total Sell</h4>
						<p>Today Sell: <?php querySaleDaily();?></p>
					</div>
					<div class="col-md-4 market-update-right">
              <i class="fa fa-diamond fa-4x" style="color:gold;"></i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					<h3><?php queryFree();?></h3>
					<h4>Total Free</h4>
					<p>Today Free: <?php queryFreeDaily();?></p>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fas fa-gift fa-5x" style="color:#D35400;"></i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3><?php queryAllMember();?></h3>
						<h4>All Member</h4>
						<p>Today New Meber: <?php queryNewMemberDaily();?></p>
					</div>
					<div class="col-md-4 market-update-right">
            <i class="fas fa-parachute-box fa-5x" style="color:#33E2FF;"></i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
<div class="chit-chat-layer1">
	<div class="col-md-6 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Top 5 Customer (<?php echo date("d/m/Y");?>)
                            </div>
                            <div class="table-responsive">
                              <?php CustomerTable();?>
                            </div>
                </div>
      </div>
      <div class="col-md-6 chit-chat-layer1-rit">
        <div class="prograc-blocks">
           <!--Progress bars-->
            <div class="home-progres-main">
               <h3>Top 5 Sales (<?php echo date("d/m/Y");?>)</h3>
             </div>
            <div class='bar_group'>
            <div class='bar_group__bar thin' label='ชานมไข่มุก' show_values='true' tooltip='true' value='100'></div>
            <div class='bar_group__bar thin' label='ชานมโกโก้ไข่มุก' show_values='true' tooltip='true' value='235'></div>
            <div class='bar_group__bar thin' label='ชาไทยไข่มุก' show_values='true' tooltip='true' value='500'></div>
            <div class='bar_group__bar thin' label='ชาเขียวไข่มุก' show_values='true' tooltip='true' value='456'></div>
            <div class='bar_group__bar thin' label='ชานมไต้หวัน' show_values='true' tooltip='true' value='456'></div>
          </div>
          <script src="js/bars.js"></script>
          </div>
      </div>
     <div class="clearfix"> </div>
</div>
<!--main page chart layer2-->
</div>
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
</div>
</div>
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
			  </a> </div>
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li><a href="payment.php"><i class="fa fa-calculator"></i><span>Payment</span></a></li>
		        <li><a href="member.php"><i class="fa fa-cat"></i><span>Member</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="newmember.php">New Member</a></li>
		            <li><a href="member.php">All Member</a></li>
		          </ul>
		        </li>
		        <li id="menu-comunicacao" ><a href="menu.php"><i class="fa fa-glass nav_icon"></i><span>Menu</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >
		            <li id="menu-mensagens" style="width: 120px" ><a href="addmenu.php">Add Menu</a>
		            </li>
		            <li id="menu-arquivos" ><a href="menu.php">Menu</a></li>
		          </ul>
		        </li>
		        <li><a href="daily.php"><i class="fa fa-file-text-o"></i><span>Report</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="daily.php">Daily</a></li>
			            <li id="menu-academico-boletim" ><a href="monthly.php">Monthly</a></li>
		             </ul>
		        </li>
		         <li><a href="profile.php"><i class="fa fa-cog"></i><span>System</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="profile.php">Profile</a></li>
			            <li id="menu-academico-boletim" ><a href="logout.php">Logout</a></li>
		             </ul>
		         </li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
<?php

} // end if isset session
else {?>
  <script type='text/javascript'>
      //alert('กรุณาล็อกอินก่อนเข้าใช้งานค่ะ');
      //window.location.assign("login.php");
  </script>
<?php } // else if check session
?>
</body>
</html>
