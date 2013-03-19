<?PHP

define('MODELS', '/'. $cfg['PROJECT_DIRECTORY'] .'models/');
define('CONTROLLERS', '/'. $cfg['PROJECT_DIRECTORY'] .'controllers/');
define('VIEWS', '/'. $cfg['PROJECT_DIRECTORY'] .'views/');
define('LIBS', '/'. $cfg['PROJECT_DIRECTORY'] .'libs/');

define('ERROR_MAIL_NAME', $cfg['PROJECT_DEVELOPER_NAME']);
define('ERROR_MAIL_TO', $cfg['PROJECT_DEVELOPER_MAIL']);
define('ERROR_MAIL_FROM', $cfg['PROJECT_MAIL_FROM']);
define('ERROR_PROJECT_NAME', $cfg['PROJECT_NAME']);

ini_set('SMTP', $cfg['SMTP_SERVER']);

?>