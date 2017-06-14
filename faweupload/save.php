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
if (sizeof($_FILES) == 0) {
  echo "Sorry, only .schematic files are allowed.";
  exit;
}
$target_dir = "saves/";
$target_file = $target_dir . basename($_SERVER['QUERY_STRING']) . "/" . basename($_FILES["schematicFile"]["name"]);
$uploadOk = 1;
$schematicFileType = pathinfo($_FILES["schematicFile"]["name"],PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["schematicFile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a schematic file.";
        $uploadOk = 0;
    }
}
// Check if file already
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["schematicFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($schematicFileType != "schematic") {
    echo basename( $_FILES["schematicFile"]["name"]);
    echo " --- ";
    echo $schematicFileType;
    echo " --- ";
    echo "Sorry, only .schematic files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (!is_dir("saves/" . basename($_SERVER['QUERY_STRING']))) {
        mkdir("saves/" . basename($_SERVER['QUERY_STRING']), 0777);
    }
    $parent = dirname($target_file);
    if (!is_dir($parent)) {
        mkdir($parent, 0777);
    }
    if (move_uploaded_file($_FILES["schematicFile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["schematicFile"]["name"]). " has been uploaded.";
    } else {
        var_dump($_FILES);
        echo $target_file . "\n";
        echo $parent . "\n";
        echo $_FILES['schematicFile']['error'];
        echo "<br>";
        echo "FAILURE";
    }
}
?>
