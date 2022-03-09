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
			'core.page_header'							=> [['sbbridge_wwh2'],['sbbridge_statsperm']],
		];
	}

	public function override($event)
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere') && $this->config['sbbridge_wwh2'] == 1)
		{
			$event['force_api_mode'] = true;
		}
	}

	public function sbbridge_wwh2()
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/whowashere'))
		{
			$sbbridge_wwh2						= $this->config['sbbridge_wwh2'];
		}

		$this->template->assign_vars([
			'SBBRIDGE_WWH2'						=> $sbbridge_wwh2,
		]);
	}

	public function sbbridge_statsperm()
	{
		if ($this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions') && $this->config['sbbridge_statsperm'] == 1 )
		{
			$this->template->assign_vars([
				'SBBRIDGE_STATSPERM'				=> true,
			]);

		}
		else if ($this->phpbb_ext_manager->is_enabled('lukewcs/statspermissions') && $this->config['sbbridge_statsperm'] == 0 ||
				 $this->phpbb_ext_manager->is_disabled('lukewcs/statspermissions') && $this->config['sbbridge_statsperm'] == 1 ||
				 $this->phpbb_ext_manager->is_disabled('lukewcs/statspermissions') && $this->config['sbbridge_statsperm'] == 0)
		{
			$this->template->assign_vars([
				'SBBRIDGE_STATSPERM'				=> false,
				'SBBRIDGE_NEWEST'					=> $this->template->retrieve_var('NEWEST_USER'),
				'NEWEST_USER'						=> false,
			]);
		}
	}

}
