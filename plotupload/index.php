<?php
require "config/configuration.php";
parse_str($_SERVER['QUERY_STRING'], $arr);
if (isset($arr["key"])) {
    $key = htmlspecialchars($arr["key"]);
    if (strlen($key) == 36 || strlen($key) == 32) {
        header( "refresh:0;url=http://" . $_SERVER["SERVER_NAME"] . strtok($_SERVER["REQUEST_URI"],'?') . "download.php?" . $key) ;
    }
}
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
    echo "<a href='uploads/" . htmlspecialchars($arr["key"]) . ".schematic'><h1>Click here if your download doesn't start automatically</h1></a>";
}
else {
    echo "<h1>PlotSquared plot downloading</h1>";
}
?>
<div id="main">
<h2>How to download your plot</h2>
<div id=box>
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
</div>
<script>
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
        }
    }
}
</script>
</BODY>
</HTML>