<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $authKey
 * @property string $accessToken
 * @property string $date_up
 * @property bool $active
 * @property string $status
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'login', 'password'], 'required'],
            [['login', 'password', 'authKey', 'accessToken'], 'string', 'max' => 64],
            [['first_name', 'middle_name', 'last_name', 'email', 'phone', 'status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'date_up' => 'Date Up',
            'active' => 'Active',
            'status' => 'Status',
        ];
    }
}
