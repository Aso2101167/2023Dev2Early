<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // アップロードされたファイルの情報を取得
  $file = $_FILES['imageFile'];

  // ファイルの一時保存パス
  $tmpFilePath = $file['tmp_name'];

  // ユーザーID
  $userId = $_SESSION['userid'];

  // ファイルを保存するディレクトリ
  $uploadDir = '../img/';

  // ファイルの拡張子
  $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

  // 新しいファイル名
  $fileName = $userId . '.' . $extension;

  // ファイルの保存先パス
  $filePath = $uploadDir . $fileName;

  // 既存のファイルを削除
  if (file_exists($filePath)) {
    unlink($filePath);
  }

  // ファイルを移動して保存
  if (move_uploaded_file($tmpFilePath, $filePath)) {
    // ここでファイルの保存先パスなどの情報をデータベースに保存するなどの処理を行うことができます。

    // データベースの更新処理
    require_once '../php/DBmanager.php';
    $dbManager = new DBManager();
    $dbManager->updateUserImage($userId, $fileName); // ユーザーIDとファイル名を渡してデータベースを更新するメソッドを呼び出す

    header('Location:../html/UserInfo.html');
    exit;
  } else {
    // リダイレクト
    header('Location:../html/UserInfo.html?error=1');
    exit;
  }
}
?>