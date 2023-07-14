<?php
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $cls->InsertGroup_infoTbl($_GET['groupid'],$_SESSION['userid']);
    $userid = $_SESSION['userid'];
    $groupid = $_GET['groupid'];
    header('Location:../html/Chat.html?userid='.$userid.'&groupid='.$groupid);
    exit;
?>