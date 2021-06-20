<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'icha');
define('month',date("Y-m"));
define('today',date("Y-m-d"));
function ConnectDB()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  //mysqli_query($conn,"SET NAMES TIS620");
  mysqli_query($conn,"SET character_set_results=tis620");
  mysqli_query($conn,"SET character_set_client=tis620");
  mysqli_query($conn,"SET character_set_connection=tis620");


  mysqli_set_charset($conn,'utf8');       // object oriented style
  if(! $conn)
  {
    die('Could not connect connect: ') ;
  }
}
function queryAllMember()// monthly
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT COUNT(idMem) As number FROM member where date_signin LIKE "'.month.'%";');
  while($row = $result->fetch_row())
  {
    echo $row['0'];
  }
}
function queryNewMemberDaily()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT COUNT(idMem) As now FROM member where date_signin ="'.today.'";');
  while($row = $result->fetch_row())
  {
    echo $row['0'];
  }

}
function queryFreeDaily()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT COUNT(idMem) As free FROM ichaorder where dateOrder ="'.today.'" and payWith=\'free\';');
  while($row = $result->fetch_row())
  {
    echo $row['0'];
  }
}
function queryFree() // monthly
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT COUNT(idMem) As free FROM ichaorder where dateOrder LIKE "'.month.'%" and payWith=\'free\';');
  while($row = $result->fetch_row())
  {
    echo $row['0'];
  }
}
function querySaleDaily()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT COUNT(idMem) As free FROM ichaorder where dateOrder ="'.today.'" and payWith=\'cash\';');
  while($row = $result->fetch_row())
  {
    echo $row['0'];
  }
}
function querySale() // monthly
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT COUNT(idMem) As free FROM ichaorder where dateOrder LIKE "'.month.'%" and payWith=\'cash\';');
  while($row = $result->fetch_row())
  {
    echo $row['0'];
  }
}
function CustomerTable()
{
?>
      <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>PinID</th>
              <th>Total Buy(All)</th>
              <th>Point</th>
            </tr>
          </thead>
        <tbody>
<?php
  $num =1;
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT user,pin,COUNT(member.idMem) As total,point FROM member,ichaorder where member.idMem = ichaorder.idMem and dateOrder = "'.today.'" GROUP BY member.idMem ORDER BY user ASC LIMIT 0,5;');
  while($row = $result->fetch_row())
  {
    //echo $row['0'];
?>
<tr>
  <td><?php echo $num;?></td>
  <td><?php echo $row[0];?></td>
  <td><?php echo $row[1];?></td>

  <td><?php echo $row[2];?></td>
  <td><?php echo $row[3];?></td>
</tr>
<?php
  $num+=1;
  } // end while
?>
        </tbody>
      </table>
<?php
} // end fundtion
function queryTopMenu()
{


}
function login($username,$password)
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'SELECT user,status from owner where user ="'.$username.'" and pass ="'.$password.'"');
 while($row = $result->fetch_row())
  {
    $_SESSION["user"]=$row[0];
    $_SESSION["status"]=$row[1];
  }
  if(mysqli_num_rows($result)>0)
  {
    header("Location: index.php");
  }

}
function insertMenu()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  if(mysqli_query($conn,"INSERT INTO menu (name,kind,price,point) VALUES ('".$_POST['namemenu']."','chanom',".$_POST['price'].",1)"))
  {?>
    <script type='text/javascript'>
        alert('บันทึกสำเร็จค่ะ');
    </script>
  <?php

  }

}// ned function
function insertTopping()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  if(mysqli_query($conn,"INSERT INTO menu (name,kind,price,point) VALUES ('".$_POST['nametop']."','topping',5,0)"))
  {?>
    <script type='text/javascript'>
        alert('บันทึกสำเร็จค่ะ');
    </script>
  <?php

  }

}// ned function
function queryAllMenu()
{
  $count=0;
  $color = "";
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select name,kind,price,idMenu from menu where idMenu!=0 order by kind');
 while($row = $result->fetch_row())
  {
    if($count%2==1) $color ="style=\"background: #F5CBA7;\"";
    else $color="";
?>
    <tr class="unread checked"<?php echo $color;?>>
        <td class="hidden-xs"></td>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
        <td align="center"><a href="deleteCus.php?type=deleteMenu&id=<?php echo $row[3];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
    </tr>

  <?php $count++;}//end while

}// end function
function countAllMenu()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select count(name) as count from menu where idMenu!=0');
  while($row = $result->fetch_row())
  {
      echo $row[0];
  }

}
function queryTop5Menu()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(menu.idMenu) as sum from menu,ichaorder where menu.idMenu=ichaorder.idMenu group by menu.idMenu ORDER BY `sum` DESC limit 0,5');
  while($row = $result->fetch_row())
  {?>
    <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-inbox"></i><?php echo $row[0];?> จำนวน <?php echo $row[1];?> แก้ว </a></li>

  <?php }

}
function queryTop5Topping()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(ichaorder.topping) as sum from menu,ichaorder where menu.idMenu=ichaorder.topping and ichaorder.topping!=0 group by ichaorder.topping ORDER BY `sum` DESC limit 0,5');
  while($row = $result->fetch_row())
  {?>
    <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-inbox"></i><?php echo $row[0];?> จำนวน <?php echo $row[1];?> แก้ว </a></li>

  <?php }

}
function queryTop5Daily()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(menu.idMenu) as sum from menu,ichaorder where menu.idMenu=ichaorder.idMenu and dateOrder="'.today.'" group by menu.idMenu ORDER BY `sum` DESC limit 0,5');
  while($row = $result->fetch_row())
  {?>
    <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-inbox"></i><?php echo $row[0];?> จำนวน <?php echo $row[1];?> แก้ว </a></li>

  <?php }

}
function queryTop5ToppingDaily()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(ichaorder.topping) as sum from menu,ichaorder where menu.idMenu=ichaorder.topping and ichaorder.topping!=0 and dateOrder="'.today.'" group by ichaorder.topping ORDER BY `sum` DESC limit 0,5');
  while($row = $result->fetch_row())
  {?>
    <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-inbox"></i><?php echo $row[0];?> จำนวน <?php echo $row[1];?> แก้ว </a></li>

  <?php }

}
function SellDaily()
{
  $count=0;
  $color = "";
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(menu.idMenu) as sum,if(ichaorder.topping!=0,sum(menu.price+5),menu.price*count(menu.idMenu)) as cal from menu,ichaorder where menu.idMenu=ichaorder.idMenu and dateOrder="'.today.'" and ichaorder.payWith!="free" group by menu.idMenu ORDER BY `cal` DESC');
 while($row = $result->fetch_row())
  {
    if($count%2==1) $color ="style=\"background: #F5CBA7;\"";
    else $color="";
?>
    <tr class="unread checked"<?php echo $color;?>>
        <td class="hidden-xs"></td>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
    </tr>

  <?php $count++;}//end while
}
function SellAllMenuDaily()
{
  $income=0;
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);//ichaorder.payWith!="free" and
  $result = mysqli_query($conn,'select if(ichaorder.topping!=0,sum(menu.price+5),menu.price*count(menu.idMenu)) as cal from menu,ichaorder where menu.idMenu=ichaorder.idMenu and dateOrder="'.today.'" and ichaorder.payWith!="free" group by menu.idMenu ORDER BY `cal` DESC');
  while($row = $result->fetch_row())
  {
      $income+=$row[0];
  }
  echo $income;
}
function FreeDaily()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select count(idOr) as count from ichaorder where dateOrder="'.today.'" and payWith="free"');
  while($row = $result->fetch_row())
  {
      echo $row[0];
  }
}
function SaleDaily()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select count(idOr) as count from ichaorder where dateOrder="'.today.'" and payWith!="free"');
  while($row = $result->fetch_row())
  {
      echo $row[0];
  }
}
function queryTop5ToppingMonthly()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(ichaorder.topping) as sum from menu,ichaorder where menu.idMenu=ichaorder.topping and ichaorder.topping!=0 and dateOrder LIKE "'.month.'%" group by ichaorder.topping ORDER BY `sum` DESC limit 0,5');
  while($row = $result->fetch_row())
  {?>
    <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-inbox"></i><?php echo $row[0];?> จำนวน <?php echo $row[1];?> แก้ว </a></li>

  <?php }

}
function queryTop5Monthly()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(menu.idMenu) as sum from menu,ichaorder where menu.idMenu=ichaorder.idMenu and dateOrder LIKE "'.month.'%" group by menu.idMenu ORDER BY `sum` DESC limit 0,5');
  while($row = $result->fetch_row())
  {?>
    <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-inbox"></i><?php echo $row[0];?> จำนวน <?php echo $row[1];?> แก้ว </a></li>

  <?php }

}
function SellMonthly()
{
  $count=0;
  $color = "";
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select menu.name,count(menu.idMenu) as sum,if(ichaorder.topping!=0,sum(menu.price+5),menu.price*count(menu.idMenu)) as cal from menu,ichaorder where menu.idMenu=ichaorder.idMenu and dateOrder LIKE "'.month.'%" and ichaorder.payWith!="free" group by menu.idMenu ORDER BY `cal` DESC');
 while($row = $result->fetch_row())
  {
    if($count%2==1) $color ="style=\"background: #B6F9D5;\"";
    else $color="";
?>
    <tr class="unread checked"<?php echo $color;?>>
        <td class="hidden-xs"></td>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
    </tr>

  <?php $count++;}//end while
}
function SaleMonthly()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select count(idOr) as count from ichaorder where dateOrder LIKE "'.month.'%" and payWith!="free"');
  while($row = $result->fetch_row())
  {
      echo $row[0];
  }
}
function SellAllMenuMonthly()
{
  $income=0;
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);//ichaorder.payWith!="free" and
  $result = mysqli_query($conn,'select if(ichaorder.topping!=0,sum(menu.price+5),menu.price*count(menu.idMenu)) as cal from menu,ichaorder where menu.idMenu=ichaorder.idMenu and dateOrder LIKE "'.month.'%" and ichaorder.payWith!="free" group by menu.idMenu ORDER BY `cal` DESC');
  while($row = $result->fetch_row())
  {
      $income+=$row[0];
  }
  echo $income;
}
function FreeMonthly()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select count(idOr) as count from ichaorder where dateOrder LIKE "'.month.'%" and payWith="free"');
  while($row = $result->fetch_row())
  {
      echo $row[0];
  }
}
function insertMember()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  if(mysqli_query($conn,"INSERT INTO member (user,pin,point,date_signin) VALUES ('".$_POST['namemember']."', '".$_POST['pin']."', 0, '".today."')"))
  {?>
    <script type='text/javascript'>
        alert('บันทึกสำเร็จค่ะ');
    </script>
  <?php

  }

}// ned function
function queryAllCustomer()
{
  $count=0;
  $color = "";
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select user,point,date_signin from member where date_signin="'.today.'"');
  if(mysqli_num_rows($result)>0)
  {
    while($row = $result->fetch_row())
     {
       if($count%2==1) $color ="style=\"background: #B1D8F3;\"";
       else $color="";
   ?>
       <tr class="unread checked"<?php echo $color;?>>
           <td class="hidden-xs"></td>
           <td><?php echo $row[2];?></td>
           <td><?php echo $row[0];?></td>
           <td><?php echo $row[1];?></td>
       </tr>

     <?php $count++;}//end while
  }
  else
  {?>
    <td colspan = "2"></td>
    <td colspan = "2">ยังไม่มีข้อมูลสมาชิกใหม่ค่ะ</td>

  <?php }// end else
}
function ManageCustomer()
{
  $count=0;
  $color = "";
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select idMem,user,point,date_signin from member');
 while($row = $result->fetch_row())
  {
    if($count%2==1) $color ="style=\"background: #B1D8F3;\"";
    else $color="";
?>
    <tr class="unread checked"<?php echo $color;?>>
        <td class="hidden-xs"></td>
        <td><?php echo $row[3];?></td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
        <!--<td><i class="fa fa-trash-o" aria-hidden="true" onclick="deleteCust(<?php echo $row[0];?>)"></i></td>-->
        <td><a href="deleteCus.php?type=delete&id=<?php echo $row[0];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
    </tr>

  <?php $count++;}//end while

}
function deleteCustomer($id)
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  if (mysqli_query($conn,"delete from member where idMem=".$id))
  {?>
      <script type='text/javascript'>
          alert('ทำการลบข้อมูลนี้สำเร็จค่ะ');
      </script>
  <?php
  header("Location: member.php");
  }
  else
  {
    echo "Error deleting record: " . mysqli_error($conn);
  }

}
function deleteMenu($id)
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  if (mysqli_query($conn,"delete from menu where idMenu=".$id))
  {?>
      <script type='text/javascript'>
          alert('ทำการลบข้อมูลนี้สำเร็จค่ะ');
      </script>
  <?php
  header("Location: menu.php");
  }
  else
  {
    echo "Error deleting record: " . mysqli_error($conn);
  }

}
function ShowChanom()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select name,idMenu,price from menu where idMenu!=0 and kind="chanom" order by kind');
 while($row = $result->fetch_row())
  {
?>
    <option value="<?php echo $row[1];?>"><?php echo $row[0];?></option>
  <?php }//end while
}// end function
function ShowTopping()
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select name,idMenu,price from menu where idMenu!=0 and kind="topping" order by kind');
 while($row = $result->fetch_row())
  {
?>
    <option value="<?php echo $row[1];?>"><?php echo $row[0];?></option>
  <?php }//end while
}// end function
function SearchMember()
{
  $back = [3];
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select user,idMem,point from member where pin="'.$_POST['pin'].'"');
  while($row = $result->fetch_row())
   {
     $back[0] = $row[0];
     $back[1] = $row[1];
     $back[2] = $row[2];
 ?>
   <?php }//end while
   return $back;
}// end function
function SearchPrice($id)
{
  $back = 0;
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  $result = mysqli_query($conn,'select price from menu where idMenu='.$id);
  while($row = $result->fetch_row())
   {
     $back = $row[0];
   }//end while
   return $back;
}// end function
function inserchOrder($idMenu,$id,$pay,$topping,$time)
{
  $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  if(mysqli_query($conn,"INSERT INTO ichaorder (dateOrder,idMenu,idMem,payWith,topping) VALUES ('".today."','".$idMenu."','".$id."','".$pay."',$topping)"))
  {
  ?>
        <script type='text/javascript'>
            alert('คำนวณสำเร็จค่ะ');
        </script>
<?php
  }
}
function updatePoint($id)
{
  mysqli_query($conn,"UPDATE member SET point=point+1 WHERE idMem=".$id);
}
?>
