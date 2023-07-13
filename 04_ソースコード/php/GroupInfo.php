<?php
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    if(isset($_POST['changeGroupName'])){
        // 入力された新しい名前
        $newName = $_POST['changename'];
          
        // ユーザーID
        $groupId = $_SESSION['groupid'];
      
        // 名前が入力されているかチェック
        if (!empty($newName)) {
          // データベースの更新処理
          $cls->updateGroupName($groupId, $newName);
      
          // 更新後の名前を表示するためにセッションに反映させる
          $_SESSION['groupname'] = $newName;
      
          // 画面をリロードして更新後の名前を表示
          header('Location: ../html/GroupInfo.html?groupid='.$groupId);
          exit;
        }
    }else if(isset($_POST['changeGroupText'])){
        // 入力された新しい名前
        $newText = $_POST['changetext'];
          
        // ユーザーID
        $groupId = $_SESSION['groupid'];
      
        // 名前が入力されているかチェック
        if (!empty($newText)) {
          // データベースの更新処理
          $cls->updateGroupText($groupId, $newText);
      
          // 更新後の名前を表示するためにセッションに反映させる
          $_SESSION['grouptext'] = $newText;
      
          // 画面をリロードして更新後の名前を表示
          header('Location: ../html/GroupInfo.html?groupid='.$groupId);
          exit;
        }
    }
?>