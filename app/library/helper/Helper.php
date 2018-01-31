<?php
/**
 *
 */

namespace app\library\helper;

use Yii;
use yii\helpers\Url;
use \yii\web\Response;

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
     * @param $data
     * @param string $return
     * @return string
     */
	public static function _isset($data, $return = null){
	    return isset($data) ? $data : $return;
    }
	/**
	 * @param array $data
	 * @return array
	 */
	public static function jsonData($data = [])
	{
		Yii::$app->response->format = Response::FORMAT_JSON;
		if(!$data){
			return ['data' => null];
		}else{
			return $data;
		}
	}

    /**
     * @return string
     */
	public static function homeUrl(){
	    return Yii::$app->getHomeUrl();
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
