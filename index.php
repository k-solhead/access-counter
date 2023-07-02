<?php


$time = date('Y:m:d:H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];
$data = "{$time}\t{$ip}\n\r";

$file = @fopen('access.log', 'a') or die('ファイルを開けませんでした');
flock($file, LOCK_EX);
fwrite($file, $data);
flock($file, LOCK_UN);
fclose($file);

$file = file('access.log');
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アクセスカウンター</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <h1>アクセスカウンター</h1>
    <div>
      <h2><?php $count = count($file);echo 'あなたは<span class="counter">'.($count-1).'</span>人目の訪問者です。';?></h2>
    </div>
    <?php foreach($file as $row) { ?>
    <p><?php echo $row;?></p>
    <?php }?>
  </div>
</body>
</html>