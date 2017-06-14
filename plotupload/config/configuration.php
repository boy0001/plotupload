<?php

class Config {
    private static $info = array();
    public static function set($key, $value) {
        self::$info[$key] = $value;
    }
    public static function get($key) {
        return self::$info[$key];
    }
    public static function getAll() {
        return self::$info;
    }
}

########################################################################################################################
$config = array();                                                                                                     #
                                                                                                                       #
//DO NOT EDIT ABOVE THIS                                                                                               #
                                                                                                                       #
# Edit below this ######################################################################################################
$config['title'] = 'PlotSquared plot download'                            ; # Title of the web page                    #
# ============== # Styles: 8bit, dark, default, shadow, phanaticd, orange, green, clean, grey, frame. # ============== #
$config['style'] = "dark"                                                 ; # The style to use (see styles folder)     #
//If you like a specific style: $config['style'] = 'default'                                                           #
                                                                                                                       #
$config['navtitle'] = 'Plot Upload:'					        		  ; # The text in the navbar				   #
$config['header1'] = 'PlotSquared Plot Downloading'						  ; # The big text on the web page			   #
$config['serverip'] = 'your.ip.here'									  ;	# The server IP to display on the web page #
$config['home']  = 'https://www.spigotmc.org/resources/1177/' ;             # The website for the home link            #
                                                                                                                       #
# e.g. array('192.168.1.10')                                                                                           #
$config['required_ips']   = array()                                       ; # To authorize all servers use array()     #
                                                                                                                       #
$config['size']  = 15000000                                               ; # Max file size                            #
                                                                                                                       #
$config['allow-delete']  = true                                           ; # Allow file deletion requests             #
########################################################################################################################

// DO NOT EDIT BELOW THIS
foreach($config as $var => $val) {
    Config::set($var, $val);
}
unset($config);
?>