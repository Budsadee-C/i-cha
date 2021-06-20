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
							รายการสินค้า
						</div>
            <div class="inbox-details-body">
              <form class="com-mail" method="post" action="payment.php">
                <input type="text"  placeholder="รหัสพิน" name="pin">
               <center><input type="submit" name="search" value="ค้นหาลูกค้า"></center>
              </form>
            </div>
					</div>
          <?php
          $working ="disabled";
          $back[0] = "";
          $back[1] = "";
          $back[2] = "";
          if ( isset( $_POST['search'] ) )
          {
            if($_POST['pin']!="")
            {
                $back=SearchMember();
                $working ="";
            }
            else
            {?>
              <script type='text/javascript'>
                  alert('รหัสพินไม่ถูกต้องค่ะ');
                  document.getElementById("pin").focus();
              </script>
            <?php } // end else

          }// end if
          ?>
				</div>
        <div class="col-md-6 compose-right">
          <div class="inbox-details-default">
            <div class="alert alert-success">
              การชำระเงิน
            </div>
            <div class="inbox-details-body">
              <form class="com-mail" method="post" action="payment.php?id=<?php echo $back[1];?>">
                หมายเลข : <input type="text"  placeholder="หมายเลข" name="id" disabled value="<?php echo $back[1];?> ">
                ลูกค้า : <input type="text"  placeholder="ชื่อลูกค้า" name="namemember" disabled value="<?php echo $back[0];?>">
                คะแนน : <input type="text"  placeholder="จำนวนแต้มลูกค้า" name="point" disabled value="<?php echo $back[2];?>">
                รายการสินค้า:
                <table class="table tab-border">
                    <tbody>
                      <tr align="center">
                          <td>ชานม:</td>
                          <td>
                            <select style="width:75%" name="chanom">
                              <?php
                              $priceCha = "";
                             ShowChanom();?>
                          </select>
                        </td>
                       </tr>
                       <tr align="center">
                           <td>Topping:</td>
                           <td>
                             <select style="width:75%" name="topping">
                               <option value="0" selected>ไม่ใส่</option>
                              <?php ShowTopping();?>
                           </select>
                         </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table tab-border">
                    <tbody>
                      <tr align="center">
                          <td>ชำระเงิน</td>
                          <td>
                            <select style="width:75%" name="pay">
                              <option value="cash" selected>เงินสด</option>
                              <option value="free">แก้วฟรี</option>
                          </select>
                        </td>
                       </tr>
                    </tbody>
                </table>
               <center><input type="submit" name="save" value="บันทึก" <?php echo $working;?>></center>
             </form><br>
            </div>

          </div>
          <?php
          $time=0;
          if ( isset( $_POST['save'] ) )
          {
            $time+=1;
            $priceCha=SearchPrice($_POST['chanom']);
            if($_POST['topping']!="0") $priceCha+=5;
            inserchOrder($_POST['chanom'],$_GET['id'],$_POST['pay'],$_POST['topping'],$time);
            updatePoint($_GET['id']);
            //echo $priceCha;
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
