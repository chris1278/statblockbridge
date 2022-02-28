<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace chris1278\statblockbridge\controller;

class acp_controller
{

	protected $extension_manager;
	protected $config;
	protected $language;
	protected $request;
	protected $template;
	protected $user;
	protected $u_action;

	public function __construct(
		\phpbb\extension\manager $ext_manager,
		\phpbb\config\config $config,
		\phpbb\language\language $language,
		\phpbb\request\request $request,
		\phpbb\template\template $template,
		\phpbb\user $user

	)
	{
		$this->md_manager 			= $ext_manager->create_extension_metadata_manager('chris1278/statblockbridge');
		$this->phpbb_ext_manager 	= $ext_manager;
		$this->config				= $config;
		$this->language				= $language;
		$this->request				= $request;
		$this->template				= $template;
		$this->user					= $user;
	}

	public function display_options()
	{
		$ext_display_ver 			= $this->md_manager->get_metadata('version');
		$ext_lang_min_ver 			= $this->md_manager->get_metadata()['extra']['lang-min-ver'];
		$ext_display_name 			= $this->md_manager->get_metadata('display-name');
		$ext_display_ver 			= $this->md_manager->get_metadata('version');
		$lang_ver 					= ($this->language->lang('STATBLOCKBRIDGE_LANG_EXT_VER') !== 'STATBLOCKBRIDGE_LANG_EXT_VER') ? $this->language->lang('STATBLOCKBRIDGE_LANG_EXT_VER') : '0.0.0';
		$this->language->add_lang('acp_statblockbridge', 'chris1278/statblockbridge');
		$notes 						= '';
		add_form_key('chris1278_statblockbridge_acp');

		$errors = [];

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('chris1278_statblockbridge_acp'))
			{
				$errors[] = $this->language->lang('FORM_INVALID');
			}
			if (empty($errors))
			{
				$this->config->set('lf_wwh2_active', $this->request->variable('lf_wwh2_active', 0));
				$this->config->set('lf_statsperm_active', $this->request->variable('lf_statsperm_active', 0));
				trigger_error($this->language->lang('ACP_STATSPERM_SETTING_SAVED') . adm_back_link($this->u_action));
			}
		}

		$s_errors = !empty($errors);

		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere'))
		{
			$lf_wwh2_active						= true;
			$lf_wwh2_text						= '';
		}
		else if ($this->phpbb_ext_manager->is_disabled('lukewcs/whowashere'))
		{
			$lf_wwh2_active						= false;
			$lf_wwh2_text						= sprintf($this->language->lang('LF_DEACTIVATED'));
		}
		else
		{
			$lf_wwh2_active						= false;
			$lf_wwh2_text						= sprintf($this->language->lang('LF_DEINSTALLED'));
		}

		if ($this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions'))
		{
			$lf_statsperm_active				= true;
			$lf_statsperm_text					= '';
		}
		else if ($this->phpbb_ext_manager->is_disabled('lukewcs/statspermissions'))
		{
			$lf_statsperm_active				= false;
			$lf_statsperm_text					= sprintf($this->language->lang('LF_DEACTIVATED'));
		}
		else
		{
			$lf_statsperm_active					= false;
			$lf_statsperm_text						= sprintf($this->language->lang('LF_DEINSTALLED'));
		}

		if (!phpbb_version_compare($lang_ver, $ext_lang_min_ver, '>='))
		{
			$this->add_note($notes, $this->language->lang('STATBLOCKBRIDGE_LANGUAGEPACK_OUTDATED'));
		}

		$this->template->assign_vars([
			'S_ERROR'					=> $s_errors,
			'ERROR_MSG'					=> $s_errors ? implode('<br />', $errors) : '',
			'STATBLOCKBRIDGE_NOTES'		=> $notes,
			'STATBLOCKBRIDGE_EXT_NAME'	=> $ext_display_name,
			'STATBLOCKBRIDGE_EXT_VER'	=> $ext_display_ver,
			'U_ACTION'					=> $this->u_action,
			'LW_WWH2_CHANGE'			=> $lf_wwh2_active,
			'LF_WWH2_NOT_ACTIVE'		=> $lf_wwh2_text,
			'LF_WWH2_ACTIVE'			=> (bool) $this->config['lf_wwh2_active'],
			'LW_STATSPERM_CHANGE'		=> $lf_statsperm_active,
			'LF_STATSPERM_NOT_ACTIVE'	=> $lf_statsperm_text,
			'LF_STATSPERM_ACTIVE'		=> (bool) $this->config['lf_statsperm_active'],
		]);
	}

	private function add_note(string &$notes, $msg)
	{
		$notes .= (($notes != '') ? "\n" : "") . sprintf('<p>%s</p>', $msg);

	}

	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
