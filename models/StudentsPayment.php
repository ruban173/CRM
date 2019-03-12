<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students_payment".
 *
 * @property int $id
 * @property int $id_course
 * @property int $id_group
 * @property int $id_student
 * @property string $price
 * @property string $date_up
 * @property int $count
 * @property string $type
 * @property bool $status
 * @property string $date
 * @property bool $active
 */
class StudentsPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_course', 'id_group', 'id_student', 'price'], 'required'],
            [['id_course', 'id_group', 'id_student', 'count'], 'integer'],
            [['price'], 'number'],
            [['date_up', 'date'], 'safe'],
            [['status', 'active'], 'boolean'],
            [['type'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_course' => 'Курс',
            'id_group' => 'Группа',
            'id_student' => 'Студент',
            'price' => 'Цена',
            'date_up' => 'Дата обновления',
            'count' => 'Кол-во занятий',
            'type' => 'Вид оплаты',
            'status' => 'Оплачено',
            'date' => 'Дата оплаты',
            'active' => 'Активность',
        ];
    }

    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'id_group']);
    }
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'id_course']);
    }
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'id_student']);
    }
}
