<?php

/**
 * Logger class.
 * 
 * @author xionjames
 * @version 1.0
 */

namespace JJFP\Common;

use JJFP\Config\Config;
use JJFP\Common\Constants;
use \Katzgrau\KLogger\Logger;

class MyLogger {
    
    private static $logger;

    public static function getLogger()
    {
        if (!self::$logger instanceof Logger) {
            $cfg = Config::getInstance();
            $cfg->load();
            self::$logger = new Logger('../../log/', $cfg->get(Constants::INI_LOGGING, Constants::INI_LOGGING_LEVEL), array (
                'extension' => 'log', // changes the log file extension
            ));
        }

        return self::$logger;
    }
}

?>