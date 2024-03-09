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
	'SBBRIDGE_ERROR_STATBLOCK_NOT_INSTALLED'			=> '<br>The extension <b>“Statistics Block”</b> from kirk is not installed.  You must first install the extension before you can use this Extension it here.',
	'SBBRIDGE_ERROR_PHPBB_MISTMATCH'					=> 'Please check if you have the right version of the phpbb forum installed. Minimum phpBB %1$s but smaller than %2$s',
	'SBBRIDGE_ERROR_PHP_MISTMATCH'						=> '<br>Please check whether the correct php version is active. <br>At least PHP %1$s Maximum kleiner als PHP %2$s',
]);
