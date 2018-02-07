<?php

namespace app\modules\front\controllers;

use app\forms\LoginForm;
use app\library\helper\Helper;


/**
 * Default controller for the `front` module
 */
class UserController extends FrontController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return array|\yii\web\Response
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            if (\Yii::$app->request->isAjax) {
                return Helper::jsonData(['error' => true, 'message' => $model->errors['password'][0]]);
            }
        }
    }
}
