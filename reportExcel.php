<?php

//@header("Content-Disposition: attachment; filename=mysql_to_excel.csv");
/*header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename="DailyReport'.date("Y-m-d").'".xls"'); //กำหนดชื่อไฟล์
//header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream");
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
//header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize("DailyReport".date("Y-m-d").".xls"));*/

header("Content-Type: application/x-msdownload");
header("Pragma: no-cache");
header("Expires: 0");

@readfile($filename);
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <?php
  include("function.php");
  ConnectDB();
  if(isset($_GET['kind'])&& $_GET['kind']=="daily")
  {
    header("Content-Disposition: attachment; filename=DailyReport".date("Y-m-d").".xls");
  ?>
  <table>
      <tbody>
          <tr>
              <td colspan = "2"></td>
              <td>จำนวน</td>
              <td>จำนวนเงิน</td>
          </tr>
          <?php
            SellDaily();
          ?>
          <tr>
              <td colspan = "1"></td>
              <td colspan = "4">ยอดขายวันที่ <?php echo today;?> ทั้งหมด <?php echo SaleDaily();?> แก้ว เป็นจำนวนเงิน  <?php SellAllMenuDaily(); ?> บาท</td>
          </tr>
          <tr>
              <td colspan = "1"></td>
              <td colspan = "4">จำนวนแก้วฟรี วันที่ <?php echo today;?> เป็นจำนวน <?php FreeDaily(); ?> แก้ว</td>
          </tr>
      </tbody>
  </table>
<?php } // end if
else if (isset($_GET['kind'])&& $_GET['kind']=="monthly")
{
  header("Content-Disposition: attachment; filename=DailyReport".date("F").".xls");
?>
<table>
    <tbody>
        <tr>
            <td colspan = "2"></td>
            <td>จำนวน</td>
            <td>จำนวนเงิน</td>
        </tr>
        <?php
          SellMonthly();
        ?>
        <tr>
            <td colspan = "1"></td>
            <td colspan = "4">ยอดขายเดือน <?php echo date("F");?> ทั้งหมด <?php echo SaleMonthly();?> แก้ว เป็นจำนวนเงิน  <?php SellAllMenuMonthly(); ?> บาท</td>
        </tr>
        <tr>
            <td colspan = "1"></td>
            <td colspan = "4">จำนวนแก้วฟรี เดือน <?php echo date("F");?> เป็นจำนวน <?php FreeMonthly(); ?> แก้ว</td>
        </tr>
    </tbody>
</table>
<?php } // end else if
?>
</table>
</body>
</html>
