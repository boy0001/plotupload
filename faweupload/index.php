<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();require "config/configuration.php";parse_str($_SERVER[ 'QUERY_STRING'],$arr);?>
<HTML>

<HEAD>
  <link rel="icon" href="data:;base64,=">
  <TITLE><?php echo Config::get( 'title');?></TITLE>
	<link rel='stylesheet' type='text/css' href='style/style_<?php echo Config::get('style');?>.css'>
</HEAD>

<BODY>
  <div id=nav>
    <a class="navbar-brand">
      <?php echo Config::get('navtitle');?>
    </a>
    <div id=button>
      <a class=navlink href="<?php echo Config::get('home');?>">Home
    </a>
    </div>
    <div id=button>
      <a class=navlink href="<?php echo Config::get('wiki');?>">Wiki
    </a>
    </div>
    <div id=button>
      <a class=navlink href="<?php echo Config::get('issues');?>">Report Issue
    </a>
    </div>
    <div id=button>
      <a class=navlink href="<?php echo Config::get('support');?>">Support/Chat
    </a>
    </div>
    <div id=button>
      <a class=navlink href="<?php echo Config::get('privacy');?>">Privacy Policy
    </a>
    </div>
  </div>
  <div id=banner></div>
<?php 
if (isset($arr["key"])) {
 $uuid = htmlspecialchars($arr["key"]);
 $type = isset($arr["type"]) ? $arr["type"] : "schematic";
 if (in_array($type, Config::get('file-types'))) {
  if ((strlen($uuid) == 36 || strlen($uuid) == 32) && preg_match('/^\{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}\}?$/', $uuid) != 0) {
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($uuid) . "." . $type;
   if (file_exists($target_file)) {
    echo "<a href='uploads/" . $uuid . "." . $type . "'><h1>Click here if your download doesn't start automatically</h1></a>";
    if (Config::get('allow-delete')) {
     echo "<br /><br /><br /><a href='delete.php?key=" . $uuid . "&type=" . $type . "'><h1>Click here to permanently delete the file</h1></a>";
    }
    header("refresh:1;url=http://" . $_SERVER["SERVER_NAME"] . strtok($_SERVER["REQUEST_URI"], '?') . "download.php?key=" . $uuid . "&type=" . $type);
   }
   else {
    echo "<h1>File deleted!</h1>";
   }
  }
  else {
   echo "<h1>Invalid Key!</h1>";
  }
 }
 else {
  echo "<h1>Invalid format!</h1>";
 }
}
else {
 echo "<h1 class='h1-custom'>" . Config::get('header1') . "</h1>";
}
?>
  <div id="main">
    <div id=box>
      <h2>How to download a schematic
    </h2>
      <table>
        <tr>
          <td>
            <b>Copy an area to your clipboard
        </b>
          </td>
          <td id=ip>//copy
          </td>
        </tr>
        <tr>
          <td>
            <b>Download your clipboard
        </b>
          </td>
          <td>//download
          </td>
        </tr>
      </table>
    </div>
    <?php if(count(Config::get( 'required_ips'))==0){echo "<br><h2>How to upload:</h2><form id='myform' action='upload.php' method='post' enctype='multipart/form-data'><input type='file' name='schematicFile' onchange='uploadFile()'></form>";}?>
  </div>
  <script>
    function uploadFile() {
      var b = document.getElementById("myform");
      b.action = "upload.php?" + "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(c) {
        var f = Math.random() * 16 | 0,
          a = c == "x" ? f : f & 3 | 8;
        return a.toString(16)
      });
      b.submit()
    }

    function query(j) {
      var h = window.location.search.substring(1);
      var a = h.split("&");
      for (var i = 0; i < a.length; i++) {
        var g = a[i].split("=");
        if (decodeURIComponent(g[0]) == j) {
          return decodeURIComponent(g[1])
        }
      }
      return null
    }
    search = window.location.search.substring(1);
    if (search.length > 0) {
      var upload = query("upload");
      var type = query("type");
      var ip = query("ip");
      if (upload != null) {
        if (type == null) {
          type = "schematic"
        }
        window.prompt("To load your schematic use ", "//schematic load " + type + " url:" + upload);
        window.location = window.location.href.split("?")[0]
      }
      if (ip != null) {
        document.getElementById("ip").innerHTML = ip
      }
    };
  </script>
</BODY>
</HTML>