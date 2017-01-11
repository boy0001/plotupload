<?php
require "config/configuration.php";
parse_str($_SERVER['QUERY_STRING'], $arr);
?>
<HTML>
<HEAD>
<TITLE><?php echo Config::get('title');?></TITLE>
<link rel='stylesheet' type='text/css' href='style/style_<?php echo Config::get('style');?>.css'>
</HEAD>
<BODY>

<!--
EDITABLE: Navigation
-->
<div id=nav>
<div id=button><a class=navlink href="<?php echo Config::get('home');?>">Home</a></div>
<div id=button><a class=navlink href="https://github.com/IntellectualCrafters/PlotSquared/wiki">Wiki</a></div>
<div id=button><a class=navlink href="https://github.com/IntellectualCrafters/PlotSquared/issues">Issues</a></div>
</div>
<div id=banner>
</div>
<!--
END NAVIGATION
-->
<?php
if (isset($arr["key"])) {
    $uuid = htmlspecialchars($arr["key"]);
    if ((strlen($uuid) == 36 || strlen($uuid) == 32) && preg_match('/^\{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}\}?$/', $uuid) != 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($uuid) . ".schematic";
        if (file_exists($target_file)) {
            echo "<a href='uploads/" . $uuid . ".schematic'><h1>Click here if your download doesn't start automatically</h1></a>";
            if (Config::get('allow-delete')) {
                echo "<br><br><br><a href='delete.php?" . $uuid . "'><h1>Click here to permanently delete the file</h1></a>";
            }
            header( "refresh:0;url=http://" . $_SERVER["SERVER_NAME"] . strtok($_SERVER["REQUEST_URI"],'?') . "download.php?" . $uuid) ;
        } else {
            echo "<h1>File deleted!</h1>";
        }
    } else {
        echo "<h1>Invalid Key!</h1>";
    }
}
else {
    echo "<h1>PlotSquared plot downloading</h1>";
}
?>
<div id="main">
<div id=box>
<h2>How to download your plot</h2>
<table>
    <tr>
      <td><b>Login to your favorite creative server</b></td>
      <td id=ip>your.ip.here</td>
    </tr>
    <tr>
      <td><b>Go to your plot</b></td>
      <td>/plot home</td>
    </tr>
    <tr>
      <td><b>Download your plot</b></td>
      <td>/plot download</td>
    </tr>
</table>
</div>
<?php
if (count(Config::get('ups')) == 0) {
    echo "<h2>Upload:</h2><form id='myform' action='upload.php' method='post' enctype='multipart/form-data'><input type='file' name='schematicFile' onchange='upload()'></form>";
}
?>
<h2>See also: <div id=button><a class=navlink href="https://github.com/IntellectualCrafters/PlotSquared/wiki">WorldEdit Schematic Downloading/Uploading</a></div></h2>
</div>
<script>
function upload() {
    var form = document.getElementById("myform");
    form.action = "upload.php?" + 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {var r = Math.random()*16|0,v=c=='x'?r:r&0x3|0x8;return v.toString(16);});
    form.submit();
}
search = window.location.search.substring(1);
if (search.length > 0) {
    split = search.split("&");
    for (var i in split) {
        term = split[i];
        console.log(term);
        split2 = term.split("=");
        switch(split2[0]) {
            case "key":
                // do stuff
                break;
            case "ip":
                document.getElementById("ip").innerHTML = split2[1];
                break;
            case "upload":
                window.prompt("To load your schematic use ", "//schematic load url:" + split2[1]);
                window.location = window.location.href.split("?")[0];
                break;
        }
    }
}
</script>
</BODY>
</HTML>