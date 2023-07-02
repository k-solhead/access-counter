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

echo ($count-1).'件のアクセスがありました。';

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アクセスカウンター</title>
</head>
<body>
  <h1>アクセスカウンター</h1>
  <div class="counter-area">
    <span class="counter"><?php $count = count($file);echo 'あなたは'.$count.'人目の訪問者です。';?></span>
  </div>
    <?php foreach($file as $row) { ?>
    <p><?php echo $row;?></p>
    <?php }?>
</body>
</html>