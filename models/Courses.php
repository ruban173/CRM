<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property bool $active
 * @property string $date_up
 * @property int $autor
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['active'], 'boolean'],
           /* [['date_up'], 'safe'],*/
            [['autor'], 'default', 'value' => Yii::$app->user->id],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Название',
            'description' => 'Описание',
            'status' => 'Статус',
            'active' => 'Активность',
            'date_up' => 'Дата создания',
            'autor' => 'Автор',
        ];
    }
}
