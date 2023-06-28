<?php
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if($POST_('join')){
    header('Location:../html/Chat.html');
      exit;
}
?>