<?php 
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
$searchArray = $cls->getUserTblById($_POST['userid']);
if(empty($searchArray)){
    $_SESSION['loginError'] = "idError";
      header('Location:../html/login.html');
      exit;
}
foreach($searchArray as $row){
    if($_POST['password'] == $row['user_password']){
        $_SESSION['userid'] = $row['user_id'];
        header('Location:../html/Top.html');
      exit;
    } else {
      $_SESSION['loginError'] = "passError";
      header('Location:../html/login.html');
      exit;
    }
}
?>