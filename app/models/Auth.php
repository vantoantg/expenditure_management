<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/29/2018
 * Time: 5:32 PM
 */

namespace app\models;


use app\models\base\User;
use Carbon\Carbon;
use yii\helpers\Url;

class Auth extends \yii\db\ActiveRecord
{
    /**
     * @param $client
     * @return string
     */
    public static function detectUserType($client)
    {
        echo '<pre>';
        print_r($client);
        echo '</pre>';
        die;
        $clientId = $client->getId();
        switch ($clientId) {
            case 'github':
                return self::userGitHub($client->getUserAttributes());
        }
    }

    /**
     * @param array $userData
     * @return string
     */
    public static function userGitHub($userData = []){
        $user = Users::find()->where(['email' => $userData['email']])->one();
        if ($user) {
            \Yii::$app->user->login(Users::findOne($user->id));
        } else {
            // Save session attribute user from FB
            $user = self::newUser($userData);
            \Yii::$app->user->login(Users::findOne($user->id));
        }
        return Url::to(['/']);
    }

    /**
     * @param $userData
     * @return Users
     */
    public static function newUser($userData){
        $model = new Users();
        $model->username = $userData['login'];
        $model->email = $userData['email'];
        $model->generateAuthKey();
        $model->password = '123456';
        $model->name = $userData['name'];
        $model->avatar_url = $userData['avatar_url'];
        $model->attributes = json_encode($userData);
        $model->type = Users::USER_TYPE_GITHUB;
        $model->save();

        return $model;
    }
}