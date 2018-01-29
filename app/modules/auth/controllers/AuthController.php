<?php

namespace app\modules\auth\controllers;

use app\modules\admin\controllers\AdminController;
use Yii;
use app\models\AuthRule;
use app\models\search\AuthRule as AuthRuleSearch;
use yii\authclient\AuthAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthRuleController implements the CRUD actions for AuthRule model.
 */
class AuthController extends \yii\base\Controller
{
    public function actions()
    {
        return [
            [
                'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback']
            ]
        ];
    }

    /**
     * @param OAuth2 $client
     */
    public function successCallback($client)
    {

        $attributes = $client->getUserAttributes();
    }

    public function actionAuth(){
    }
}
