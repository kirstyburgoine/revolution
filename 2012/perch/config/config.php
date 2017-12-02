<?php

    define('PERCH_LICENSE_KEY', 'P11204-GAD413-SQG109-NXR656-VCQ010');

    define("PERCH_DB_USERNAME", 'web112-rev2012');
    define("PERCH_DB_PASSWORD", 'rev2012');
    define("PERCH_DB_SERVER", "localhost");
    define("PERCH_DB_DATABASE", "web112-rev2012");
    define("PERCH_DB_PREFIX", "perch_");
    
    define('PERCH_EMAIL_FROM', 'info@kirstyburgoine.co.uk');
    define('PERCH_EMAIL_FROM_NAME', 'Kirsty Burgoine');

    define('PERCH_LOGINPATH', '/perch');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', dirname(__FILE__)));

    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');
    
    define('PERCH_HTML5', true);
  
?>