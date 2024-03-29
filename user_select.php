<?php
include "user_funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
// SQLもたせる
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
// 実行
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="user_detail.php?id='.$result["id"].'">';
        $view .= $result["name"] . "," . $result["lid"] . "," . $result["lpw"] . "," . $result["kanri_flg"] . "," . $result["life_flg"];
        $view .= '</a>';
        
        $view .= '　';
        $view .= '<a href="user_delete.php?id='.$result["id"].'">';
        $view .= "[削除]";
        $view .= '</a>';

        $view .= '</p>';
    }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理USER一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="user_index.php">管理USER一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
