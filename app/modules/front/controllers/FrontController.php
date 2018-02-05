<?php

namespace app\modules\front\controllers;

use yii\web\Controller;

/**
 * Default controller for the `front` module
 */
class FrontController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}