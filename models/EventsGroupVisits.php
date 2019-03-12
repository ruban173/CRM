<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventsGroupVisits".
 *
 * @property int $id
 * @property int $group_id
 * @property string $description
 * @property string $date
 * @property string $color
 * @property string $time
 * @property string $date_up
 * @property string $status
 * @property bool $active
 * @property int $autor
 *
 * @property Groups $group
 */
class EventsGroupVisits extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public $active = true;
    public $student_list = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eventsGroupVisits';
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);


        if(!$this->isNewRecord){
            \app\models\StudentsVisits::deleteAll(['events_id'=>$this->id]);
        }

        $list=Yii::$app->request->post('EventsGroupVisits');
        $student_list =  $list['student_list'];
        $absence = (isset($list['absence']))?$list['absence']:null ;

        $sql='SELECT * FROM `students` WHERE `active`=TRUE AND id IN ( SELECT id_student from groups_select WHERE id_group=:id_group)';
        $students  =\app\models\Students::findBySql($sql, [
            ':id_group' => $this->group_id
        ])->all();

        foreach ($students as $student) {
            $visits = new StudentsVisits();
            $visits->events_id = $this->id;
            $visits->student_id = $student->id;
            $visits->status = (is_array($student_list)&& in_array($student->id, $student_list)) ? true : false;

            $visits->absence=(!$visits->status)?
                ( $absence!=null )?  ( in_array($student->id,$absence))?'неуваж':'уваж':'уваж':null;

            $visits->save();

        }
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'date', 'time'], 'required'],
            [['group_id', 'autor'], 'integer'],

            [['active'], 'boolean'],
            [['description'], 'string', 'max' => 250],
            [['status'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 50],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
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
            'group_id' => 'Группа',
            'description' => 'Описание',
            'date' => 'Дата',
            'time' => 'Время',
            'date_up' => 'Дата создания',
            'status' => 'Статус',
            'active' => 'Активность',
            'autor' => 'Автор',
            'student_list' => 'Студенты',
            'color' => 'Цвет карточки',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
  public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

}
