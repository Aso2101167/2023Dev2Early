<?php 
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if($_POST['create']){
$cls->InsertUserTbl($_POST['userid'],$_POST['password'],$_POST['username']);
$_SESSION['userid'] = $_POST['userid'];
header('Location:../html/Top.html');
      exit;
}
?>