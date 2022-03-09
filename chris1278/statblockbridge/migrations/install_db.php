<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace chris1278\statblockbridge\migrations;

class install_db extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\chris1278\statblockbridge\migrations\acp_module'];
	}

	public function update_data()
	{
		return
		[
			['config.add', ['sbbridge_wwh2', 0]],
			['config.add', ['sbbridge_statsperm', 0]],
		];
	}
}
