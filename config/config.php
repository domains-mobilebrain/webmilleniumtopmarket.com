<?php
define("DEBUG", true);

/*LOCAL*/
define('DB_HOSTNAME', '109.203.103.187');
define('DB_USERNAME', 'myservic_reg_apk');
define('DB_PASSWORD', 'reg123!@#');
define('DB_DBNAME',   'reports');



function old($str){
  return isset($_POST[$str]) ? $_POST[$str] : '';
}
/*PROD*/
/*define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Qazxsw1!');
define('DB_DBNAME',   'odds_magic');*/
?>
