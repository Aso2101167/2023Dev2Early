<?php
  header('Content-type: application/json');
  session_start();
  require_once 'DBmanager.php';
  $cls = new DBManager();
  $groupid = "1234567";
      $userid = "1234567";
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

    // 最新のメッセージが存在し、IDが前回の取得時と異なる場合のみ返す
    if ($latestChat && $latestChat['chat_id'] != $lastChatId) {
        $_SESSION['lastChatId'] = $latestChat['chat_id'];
        return json_encode(['message' => $latestChat['chat_sentence']]);
    }
  }

  // メッセージを保存
  function send_message($msg) {
    // DBにメッセージを保存
    global $cls;
    global $groupid;
    global $userid;
    $cls->InsertChatTbl($groupid,$userid,$msg);
    // 最新のメッセージのIDをセッションに保存
    $_SESSION['lastChatId'] = $cls->getLastChatId();
    return json_encode(['message' => $msg]);
  }
 ?>
