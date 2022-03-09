<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace chris1278\statblockbridge\migrations;

class acp_module extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v320\v320'];
	}

	public function update_data()
	{
		return [
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'SBBRIDGE_TITLE'
			]],
			['module.add', [
				'acp',
				'SBBRIDGE_TITLE',
				[
					'module_basename'	=> '\chris1278\statblockbridge\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
