<?php

namespace app\models;

use Yii;
use app\models\GroupsSelect;
/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string parentFIO
 * @property string $birthday
 * @property int $group_id
 * @property string $date_up
 * @property string $status
 * @property bool $active
 * @property string $phone
 * @property string $email
 * @property string $adress
 * @property int $autor
 */
class Students extends \yii\db\ActiveRecord
{
   // public $group_id;
    /**
     * {@inheritdoc}
     */

   public $group_id;
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name',  'last_name', ], 'required'],
            [['birthday', 'date_up','parentFIO','group_id'], 'safe'],
            [['birthday'], 'default', 'value' => null],
            [[ 'autor'], 'integer'],
            [['active'], 'boolean'],
            [['adress'], 'string'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 100],
            [['status', 'email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['autor'], 'default', 'value' => Yii::$app->user->id],
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);


       if(!$this->isNewRecord){
            GroupsSelect::deleteAll(['id_student'=>$this->id]);
        }

        for($i=0;$i<count($this->group_id);$i++){
            $gs=new  GroupsSelect();
            $gs->id_student=$this->id;
            $gs->id_group=$this->group_id[$i];
            $gs->save();
        }
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
            'parentFIO' => 'ФИО родителя',
            'birthday' => 'Дата рождения',
            'group_id' => 'Группа',
            'date_up' => 'Дата создания',
            'status' => 'Статус',
            'active' => 'Активность',
            'phone' => 'Телефон',
            'email' => 'Email',
            'adress' => 'Адрес',
            'autor' => 'Автор',
        ];
    }
/*    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }
*/

    public function getgroups_select()
    {
        return $this->hasMany(\app\models\GroupsSelect::className(), ['id_student' => 'id']);
    }


    public function getGroupName()
    {
        $parent =[];

        return $parent ? $parent->title : '';
    }
}
