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
	'ERROR_BRIDGE'							=> 'Brücke zwischen “LF who was here” und “Stat Block”',
	'WWH_BRIDGE'							=> 'LF who was here',
	'ERROR_BRIDGE_EXTENSION_NOT_ENABLEABLE'	=> 'Die Erweiterung “%1$s - Brücke zwischen "LF Wer War Da" und "[3.1] [3.2] Stat BLock" Extension kann nicht aktiviert werden. Bitte prüfe die Voraussetzungen, die für die Erweiterung notwendig sind.',
	'ERROR_WHO_WAS_HERE_NOT_INSTALLED'		=> '<br>Die Erweiterung <a href="https://github.com/LukeWCS/lf-who-was-here/releases" target="_blank">“%2$s”</a> muss zuerst installiert sein.<br> Bitte achte drauf das du die Richtige Version installierst.',
	'ERROR_PHPBB_MISTMATCH'					=> '<br>Bitte schaue ob du die Richtige Phpbb Forums Version installiert hast.<br>Minimum phpBB %2$s aber kleiner als %3$s',
	'ERROR_WHO_WAS_HERE_WRONG_VERSION'		=> '<br>Die von dir Installierte Version von "LF Wer War Da" ist die Falsche Version<br> Lade dir die aktuelle Version hier runter:  <a href="https://github.com/LukeWCS/lf-who-was-here/releases/" target="_blank">“[3.1][3.2] LF who was here?”</a> Erweiterung installiert. Erforderlich Version = %1$s',
	'ERROR_PHP_MISTMATCH'					=> '<br>Bitte prüfe ob die korrekte Php Version aktiv ist. <br>Minimum PHP %2$s Maximum kleiner als PHP %3$s',
]);
