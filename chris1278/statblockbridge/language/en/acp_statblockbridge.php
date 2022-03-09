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
	'ACP_SBBRIDGE_WWH2'						=> 'Enable selection for LF who was here 2',
	'ACP_SBBRIDGE_WWH2_EXPLAIN'				=> 'Here you can choose whether you want to use the <a href="https://www.phpbb.de/community/viewtopic.php?t=241976" target="_blank"><u><b>LF who was here 2</b></u></a> extension or not.',
	'ACP_SBBRIDGE_STATSPERM'					=> 'Enable selection for Stats Permissions',
	'ACP_SBBRIDGE_STATSPERM_EXPLAIN'			=> 'Here you can choose whether you want to use the Extension <a href="#" target="_blank"><u><b>Stats Permissions</b></u></a> or not.',
	'SBBRIDGE_DEACTIVATED'					=> 'This extension is currently not activated. In order to be able to use this selection, please activate the extension first.',
	'SBBRIDGE_DEINSTALLED'					=> 'This extension is not installed at the moment. In order to be able to use this, you must first install the extension.',

]);
