<!-- <table class="table table-striped"> -->
<?php
//1.  DB接続します
try {
$pdo = new PDO('mysql:dbname=gs_db_2;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table_sleep");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合⇒配列index[2]にエラーコメントあり）
  $error = $stmt->errorInfo(); 
  exit("ErrorSQL:".$error[2]);
//   exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

  $view .= '<table class="table">';
  $view .= '<th>ID';
  $view .= '<th>検査日';
  $view .= '<th>検査施設';
  $view .= '<th>体重（kg）';
  $view .= '<th>血圧（mmHg）';
  $view .= '<th>AHI';
  $view .= '<th>日中の眠気';
  $view .= '<th>口腔清掃';
  $view .= '<th>顎関節';
  $view .= '<th>口腔内装置使用状況';
  $view .= '<th>口腔筋機能療法';
  $view .= '<th>舌圧';
  $view .= '<th>下顎前方移動量（%）';
  $view .= '<th>栄養指導';
  $view .= '<th>運動指導';
  $view .= '<th>次回受診';
  $view .= '<th>備考';
  $view .= '<th>登録日時';

  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
    //detail.php=GETデータ送信リンク作成
    $view .= '<p>';
    $view .= '<tr>';

    // $view .= '<td>'.url_link($result["id"], $result["checkdate"])."</td>";

    // function url_link(id ,txt){
    //     return '<a href="detail.php?id='.$id.'">'.$txt."</a>";      
    // }

    $id_link = '<a href="detail.php?id='.$result["id"].'">';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["id"];
    // $view .= '<td>'.$result["id"].'</td>';
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["checkDate"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["clinic"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["weight"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["bloodPressure"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["ahi"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["sleepiness"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["oralCleaning"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["jawJoint"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["oaUse"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["oralMuscle"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["tonguePressure"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["lowerJaw"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["nutrition"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["exercise"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["nextDate"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["remarks"];
    $view .= '</td>';

    $view .= '<td>';
    $view .= $id_link; $view .= $result["indate"];
    $view .= '</td>';

    // $view .= '<a href="detail.php?id='.$result["checkDate"].'">';
    // $view .= '<td>'.$result["checkDate"].'</td>';
    // $view .= '</a>';

    // $view .= $result["id"]." : ".$result["checkDate"]." : ".$result["clinic"]." : ".$result["weight"]." : ".$result["bloodPressure"]." : ".$result["ahi"]." : ".$result["sleepiness"]." : ".$result["oralCleaning"]." : ".$result["jawJoint"]." : ".$result["oaUse"]." : ".$result["oralMuscle"]." : ".$result["tonguePressure"]." : ".$result["lowerJaw"]." : ".$result["nutrition"]." : ".$result["exercise"]." : ".$result["nextDate"]." : ".$result["remarks"]." : ".$result["indate"];
    // $view .= '</a>';
    // $view .= '</td>';

    // $view .= "<td>".$result["clinic"]."</td>";

    $view .= '<td>';
    // データベースのデータ削除
    $view .= '　';
    // $view .= "<button class='button btn'>[詳細]</button> <i class='glyphicon glyphicon-apple'/>";
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= "[削除]";
    $view .= '</td>';
    $view .= '</a>';
    
    $view .= '</p>';
    $view .= '</tr>';
  }
  $view .= '</table>';
}

// $json = json_encode($result);
?>
<!-- </table> -->

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>データ表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- ＜bootstrap読込み＞- -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- ＜bootstrap読込み＞- -->

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid" >
      <div class="navbar-header" style="text-align:center">
      <a class="navbar-brand" href="index.php" >検査結果／睡眠の状態</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

    <div >
    <?=$view?>
    </div>
<!-- <script>
   const data = JSON.parse('<?=json?>');
   console.log(data);
</script> -->
<!-- Main[End] -->

</body>
</html>
