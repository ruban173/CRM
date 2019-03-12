<?php

namespace app\models;

class User extends Users implements \yii\web\IdentityInterface
{

    public static function findIdentity($id)
    {
        $user=self::findOne(['id'=>$id]);
        return isset( $user) ?$user : null;
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {

    }


    public static function findByUsername($username)
    {
        $user=self::findOne(['login'=>$username]);
        return isset( $user) ?$user : null;
    }



    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {

    }


    public function validateAuthKey($authKey)
    {

    }
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

}