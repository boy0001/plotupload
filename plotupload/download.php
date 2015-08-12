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
if (preg_match('/^\{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}\}?$/', $_SERVER['QUERY_STRING'])) {
    $file_url = 'uploads/' . $_SERVER['QUERY_STRING'] . ".schematic";
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . "plot.schematic" . "\""); 
    readfile($file_url);
    exit;
}
    header('Location: http://13.13.13.13');
    exit();
?>