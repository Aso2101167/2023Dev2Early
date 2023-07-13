<?php
  header('Content-type: application/json');
  require_once '../php/SessionCheck.php';

// セッションチェックを行う
$sessionCheck = new SessionCheck();
$sessionCheck->checkSession();
  require_once 'DBmanager.php';
  $cls = new DBManager();
  $groupid = $_GET['groupid'];
      $userid = $_SESSION['userid'];
  if (!isset($_SESSION['lastChatId'])) {
    $latestChat = $cls->getLatestChatByGroupId($groupid);
    $_SESSION['lastChatId'] = $latestChat['chat_id'];
}
  // ルーティング
  switch($_POST['action']) {
    case 'get' :
      echo get_message();
      break;
    case 'send' :
      echo send_message($_POST['message']);
      break;
    default :
      // redirect 404 page
  }

  // 新規メッセージを取得
  function get_message() {
    // DBからメッセージを取得
    global $cls;
    global $groupid;
    
    // 前回の取得時からの変更をトラッキング
    $lastChatId = $_SESSION['lastChatId'];

    // 最新のメッセージを取得
    $latestChat = $cls->getLatestChatByGroupId($groupid);
    foreach($latestChat as $row){
      $chatid = $row['chat_id'];
      $getusername = $row['user_name'];
      $chatsentence = $row['chat_sentence'];
      $getuserimage = '../img/'.$row['user_image'];
    }

    // 最新のメッセージが存在し、IDが前回の取得時と異なる場合のみ返す
    if ($latestChat && $chatid != $lastChatId) {
        $_SESSION['lastChatId'] = $chatid;
        return json_encode(['username' => $getusername,'message' => $chatsentence,'image_url' => $userimage]);
    }
  }

  // メッセージを保存
  function send_message($msg) {
    // DBにメッセージを保存
    global $cls;
    global $groupid;
    global $userid;
    $searchArray = $cls->getUserTblById($userid);
    foreach($searchArray as $row){
      $username = $row['user_name'];
      $userimage = '../img/'.$row['user_image'];
    }
    $cls->InsertChatTbl($groupid,$userid,$msg);
    // 最新のメッセージのIDをセッションに保存
    $_SESSION['lastChatId'] = $cls->getLastChatId();
    return json_encode(['username' => $username,'message' => $msg,'image_url' => $userimage]);
  }
 ?>
