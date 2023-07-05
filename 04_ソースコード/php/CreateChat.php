<?php 
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if($_POST['createchat']){
    $groupid = $cls->InsertGroupTbl($_POST['chatname'],$_POST['category'],$_POST['detail']);
    $cls->InsertGroup_infoTbl($groupid,$_SESSION['userid']);
    header('Location:../html/Chat.html?groupid='.$groupid);
    exit;
}
?>