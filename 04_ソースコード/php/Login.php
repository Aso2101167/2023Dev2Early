<?php 
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if(empty($_POST['userid'])){
  $_SESSION['loginError'] = "user idを入力してください";
  header('Location:../html/login.html');
  exit;
}else if(empty($_POST['password'])){
  $_SESSION['loginError'] = "Passwordを入力してください";
  header('Location:../html/login.html');
  exit;
}
$searchArray = $cls->getUserTblById($_POST['userid']);
if(empty($searchArray)){
    $_SESSION['loginError'] = "user idが存在しません";
      header('Location:../html/login.html');
      exit;
}
foreach($searchArray as $row){
    if($_POST['password'] == $row['user_password']){
        $_SESSION['userid'] = $row['user_id'];
        header('Location:../html/Top.html');
      exit;
    } else {
      $_SESSION['loginError'] = "パスワードが正しくありません";
      header('Location:../html/login.html');
      exit;
    }
}
?>