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

	public function __construct(
		\phpbb\extension\manager $phpbb_ext_manager,
		\phpbb\config\config $config,
		\phpbb\template\template $template
	)
	{
		$this->phpbb_ext_manager	= $phpbb_ext_manager;
		$this->config				= $config;
		$this->template				= $template;
	}

	public static function getSubscribedEvents()
	{
		return [
			'lukewcs.whowashere.display_condition'		=> 'override',
			'core.page_header'							=> [['lf_wwh2'],['lf_statsperm']],
		];
	}

	public function override($event)
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere'))
		{
			$event['force_api_mode'] = true;
		}
	}

	public function lf_wwh2()
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere'))
		{
			$lf_wwh2_active						= $this->config['lf_wwh2_active'];
		}
		else if ($this->phpbb_ext_manager->is_disabled('lukewcs/whowashere'))
		{
			$lf_wwh2_active						= false;
		}
		else
		{
			$lf_wwh2_active						= false;
		}
		$this->template->assign_vars([
			'LF_WWH2_ACTIVE'				=> $lf_wwh2_active,
		]);
	}

	public function lf_statsperm()
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions'))
		{
			$lf_statsperm_active				= $this->config['lf_statsperm_active'];
		}
		else if ($this->phpbb_ext_manager->is_disabled('lukewcs/statspermissions'))
		{
			$lf_statsperm_active				= false;
		}
		else
		{
			$lf_statsperm_active				= false;
		}

		$this->template->assign_vars([
				'LF_STATSPERM_ACTIVE'				=> $lf_statsperm_active,
		]);
	}
}
