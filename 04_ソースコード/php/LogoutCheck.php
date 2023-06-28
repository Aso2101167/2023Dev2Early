<?php
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if($POST_('logout')){
    header('Location:../html/LogoutComplete.html');
      exit;
}else if($POST_('cancel')){
    header('Location:../html/Chat.html');
      exit;
}
?>