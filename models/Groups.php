<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string $title
 * @property int $id_courses
 * @property string $description
 * @property string $status
 * @property string $date_up
 * @property bool $active
 * @property int $autor
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['id_courses', 'autor'], 'integer'],
            [['description'], 'string'],
            [['date_up'], 'safe'],
            [['active'], 'boolean'],
            [['title'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 50],
            [['autor'], 'default', 'value' => Yii::$app->user->id],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'id_courses' => 'Курс',
            'description' => 'Описание',
            'status' => 'Статус',
            'date_up' => 'Дата создания',
            'active' => 'Активность',
            'autor' => 'Автор',
        ];
    }
}
