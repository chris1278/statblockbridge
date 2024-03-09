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
'SBBRIDGE_STATBLOCK_NOT_ACTIVATED'			=> 'The <a href="https://reyno41.bplaced.net/phpbb/viewtopic.php?t=205&sid=c9951cb358cd0b4cfb84fe97c95676f9" target="_blank"><u><b>Statistics Block</b></u></a> extension is required, but it is not activated or installed.<br>Without this extension, the switches offered here have no effect.',
	'SBBRIDGE_WWH2'							=> 'Enable selection for LF who was here 2',
	'SBBRIDGE_WWH2_EXPLAIN'					=> 'Here you can choose whether the display of the extension <a href="https://www.phpbb.de/community/viewtopic.php?t=241976" target="_blank"><u><b>LF who was here 2</b></u></a> should be shown in the <b>Statistics Block</b>.',
	'SBBRIDGE_STATSPERM'					=> 'Enable selection for Stats Permissions',
	'SBBRIDGE_STATSPERM_EXPLAIN'			=> 'Here you can choose whether the display of the extension <a href="https://www.phpbb.de/community/viewtopic.php?t=246067" target="_blank"><u><b>Stats Permissions</b></u></a> should be shown in the <b>Statistics Block</b>.',
	'SBBRIDGE_DEACTIVATED'					=> 'This extension is currently not activated. In order to be able to use this selection, please activate the extension first.',
	'SBBRIDGE_DEINSTALLED'					=> 'This extension is not installed at the moment. In order to be able to use this, you must first install the extension.',
]);
