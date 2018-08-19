<?php
$app_name = $_GET['apn'];
$decypted_app_name = base64_decode($app_name);
if (!$app_name) {
  die;
}else{
  include('config/DB.php');
  $db = new DB();
  $sql = "SELECT `key_word_quiet` , `key_word_money` , `apps_money` FROM `APP_API` WHERE `id_name` = ? ";
  $params = [$decypted_app_name];
  $result = $db->query($sql,$params);
  if ($result) {
    $result = $db->fetch()[0];
    if ($result['apps_money'] == 'Quiet') {
      echo $result['key_word_quiet'];die;
    }elseif ($result['apps_money'] == 'Money') {
      echo $result['key_word_money'];die;
    }else{
      die;
    }
  }
}

 ?>
