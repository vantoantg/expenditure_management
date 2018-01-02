<?php
/**
 *
 */
namespace app\assets\admin;

use yii\web\AssetBundle;

/**
 * Class AppAssetLogin
 * @package app\assets\admin
 */
class AppAssetLogin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/bower/animate.css/animate.min.css',
        'web/build/css/custom.min.css',
        'web/css/login.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
