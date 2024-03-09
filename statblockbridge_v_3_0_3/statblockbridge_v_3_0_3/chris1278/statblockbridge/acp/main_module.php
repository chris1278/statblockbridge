<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace chris1278\statblockbridge\acp;

class main_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main()
	{
		global $phpbb_container;

		$this->tpl_name = 'acp_statblockbridge_body';

		$acp_controller = $phpbb_container->get('chris1278.statblockbridge.controller.acp');

		$language = $phpbb_container->get('language');

		$this->page_title = $language->lang('SBBRIDGE_TITLE');

		$acp_controller->set_page_url($this->u_action);

		$acp_controller->display_options();
	}
}
