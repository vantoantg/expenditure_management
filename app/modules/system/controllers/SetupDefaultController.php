<?php

namespace app\modules\system\controllers;

use yii\web\Controller;

/**
 * Default controller for the `system` module
 */
class SetupDefaultController extends Controller
{
    public function init()
    {
        parent::init();
        $this->layout = 'setup';
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $pathRoot = \Yii::$app->getBasePath();
        $pathAssets = $pathRoot . '/assets';
        if (chmod($pathAssets, 0777)) {
            echo "Changed $pathAssets to CHMOD 0777";
        } else {
            echo "Couldn't do it.";
        }
//        return $this->goHome();
    }
}
