<?PHP

define('MODELS', '/'. $cfg['PROJECT_DIRECTORY'] .'models/');
define('CONTROLLERS', '/'. $cfg['PROJECT_DIRECTORY'] .'controllers/');
define('VIEWS', '/'. $cfg['PROJECT_DIRECTORY'] .'views/');
define('LIBS', '/'. $cfg['PROJECT_DIRECTORY'] .'libs/');
define('TEMPLATES', '/'. $cfg['PROJECT_DIRECTORY'] .'html/templates/');
define('C_TEMPLATES', '/'. $cfg['PROJECT_DIRECTORY'] .'html/c_templates/');

define('ERROR_MAIL_NAME', $cfg['PROJECT_DEVELOPER_NAME']);
define('ERROR_MAIL_TO', $cfg['PROJECT_DEVELOPER_MAIL']);
define('ERROR_MAIL_FROM', $cfg['PROJECT_MAIL_FROM']);
define('ERROR_PROJECT_NAME', $cfg['PROJECT_NAME']);

define('SEC_HASH_VALUE', $cfg['SEC_HASH_VALUE']);

ini_set('SMTP', $cfg['SMTP_SERVER']);

?>