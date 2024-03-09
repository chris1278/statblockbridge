<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace chris1278\statblockbridge;

class ext extends \phpbb\extension\base
{
	private function get_adm_back_link()
	{
		return adm_back_link(append_sid('index.' . $this->container->getParameter('core.php_ext'), 'i=acp_extensions&amp;mode=main'));
	}

	public function is_enableable()
	{
		$is_enableable = true;
		$language	= $this->container->get('language');
		$language->add_lang('statblockbridgeerror', 'chris1278/statblockbridge');
		$phpbb_min_ver		= '3.2.10';
		$phpbb_below_ver	= '3.4.0@dev';
		$php_min_ver	= '7.0.0';
		$php_below_ver	= '8.2.0';

		if (!(phpbb_version_compare(PHP_VERSION, $php_min_ver, '>=') && phpbb_version_compare(PHP_VERSION, $php_below_ver, '<')))
		{
			trigger_error(sprintf($language->lang('EXTENSION_NOT_ENABLEABLE') . '<br />' . $language->lang('SBBRIDGE_ERROR_PHP_MISTMATCH'), $php_min_ver, $php_below_ver) . $this->get_adm_back_link(), E_USER_WARNING);
		}

		if (!(phpbb_version_compare(PHPBB_VERSION, $phpbb_min_ver, '>=') && phpbb_version_compare(PHPBB_VERSION, $phpbb_below_ver, '<')))
		{
			trigger_error(sprintf($language->lang('EXTENSION_NOT_ENABLEABLE') . '<br />' . $language->lang('SBBRIDGE_ERROR_PHPBB_MISTMATCH'), $phpbb_min_ver, $phpbb_below_ver) . $this->get_adm_back_link(), E_USER_WARNING);
		}

		/**
		* Now if the extension is enabled, first.
		*/
		$ext_manager = $this->container->get('ext.manager');

		if (!$ext_manager->is_enabled('kirk/statblock'))
		{

				trigger_error(sprintf($language->lang('EXTENSION_NOT_ENABLEABLE') . '<br />' . $language->lang('SBBRIDGE_ERROR_STATBLOCK_NOT_INSTALLED')). adm_back_link(append_sid('index.' . $this->container->getParameter('core.php_ext'), 'i=acp_extensions&amp;mode=main')), E_USER_WARNING);
		}

		return $is_enableable;
	}
}
