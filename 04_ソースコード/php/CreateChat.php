<?php 
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if($_POST['createchat']){
    $cls->InsertGroupTbl($_POST['chatname'],$_POST['detail']);
    header('Location:../html/Chat.html');
    exit;
}
?>