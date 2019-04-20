<?php
require "config/configuration.php";
$ips = $schematic_settings = Config::get('required_ips');
if (count($ips) > 0 && !in_array($_SERVER['REMOTE_ADDR'], $ips)) {
    header('Location: http://13.13.13.13');
    exit();
}
parse_str($_SERVER['QUERY_STRING'], $output);
if (!isset($output['key']) || !isset($output['type'])) {
	header('Location: http://13.13.13.13');
	exit();
}
$key = $output['key'];
$type = $output['type'];

if (!in_array($type, Config::get('file-types'))) {
	header('Location: http://13.13.13.13');
	exit;
}
if (strlen($key) != 36 && strlen($key) != 32) {
  header('Location: http://13.13.13.13');
  exit();
}
if (preg_match('/^\{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}\}?$/', $key)) {
    $file_url = 'uploads/' . $key . "." . $type;
    $filename = "clipboard." . $type;
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . $filename . "\""); 
    readfile($file_url);
    exit;
}
header('Location: http://13.13.13.13');
exit();
?>