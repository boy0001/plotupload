<?php
require "config/configuration.php";
$delete = Config::get('allow-delete');
if (!$delete) {
    die;
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

if (preg_match('/^\{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}\}?$/', $key) == 0) {
    header('Location: http://13.13.13.13');
    exit();
}
$target_dir = "uploads/";
$target_file = $target_dir . basename($key) . "." . $type;
if (file_exists($target_file)) {
    unlink($target_file);
    echo "File deleted!";
} else {
    echo "File not found!";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>