<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
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
	// language pack author
	'SBBRIDGE_LANG_DESC'									=> 'Deutsch (Du)',
	'SBBRIDGE_LANG_EXT_VER' 								=> '3.0.2',
	'SBBRIDGE_LANG_AUTHOR' 									=> 'Chris1278',
	'SBBRIDGE_CONFIG_DESC' 									=> 'Hier können die Einstellungen für die Erweiterung <b>%1$s (v%2$s)</b> geändert werden.',
	'SBBRIDGE_LANGUAGEPACK_OUTDATED'						=> 'Hinweis: Das Sprachpaket dieser Erweiterung ist nicht mehr aktuell.',
	//ACP Translation
	'SBBRIDGE_TITLE'										=> 'Erweiterungs-Brücke für “Statistics Block”',
	'SBBRIDGE_SETTING_SAVED'								=> 'Einstellungen erfolgreich gespeichert.',
]);
