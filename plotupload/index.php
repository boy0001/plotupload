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
	<?php include 'res/templates/header.php';?>
<BODY>

<!--
EDITABLE: Navigation
-->
<!-- Banner Image -->
<div id=banner></div>
<!-- CUSTOM NAVBAR -->
<!--
END NAVIGATION
-->

<div class="container">
	<?php
	if (isset($arr["key"])) {
		echo "<a href='uploads/" . htmlspecialchars($arr["key"]) . ".schematic'><h1>Click here if your download doesn't start automatically</h1></a>";
	}
	else {
		echo "<h1 class='h1-custom'>" . Config::get('header1') . "</h1>";
	}
	?>
</div>

<div id="main">
	<div id="box">
		<h2 class="h2-custom">How to download your plot</h2>
		<table>
			<tr>
				<td><b>Login to your favorite creative server</b></td>
				<td id="ip"><?php echo Config::get('serverip'); ?></td>
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
	
	<script>
		$(":file").filestyle({buttonName: "btn-primary"});
	</script>

<?php
if (count(Config::get('ups')) == 0) {
    echo "<h2 class='h2-custom'>Upload:</h2><form id='myform' action='upload.php' method='post' enctype='multipart/form-data'><input type='file' class='filestyle' data-buttonName='btn-primary' name='schematicFile' onchange='upload()'></form></div>";
}
?>

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
					window.prompt("To paste your schematic use ", "/plot schematic paste url:" + split2[1]);
					window.location = window.location.href.split("?")[0];
					break;
			}
		}
	}
</script>
</BODY>
</HTML>