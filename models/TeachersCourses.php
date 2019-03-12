<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers_courses".
 *
 * @property int $id
 * @property int $id_teachers
 * @property int $id_courses
 * @property int $id_group
 * @property int $price
 * @property string $date_up
 * @property int $autor
 * @property bool $active
 *
 * @property Courses $courses
 * @property Teachers $teachers
 * @property Users $autor0
 */
class TeachersCourses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public  $group_param;
    public static function tableName()
    {
        return 'teachers_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_teachers', 'id_courses', 'id_group'], 'required'],
            [['id_teachers', 'id_courses', 'id_group', 'price', 'autor'], 'integer'],
            [['date_up'], 'safe'],
            [['active'], 'boolean'],
            [['id_courses'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['id_courses' => 'id']],
            [['id_teachers'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['id_teachers' => 'id']],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['autor' => 'id']],
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
            'id_teachers' => 'Преподаватель',
            'id_courses' => 'Курс',
            'id_group' => 'Группа',
            'price' => 'Оплата',
            'date_up' => 'Дата создания',
            'autor' => 'Автор',
            'active' => 'Активность',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasOne(Courses::className(), ['id' => 'id_courses']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'id_teachers']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0()
    {
        return $this->hasOne(Users::className(), ['id' => 'autor']);
    }
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'id_group']);
    }


}
