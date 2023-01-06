<?php
session_start();
//1.  DB接続します
try {
    $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//２．データ登録SQL作成
$sql="select * from gs_db";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<li class="products-item">';
    $view .= '<a href="item.php?id='.$result["id"].'">';
    $view .= '<p class="pruducts-thumb"><img src="./img/'.$result["fname"].'" width="200"></p>';
    $view .= '<h3 class="products-title">'.$result["item"].'</h3>';
    $view .= '<p class="products-price">'.$result["value"].'</p>';
    $view .= '<p>'.$result["description"].'</p>';
    $view .= '<td><a href="delete.php?id=' . $result['id'] . '">';
    $view .= '<i class="fas fa-trash-alt"></i>';
    $view .= '</a>';
    $view .= '</li>';
  }
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
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>

<body>
  <header class="header" style="height:150px; background-color: yellow;">
  <div style="margin-left: auto;margin-right: auto;text-align:center;">
    <h1 style="color: red;font-size:50px;">みんなのラーメン二郎</h1>
  </div>
  </header>

  

    <ul class="bxslider">
      <div style="text-align:center;">
      <li><img  src="images/index/1.jpg" alt="" style="height:600px; text-align:center;"></li>
      </div>
      <div style="text-align:center;">
      <li><img  src="images/index/2.jpg" alt="" style="height:600px;text-align:center;"></li>
      </div>
      <div style="text-align:center;">
      <li><img  src="images/index/3.jpg" alt="" style="height:600px;text-align:center;"></li>
      </div>
    </ul>
   

  <div class="outer">

    <div class="wrapper wrapper-main flex-parent">

      <main class="wrapper-main">
        <!--並び替えボタン-->
        
        <!--end 並び替えボタン-->

        <!--商品リスト-->
        <ul class="products-list">
            <?php echo $view; ?>
        </ul>
        <!--end ページャー-->
      </main>
    </div>
  </div>
  <div style="margin-left: auto;margin-right: auto;">
  <a href="cms/item.php" class="btn-back" style="color: red;font-size:50px; text-align:center;" >二郎を登録する</a>

  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

    </div>
    <p class="copyrights"><small>Copyrights ataru saito All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script>
  $(".bxslider").bxSlider({auto:true,options:3000});
</script>
</body>
</html>
