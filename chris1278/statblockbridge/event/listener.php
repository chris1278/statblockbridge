<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace chris1278\statblockbridge\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $config;
	protected $language;
	protected $template;
	protected $log;
	protected $user;

	public function __construct(
		\phpbb\extension\manager $phpbb_ext_manager,
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\log\log $log,
		\phpbb\user $user,
		\phpbb\language\language $language
	)
	{
		$this->phpbb_ext_manager	= $phpbb_ext_manager;
		$this->config				= $config;
		$this->template				= $template;
		$this->log					= $log;
		$this->user					= $user;
		$this->language 			= $language;
	}

	public static function getSubscribedEvents()
	{
		return [
			'lukewcs.whowashere.display_condition'					=> 'sbbridge_wwh2_override',
			'lukewcs.statspermissions.display_condition'			=> 'sbbridge_statsperm_override',
			'kirk.newestxusers.display_condition'					=> 'sbbridge_nxu_override',
			'core.page_header'										=> [['sbbridge_global'],['sbbridge_wwh2']],
		];
	}

	public function sbbridge_wwh2_override($event)
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere') && $this->config['sbbridge_wwh2'] == 1 && $this->phpbb_ext_manager->is_enabled('kirk/statblock'))
		{
			$event['force_api_mode'] = true;
		}
	}

	public function sbbridge_statsperm_override($event)
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions') && $this->phpbb_ext_manager->is_enabled('kirk/statblock'))
		{
			$event['force_api_mode'] = true;
		}
	}

	public function sbbridge_nxu_override($event)
	{
		if ($this->phpbb_ext_manager->is_enabled('kirk/newestxusers') && $this->phpbb_ext_manager->is_enabled('kirk/statblock'))
		{
			$event['force_api_mode'] = true;
		}
	}


	public function sbbridge_wwh2()
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere'))
		{
			$this->template->assign_vars([
				'SBBRIDGE_WWH2'							=> $this->config['sbbridge_wwh2'],

			]);
		}
	}

	public function sbbridge_global()
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions') && $this->config['sbbridge_statsperm'] == 1 && !$this->phpbb_ext_manager->is_enabled('kirk/newestxusers'))
		{
			$statspermsingel = true;
		}
		else
		{
			$statspermsingel = false;
		}

		if ($this->phpbb_ext_manager->is_enabled('kirk/newestxusers') && !$this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions'))
		{
			$nxusingel = true;
		}
		else
		{
			$nxusingel = false;
		}

		if ($this->phpbb_ext_manager->is_enabled('kirk/newestxusers') && $this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions') && $this->config['sbbridge_statsperm'] == 1)
		{
			$sbbridge_combo = true;
		}
		else
		{
			$sbbridge_combo = false;
		}

		if (!$this->phpbb_ext_manager->is_enabled('kirk/newestxusers') && !$this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions'))
		{
			$sbbridge_no_ext = true;
		}
		else
		{
			$sbbridge_no_ext = false;
		}

		if ($this->config['sbbridge_statsperm'] == 0 && $this->phpbb_ext_manager->is_enabled('kirk/statblock'))
		{
			$sbbridge_outblock = true;
		}
		else
		{
			$sbbridge_outblock = false;
		}

		$this->template->assign_vars([
			'SBBRIDGE_STATSPERM_SINGLE'					=> $statspermsingel,
			'SBBRIDGE_NXU_SINGLE'						=> $nxusingel,
			'SBBRIDGE_COMBO'							=> $sbbridge_combo,
			'SBBRIDGE_NO_EXT'							=> $sbbridge_no_ext,
			'SBBRIDGE_OUTBLOCK'							=> $sbbridge_outblock,
			'NEWEST_USER'								=> false,
			'SBBRIDGE_NEWEST_USER' 						=> $this->template->retrieve_var('NEWEST_USER'),
		]);
	}
}
