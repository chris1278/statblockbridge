<?php
/**
*
* @package phpBB Extension - Bridge for the Extension “Statistics Block” from kirk
* @copyright (c) 2019 (Christian-Esch.de)
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
		$language->add_lang('statblockbridge', 'chris1278/statblockbridge');
		$eb = $language->lang('ERROR_BRIDGE');
		$wb = $language->lang('WWH_BRIDGE');
		$phpbb_min_ver		= '3.2.10';
		$phpbb_below_ver	= '3.4.0@dev';
		$php_min_ver	= '7.0.0';
		$php_below_ver	= '8.1.0';
		$wwh_ver	= '2.1.1';

		if (!(phpbb_version_compare(PHP_VERSION, $php_min_ver, '>=') && phpbb_version_compare(PHP_VERSION, $php_below_ver, '<')))
		{
			trigger_error(sprintf($language->lang('EXTENSION_NOT_ENABLEABLE') . '<br />' . $language->lang('ERROR_PHP_MISTMATCH'), $eb, $php_min_ver, $php_below_ver) . $this->get_adm_back_link(), E_USER_WARNING);
		}

		if (!(phpbb_version_compare(PHPBB_VERSION, $phpbb_min_ver, '>=') && phpbb_version_compare(PHPBB_VERSION, $phpbb_below_ver, '<')))
		{
			trigger_error(sprintf($language->lang('EXTENSION_NOT_ENABLEABLE') . '<br />' . $language->lang('ERROR_PHPBB_MISTMATCH'), $eb, $phpbb_min_ver, $phpbb_below_ver) . $this->get_adm_back_link(), E_USER_WARNING);
		}

		/**
		* Now if the extension is enabled, first.
		*/
		$ext_manager = $this->container->get('ext.manager');

		if (!$ext_manager->is_enabled('lukewcs/whowashere'))
		{

				trigger_error(sprintf($language->lang('ERROR_BRIDGE_EXTENSION_NOT_ENABLEABLE') . '<br />' . $language->lang('ERROR_WHO_WAS_HERE_NOT_INSTALLED'), $eb, $wb). adm_back_link(append_sid('index.' . $this->container->getParameter('core.php_ext'), 'i=acp_extensions&amp;mode=main')), E_USER_WARNING);
		}

		/**
		* And now the metadata...
		* If the Version field exists and is set then let's check the version
		*/
		$ext_name = 'lukewcs/whowashere';
		$display_name = $ext_name;
		if ($ext_manager->is_available($ext_name))
		{
			$metadata_manager = $ext_manager->create_extension_metadata_manager('lukewcs/whowashere', $this->container->get('template'));

			$metadata = $metadata_manager->get_metadata($display_name);

			$required = $metadata['version'];

			$version = false;

			if ($required && isset($required))
			{
				/*$clean_required = ($required);*/
				$clean_required = html_entity_decode($required, ENT_COMPAT | ENT_HTML401, 'utf-8');
			/**
			* The following line determines which version of the required extension must be installed at least.
			*/
				$version = phpbb_version_compare($clean_required, $wwh_ver, '>='); /*hier version der  LF-who_was_here anpassen de installiert sein muss.*/
			}

			/* Wrong VERSION? No party! */
			if ( !($version))
			{
				trigger_error(sprintf($language->lang('EXTENSION_NOT_ENABLEABLE') . '<br />' .$language->lang('ERROR_WHO_WAS_HERE_WRONG_VERSION'), $wwh_ver). adm_back_link(append_sid('index.' . $this->container->getParameter('core.php_ext'), 'i=acp_extensions&amp;mode=main')), E_USER_WARNING);

				$is_enableable = false;
			}
			return $is_enableable;
		}
	}
}
