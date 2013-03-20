<?PHP
// Include basic files
include_once ('configuration.php');
include_once ('initials.php');

// Include libraries
include_once (LIBS . 'core.php');
include_once (LIBS . 'smarty/smarty.class.php');

// Include importand controllers
include_once (CONTROLLERS . 'cError.php');

$core = new core;

$core->getView($_GET['com']);


?>