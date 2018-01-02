<?php
/**
 *
 */

namespace app\library\helper;

use Yii;

/**
 * Class Helper
 * @package app\library\helper
 */
class Helper
{
	public function init()
	{

	}

	/**
	 * @return string
	 */
	public static function siteURL($domainNameOnly = false)
	{
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
			$_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$domainName = $_SERVER['HTTP_HOST'];
		if($domainNameOnly){
			return $domainName;
		}
		return $protocol . $domainName;
	}
}
