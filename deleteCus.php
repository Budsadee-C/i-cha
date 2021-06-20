<?php
include("function.php");

if(isset($_GET['id']))
{
  if($_GET['type']=="delete")
  {
      deleteCustomer($_GET['id']);
  }
  else if($_GET['type']=="deleteMenu")
    {
        deleteMenu($_GET['id']);
    }
}

?>
