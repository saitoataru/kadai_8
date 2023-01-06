<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入力フォーム</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">
  <!--header-->
  <header class="header" style="height:150px; background-color: yellow;">
  <div style="margin-left: auto;margin-right: auto;">
    <h1 style="color: red;font-size:50px;">みんなのラーメン二郎<br>入力フォーム
    </h1>
  </div>
  </header>
  <!-- end header-->

  <div class="outer">

    <!--商品本情報-->
    <div class="wrapper wrapper-cms">
      <!--商品選択フォーム-->
      <form action="insert.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <!--商品情報-->
        <p class="cms-thumb"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>
        <dl class="cms-list">
          <dt>ラーメン画像</dt>
          <dd><input type="file" name="fname" class="cms-item" accept="image/*"></dd>
          <dt>お店の名前</dt>
          <dd><select name="item"  placeholder="商品名を入力" class="cms-item" >
            <option value="三田本店">"三田本店"</option>
            <option value="目黒店">"目黒店"</option>
            <option value="京都店">"京都店"</option>
          </select>
         
          </dd>
          <dt>ニンニク</dt>
          <dd><select type="text" name="value" placeholder="金額を入力" class="cms-item">
            <option value="マシ">"マシ"</option>
            <option value="マシマシ">"マシマシ"</option>
            <option value="マシマシマシ">"マシマシマシ"</option>
          </select>
          </dd>
          <dt>感想</dt>
          <dd><textarea name="description" id="" cols="30" rows="10" class="cms-item">食べた感想を入力</textarea></dd>
        </dl>
        <!--end 商品情報-->
        <ul class="btn-list btn-list__cms">
          <li class="btn-calculate">
            <input type="submit" id="btn-update" value="登録">
          </li>
          <li class="">
            <a href="../index.php" class="btn-back">みんなの二郎をみる</a>
          </li>
        </ul>
        </form>
        <!--end 商品選択フォーム-->
    </div>
    <!--end 商品本情報-->
  </div>

  <!--footer-->
  <footer class="footer">
    <p class="copyrights"><small>Copyrights ataru saito Rights Reserved.</small></p>
  </footer>
  <!--end footer-->




<script src="http://code.jquery.com/jquery-3.6.1.js"></script>
<script>
//---------------------------------------------------
//画像サムネイル表示
//---------------------------------------------------
// アップロードするファイルを選択
$('input[type=file]').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.cms-thumb > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.cms-thumb > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});
</script>
</body>
</html>
