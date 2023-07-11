<?php
session_start();
require_once '../php/SessionCheck.php';

// セッションチェックを行う
$sessionCheck = new SessionCheck();
$sessionCheck->checkSession();
require_once 'DBmanager.php';
$cls = new DBManager();
if($_POST('quit')){
  deleteGroupMember($_GET['groupid'],$_SESSION['userid']);
  $group = $cls->getGroupInfoTblByGroupId($_GET['groupid']);
  if(empty($group)){
    $cls->deleteGroupTbl($_GET['groupid']);
    header('Location:../html/Top.html');
      exit;
  }else{
    header('Location:../html/Top.html');
      exit;
  }
}
?>