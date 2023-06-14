<?php 
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
$searchArray = $cls->getUserTblById($_POST['userid']);
foreach($searchArray as $row){
    if($_POST['password'] == $row['user_password']){
        $_SESSION['userid'] = $row['user_id'];
        header('Location:../html/Top.html');
      exit;
    } else {
    echo 'IDとパスワードが違います。';
    }
}
?>