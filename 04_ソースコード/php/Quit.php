<?php
session_start();
require_once 'DBmanager.php';
$cls = new DBManager();
if($POST_('quit')){
    header('Location:../html/Top.html');
      exit;
}
?>