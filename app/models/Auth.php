<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/29/2018
 * Time: 5:32 PM
 */

namespace app\models;

use app\library\helper\Helper;

class Auth extends \yii\db\ActiveRecord
{
    protected $userType;
    /**
     * @param $client
     * @return string
     */
    public function detectUserType($client)
    {
        $clientId = $client->getId();
        switch ($clientId) {
            case 'facebook':
                return $this->userFacebook($client->getUserAttributes());

            case 'twitter':
                return $this->userTwitter($client->getUserAttributes());

            case 'github':
                return $this->userGitHub($client->getUserAttributes());
        }
    }

    /**
     * @param $userData
     * @return bool
     */
    public function userFacebook($userData){
        $this->userType = Users::USER_TYPE_FACEBOOK;

        $user = Users::find()->where(['email' => $userData['email']])->one();
        if ($user) {
            \Yii::$app->user->login(Users::findOne($user->id));
        } else {
            // Save session attribute user from FB
            $user = $this->newUser($userData);
            \Yii::$app->user->login(Users::findOne($user->id));
        }
        return true;
    }

    /**
     * @param array $userData
     * @return bool
     */
    public function userGitHub($userData = []){
        $this->userType = Users::USER_TYPE_GITHUB;

        $user = Users::find()->where(['email' => $userData['email']])->one();
        if ($user) {
            \Yii::$app->user->login(Users::findOne($user->id));
        } else {
            // Save session attribute user from FB
            $user = $this->newUser($userData);
            \Yii::$app->user->login(Users::findOne($user->id));
        }
        return true;
    }

    /**
     * @param $userData
     * @return bool
     */
    public function userTwitter($userData){
        $this->userType = Users::USER_TYPE_TWITTER;
        $userData['login'] = $userData['screen_name'];
        $userData['avatar_url'] = $userData['profile_image_url'];

        $user = Users::find()->where(['email' => $userData['email']])->one();
        if ($user) {
            \Yii::$app->user->login(Users::findOne($user->id));
        } else {
            // Save session attribute user from FB
            $user = $this->newUser($userData);
            \Yii::$app->user->login(Users::findOne($user->id));
        }

        return true;
    }

    /**
     * @param $userData
     * @return Users
     */
    public function newUser($userData){
        $model = new Users();
        $model->username = Helper::_isset($userData['login'], $userData['email']);
        $model->email = $userData['email'];
        $model->generateAuthKey();
        $model->password = '123456';
        $model->name = Helper::_isset($userData['name']);
        $model->avatar_url = Helper::_isset($userData['avatar_url']);
        $model->attributes = json_encode($userData);
        $model->type = $this->userType;
        $model->save();

        return $model;
    }
}