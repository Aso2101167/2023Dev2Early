<?php
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if(isset($_POST['logout'])){
  //logout処理
  session_destroy();
    header('Location:../html/LogoutComplete.html');
      exit;
}else if(isset($_POST['cancel'])){
    header('Location:../html/Top.html');
      exit;
}
?>