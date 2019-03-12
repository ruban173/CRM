<?php

namespace app\models;

use Yii;
use app\models\EventsGroupVisits;
/**
 * This is the model class for table "students_visits".
 *
 * @property int $id
 * @property int $events_id
 * @property int $student_id
 * @property bool $status
 * @property string $date_up
 *
 * @property Students $students
 * @property Students $student
 */
class StudentsVisits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students_visits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['events_id', 'student_id'], 'integer'],
            [['status'], 'boolean'],
            [['date_up','absence'], 'safe'],
            [['absence'], 'string'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'events_id' => 'Events ID',
            'student_id' => 'Student ID',
            'status' => 'Status',
            'date_up' => 'Date Up',
            'absence'=> 'Прогул',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }
    public function getEventsGroupVisits()
    {
        return $this->hasOne(eventsGroupVisits::className(), ['id' => 'events_id']);
    }

}
