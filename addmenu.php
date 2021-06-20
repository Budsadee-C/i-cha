<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
  include("function.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Menu & Topping</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
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
                          <li> <a href="login.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="clearfix"> </div>
                </div>
                 <div class="clearfix"> </div>
            </div>
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
    <div class="inbox">
    	 	<div class="col-md-6 compose-right">
					<div class="inbox-details-default">
						<div class="alert alert-success">
							Add Menu
						</div>
						<div class="inbox-details-body">
							<form class="com-mail" method="post" action="addmenu.php">
								<input type="text"  placeholder="ชื่อเครื่องดื่ม" name="namemenu" id="namemenu">
								<input type="text"  placeholder="ราคา" name="price">
							 <center><input type="submit" name="send" value="เพิ่มเมนู"></center>
							</form>
						</div>
					</div>
          <?php
          if ( isset( $_POST['send'] ) )
          {
            if($_POST['namemenu']!="" && $_POST['price']!="" )
            {
                insertMenu();
            }
            else
            {?>
              <script type='text/javascript'>
                  alert('กรุณากรอกข้อมูลให้ครบค่ะ');
                  document.getElementById("namemenu").focus();
              </script>
            <?php } // end else

          }// end if
          ?>
				</div>
        <div class="col-md-6 compose-right">
          <div class="inbox-details-default">
            <div class="alert alert-success">
              Add Topping (ทุกหน้าราคา 5 บาท)
            </div>
            <div class="inbox-details-body">
              <form class="com-mail" method="post" action="addmenu.php">
                <input type="text"  placeholder=" Topping" name="nametop" id="namemenu" style="margin-top:25px;ba">

               <center><input type="submit" name="sendTop" value="เพิ่ม Topping" style="margin-top:43px;"></center>
              </form>
            </div>
          </div>
          <?php
          if ( isset( $_POST['sendTop'] ) )
          {
            if($_POST['nametop']!="")
            {
                insertTopping();
            }
            else
            {?>
              <script type='text/javascript'>
                  alert('กรุณากรอกข้อมูลให้ครบค่ะ');
                  document.getElementById("nametop").focus();
              </script>
            <?php } // end else

          }// end if
          ?>
        </div>

          <div class="clearfix"> </div>
   </div>
</div>

<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
<!--COPY rights end here-->
</div>

<!--slider menu-->
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
              <li id="menu-academico-avaliacoes" ><a href="404.html">Profile</a></li>
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
      alert('กรุณาล็อกอินก่อนเข้าใช้งานค่ะ');
      window.location.assign("login.php");
  </script>
<?php } // else if check session
?>
</body>
</html>
