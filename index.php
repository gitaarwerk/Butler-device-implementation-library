<?
require_once('includes/settings.php');

require_once('classes/framework.class.php');
require_once('classes/template.class.php');


require_once('interfaces/switch.interface.php');
require_once('interfaces/light.interface.php');

require_once('classes/device.class.php');
require_once('classes/devices/onoffswitch.class.php');

?>



<h1>Butler</h1>
<p>
<?

$template = new Template();

echo $template;

?>
</p>

