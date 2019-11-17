<?php

/**
 * Constants class.
 * 
 * @author xionjames
 * @version 1.0
 */

namespace JJFP\Common;

class Constants {
    
    // Directories
    const DIR_API   = 'api/';
    const DIR_BATCH = 'batch/';
    const DIR_CFG   = 'cfg/';
    const DIR_CORE  = 'core/';
    const DIR_DB    = 'db/';
    const DIR_LOG   = 'log/';
    
    // Files
    const FILE_INI_APP   = Constants::DIR_CFG . 'app.ini';
    const FILE_XERO_CERT = Constants::DIR_CFG . 'xero/privatekey.pem';

    // INI key groups
    const INI_LOGGING = 'logging';
    const INI_XERO    = 'xero';
    const INI_MONGO   = 'mongo';
    
    // INI keys
    const INI_LOGGING_LEVEL  = 'level';
    const INI_XERO_KEY       = 'key';
    const INI_XERO_SECRET    = 'secret';
    const INI_MONGO_DATABASE = 'database';
    const INI_MONGO_USER     = 'user';
    const INI_MONGO_PASSWORD = 'password';
    const INI_MONGO_HOST     = 'host';

}

?>