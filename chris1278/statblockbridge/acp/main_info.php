<?php
/**
*
* @package phpBB EExtension bridge for “Statistics Block”
* @copyright (c) 2022 (Christian-Esch.de)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace chris1278\statblockbridge\acp;

class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\chris1278\statblockbridge\acp\main_module',
			'title'		=> 'SBBRIDGE_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'SETTINGS',
					'auth'	=> 'ext_chris1278/statblockbridge',
					'cat'	=> ['SBBRIDGE_TITLE'],
				],
			],
		];
	}
}
