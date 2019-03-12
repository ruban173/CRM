<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups_select".
 *
 * @property int $id_student
 * @property int $id_group
 */
class GroupsSelect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups_select';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_student', 'id_group'], 'required'],
            [['id_student', 'id_group'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_student' => 'Id Student',
            'id_group' => 'Id Group',
        ];
    }
}
