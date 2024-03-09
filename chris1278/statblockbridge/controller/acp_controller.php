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
		$lang_ver 					= ($this->language->lang('SBBRIDGE_LANG_EXT_VER') !== 'SBBRIDGE_LANG_EXT_VER') ? $this->language->lang('SBBRIDGE_LANG_EXT_VER') : '0.0.0';
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
				$this->config->set('sbbridge_wwh2', $this->request->variable('sbbridge_wwh2', 0));
				$this->config->set('sbbridge_statsperm', $this->request->variable('sbbridge_statsperm', 0));
				trigger_error($this->language->lang('SBBRIDGE_SETTING_SAVED') . adm_back_link($this->u_action));
			}
		}

		$s_errors = !empty($errors);

		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere'))
		{
			$sbbridge_wwh2							= true;
			$sbbridge_wwh2_text						= '';
		}
		else if ($this->phpbb_ext_manager->is_disabled('lukewcs/whowashere'))
		{
			$sbbridge_wwh2							= false;
			$sbbridge_wwh2_text						= sprintf($this->language->lang('SBBRIDGE_DEACTIVATED'));
		}
		else
		{
			$sbbridge_wwh2							= false;
			$sbbridge_wwh2_text						= sprintf($this->language->lang('SBBRIDGE_DEINSTALLED'));
		}

		if ($this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions'))
		{
			$sbbridge_statsperm						= true;
			$sbbridge_statsperm_text				= '';
		}
		else if ($this->phpbb_ext_manager->is_disabled('lukewcs/statspermissions'))
		{
			$sbbridge_statsperm						= false;
			$sbbridge_statsperm_text				= sprintf($this->language->lang('SBBRIDGE_DEACTIVATED'));
		}
		else
		{
			$sbbridge_statsperm						= false;
			$sbbridge_statsperm_text				= sprintf($this->language->lang('SBBRIDGE_DEINSTALLED'));
		}

		if (!phpbb_version_compare($lang_ver, $ext_lang_min_ver, '>='))
		{
			$this->add_note($notes, $this->language->lang('SBBRIDGE_LANGUAGEPACK_OUTDATED'));
		}

		if (!$this->phpbb_ext_manager->is_enabled('kirk/statblock'))
		{
			$sbbridge_statblockinfo	= $this->language->lang('SBBRIDGE_STATBLOCK_NOT_ACTIVATED');
		}
		else
		{
			$sbbridge_statblockinfo	= '';
		}

		$this->template->assign_vars([
			'SBBRIDGE_S_ERROR'				=> $s_errors,
			'SBBRIDGE_ERROR_MSG'			=> $s_errors ? implode('<br>', $errors) : '',
			'SBBRIDGE_NOTES'				=> $notes,
			'SBBRIDGE_STATBLOCKINFO'		=> $sbbridge_statblockinfo,
			'SBBRIDGE_EXT_NAME'				=> $ext_display_name,
			'SBBRIDGE_EXT_VER'				=> $ext_display_ver,
			'SBBRIDGE_WWH2_CHANGE'			=> $sbbridge_wwh2,
			'SBBRIDGE_WWH2_NOT'				=> $sbbridge_wwh2_text,
			'SBBRIDGE_WWH2'					=> (bool) $this->config['sbbridge_wwh2'],
			'SBBRIDGE_STATSPERM_CHANGE'		=> $sbbridge_statsperm,
			'SBBRIDGE_STATSPERM_NOT'		=> $sbbridge_statsperm_text,
			'SBBRIDGE_STATSPERM'			=> (bool) $this->config['sbbridge_statsperm'],
			'U_ACTION'						=> $this->u_action,
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
