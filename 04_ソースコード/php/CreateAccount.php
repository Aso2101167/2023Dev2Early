<?php 
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if($_POST['create']){
$cls->InsertUserTbl($_POST['userid'],$_POST['password'],$_POST['username']);
header('Location:../html/Top.html');
      exit;
}
?>