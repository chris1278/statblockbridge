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
	'ACP_LF_WWH2_ACTIVE'				=> 'Auswahl für LF who was here 2 (Wer war da?) aktiviern',
	'ACP_LF_WWH2_ACTIVE_EXPLAIN'		=> 'Hier können Sie auswählen ob Sie die Extension <a href="https://www.phpbb.de/community/viewtopic.php?t=241976" target="_blank"><u><b>LF who was here 2</b></u></a> nutzen möchten oder nicht.',
	'ACP_LF_STATSPERM_ACTIVE'			=> 'Auswahl für Stats Permissions aktivieren',
	'ACP_LF_STATSPERM_ACTIVE_EXPLAIN'	=> 'Hier können Sie auswählen ob Sie die Extension <a href="#" target="_blank"><u><b>Stats Permissions</b></u></a> nutzen möchten oder nicht.',
	'LF_DEACTIVATED'					=> 'Diese Extension ist gerade nicht aktiviert. Um diese Auswahl nutzen zu können aktivieren Sie bitte erst die Extension.',
	'LF_DEINSTALLED'					=> 'Diese Extension ist im Moment nicht installiert. Um diese nutzen zu können müssen Sie die Extension zuerst installieren.',

]);
