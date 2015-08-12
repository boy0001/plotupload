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

$styles = array("8bit", "clean", "default", "frame", "gray", "green", "orange", "phanaticd", "shadow");

########################################################################################################################
$config = array();                                                                                                     #
                                                                                                                       #
//DO NOT EDIT ABOVE THIS                                                                                               #
                                                                                                                       #
# Edit below this ######################################################################################################
$config['title'] = 'PlotSquared plot download'                            ; # Title of the web page                    #
$config['style'] = $styles[array_rand($styles, 1)]                        ; # The style to use (see styles folder)     #
//If you like a specific style: $config['style'] = 'default'                                                           #
                                                                                                                       #
$config['home']  = 'https://www.spigotmc.org/resources/plotsquared.1177/' ; # The website for the home link            #
                                                                                                                       #
$config['ups']   = array('127.0.0.1')                                     ; # To authorize all servers use array()     #
########################################################################################################################

// DO NOT EDIT BELOW THIS
foreach($config as $var => $val) {
    Config::set($var, $val);
}
unset($config);
?>