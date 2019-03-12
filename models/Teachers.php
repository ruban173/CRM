<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $date_up
 * @property string $status
 * @property bool $active
 * @property int $autor
 */
class Teachers extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'middle_name', 'last_name' ], 'required'],
            [['active'], 'boolean'],
            [['autor'], 'default', 'value' => Yii::$app->user->id],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'last_name' => 'Фамилия',
            'date_up' => 'Дата создания',
            'status' => 'Статус',
            'active' => 'Активность',
            'autor' => 'Автор',
            'fio' => 'Ф.И.О',
        ];
    }
}
