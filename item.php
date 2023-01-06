<?php
session_start();

//GETでidを取得
if(!isset($_GET["id"]) || $_GET["id"]==""){
  exit("ParamError!");
}else{
  $id = intval($_GET["id"]); //intval数値変換
  echo $id;
}

//1.  DB接続します
try {
    $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_db WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch(); //１レコードだけ取得：$row["フィールド名"]で取得可能
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>みんなのラーメン二郎</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
  <!--header-->
  <header class="header">
   <h1>みんなのラーメン二郎</h1>
  </header>
  <!-- end header-->
<form action="cartadd.php" method="POST">
  <div class="outer">
    <!--商品本情報-->
    <div class="wrapper wrapper-item flex-parent">

      <main class="wrapper-main">

        <!--商品情報-->
          <p class="item-thumb"><img src="./img/<?=$row["fname"]?>" width="200"></p>
          <p class="item-name">店名：<?=$row["item"]?></p></br>
          <p class="item-price">ニンニク：<?=$row["value"]?></p>
          <p class="item-text">感想：<?=$row["description"]?></p>
      </main>
    </div>
    <a href="index.php" class="btn-back">みんなの二郎をみる</a>
  </div>
</form>

  <!--footer-->
  <footer class="footer">
    <p class="copyrights"><small>Copyrights G’s Academy Tokyo All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.6.1.js"></script>
</body>
</html>
