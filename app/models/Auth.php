<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/29/2018
 * Time: 5:32 PM
 */

namespace app\models;


class Auth extends \yii\db\ActiveRecord
{

    /**
     * @param $client
     */
    public static function detectUserType($client)
    {
        $clientId = $client->getId();
        switch ($clientId) {
            case 'github':
                self::userGitHub($clientId->getUserAttributes());
        }
    }

    public static function userGitHub($userData = []){
        $user = Users::find()->where(['username' => $userData['email']])->one();
        if (!empty($user)) {
            \Yii::$app->user->login($user);
        } else {
            // Save session attribute user from FB
            $session = Yii::$app->session;
            $session['attributes'] = $userData;
            // redirect to form signup, variabel global set to successUrl
//            $this->successUrl = \yii\helpers\Url::to(['signup']);
        }
    }
}