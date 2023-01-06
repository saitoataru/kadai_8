<?php

require_once('funcs.php');

try {
    $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');

  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }

$id = $_GET['id'];

// まず保存された画像があれば削除する
// まず画像があるか確認

// データの削除
$stmt = $pdo->prepare('DELETE FROM gs_db WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
