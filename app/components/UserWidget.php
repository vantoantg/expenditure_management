<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 2/6/2018
 * Time: 6:23 PM
 */
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class UserWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Welcome User';
        } else {
            $this->message = 'Welcome ' . $this->message;
        }
    }


    public static function register(){
        // Todo: form register user
    }
}