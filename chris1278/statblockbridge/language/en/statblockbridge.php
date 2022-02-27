<?php
/**
*
* @package phpBB Extension - Bridge between the extensions "[3.1] [3.2] Stat BLock" from Kirk and "[3.1][3.2] LF who was here" from LukeWCS
* @copyright (c) 2019 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, [
	'ERROR_BRIDGE'							=> 'Bridge between “LF who was here” and “Stat Block”',
	'WWH_BRIDGE'							=> 'LF who was here',
	'ERROR_BRIDGE_EXTENSION_NOT_ENABLEABLE'	=> 'The extension “%1$s - Bridge between "LF Wer War Da" and "[3.1] [3.2] Stat BLock" Extension can not be activated. Please check the prerequisites that are necessary for the extension.',
	'ERROR_WHO_WAS_HERE_NOT_INSTALLED'		=> '<br>The extension <a href="https://github.com/LukeWCS/lf-who-was-here/releases" target="_blank">“%2$s”</a> must be installed first.<br> Please make sure that you have the correct version installed.',
	'ERROR_PHPBB_MISTMATCH'				=> 'Please check if you have the right version of the phpbb forum installed. Minimum phpBB %2$s but smaller than %3$s',
	'ERROR_WHO_WAS_HERE_WRONG_VERSION'		=> '<br>The version of "LF Who Was Da" installed by you is the wrong version.<br> Download the current version here: <a href="https://github.com/LukeWCS/lf-who-was-here/releases/" target="_blank">“Who was here?”</a> Extension installed. Required Version = %1$s',
	'ERROR_PHP_MISTMATCH'					=> '<br>Please check whether the correct php version is active. <br>At least PHP %2$s Maximum kleiner als PHP %3$s',
]);
