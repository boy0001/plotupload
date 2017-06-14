<?php
require "config/configuration.php";
$ips = $schematic_settings = Config::get('required_ips');
if (count($ips) > 0 && !in_array($_SERVER['REMOTE_ADDR'], $ips)) {
    header('Location: http://13.13.13.13');
    exit();
}
if (strlen($_SERVER['QUERY_STRING']) != 36 && strlen($_SERVER['QUERY_STRING']) != 32) {
  header('Location: http://13.13.13.13');
  exit();
}
if (preg_match('/^\{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}\}?$/', $_SERVER['QUERY_STRING']) == 0) {
  header('Location: http://13.13.13.13');
  exit();
}
$dir = "saves/" . $_SERVER['QUERY_STRING'];
$return_array = array();

if(is_dir($dir)){
    if($dh = opendir($dir)){
        while(($file = readdir($dh)) != false){
            if($file != "." and $file != ".."){
                $return_array[] = $file;
            }
        }
    }
    echo json_encode($return_array, true);
}
?>