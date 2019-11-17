<?php

/**
 * Singleton class for config settings.
 * 
 * @author xionjames
 * @version 1.0
 */

namespace JJFP\Config;

use JJFP\Common\Constants;

class Config
{
    private static $instance;
    private $settings = array();

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Load config from INI file
     */
    public function load()
    {
        if (!$this->isLoaded()) {
            $this->settings = parse_ini_file( '../' . Constants::FILE_INI_APP, true );

            return $this->isLoaded();
        }
        
        return true;
    }


    private function isLoaded() {
        return isset($this->settings[ Constants::INI_XERO ]); 
    }
    
    /**
     * Return a specific key
     */
    public function get($group, $key)
    {
        return $this->settings[ $group ][ $key ];
    }
}

?>