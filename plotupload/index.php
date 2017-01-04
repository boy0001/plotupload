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
		<!-- BEGIN Custom Themes -->
			<!-- Yeti - DEFAULT -->
				<!-- For Development -->
				<link rel="stylesheet" href="res/themes/Yeti/css/bootstrap.min.css?version=2" title="Yeti">
				<link rel="stylesheet" href="res/themes/Yeti/css/custom.css?version=2" title="Yeti">
				<link rel="stylesheet" href="res/themes/Yeti/css/font-awesome.min.css?version=2" title="Yeti">
				<!-- Live CSS -->
				<link rel="stylesheet" href="/styles/themes/Yeti/css/bootstrap.min.css?version=2" title="Yeti">
				<link rel="stylesheet" href="/styles/themes/Yeti/css/custom.css?version=2" title="Yeti">
				<link rel="stylesheet" href="/styles/themes/Yeti/css/font-awesome.min.css?version=2" title="Yeti">
		<!-- END Custom Themes -->
	</HEAD>
<BODY>

<!--
EDITABLE: Navigation
-->
<!-- Banner Image -->
<div id=banner></div>
<!-- CUSTOM NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navbar_collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./">CP2 Interface</a>
		</div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="main_navbar_collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo Config::get('home');?>">Home</a></li>
				<li><a href="https://github.com/IntellectualCrafters/PlotSquared/wiki">Wiki</a></li>
				<li><a href="https://github.com/IntellectualCrafters/PlotSquared/issues">Issues</a><li>
			</ul>
			<!-- User control (right side of navbar) -->
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown alert-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span style="margin: -10px 0px; font-size: 16px;"><i class="fa fa-envelope"></i> <div style="display: inline;" id="pms"></div></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Click View Messages</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="../user/messaging">View Messages</a></li>
					</ul>
				</li>	
				
				<li class="dropdown alert-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span style="margin: -10px 0px; font-size: 16px;"><i class="fa fa-flag"></i> <div style="display: inline;" id="alerts"></div></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Click View Alerts</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="../user/alerts">View Alerts</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;MuhsinunCool <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="../profile/<?php echo $this->u;?>">Profile</a></li>
						<li class="divider"></li>
						<li><a href="../user">UserCP</a></li>
						<li><a href="../mod">ModCP</a></li>
						<li><a href="../admin">AdminCP</a></li>
						<li class="divider"></li>
						<li><a href="../infractions">Infractions</a></li>
						<li class="divider"></li>
						<li><a href="./login.php<?php if ($this->u) echo "?action=logout"?>"><?php echo $this->u ? "Sign Out" : "Sign In";?></a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>
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

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Consoles</h3>
	</div>
	<div class="panel-body">
		<ul>
			<li><a href="#">Hub</a></li>
			<li><a href="#">Creative</a></li>
		</ul>
	</div>
</div>

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
    echo "<h2>Upload:</h2><form id='myform' action='upload.php' method='post' enctype='multipart/form-data'><input type='file' name='schematicFile' onchange='upload()'></form></div>";
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