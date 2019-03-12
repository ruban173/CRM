<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Students;
use app\models\GroupsSelect;
use yii\helpers\ArrayHelper;

/**
 * StudentsSearch represents the model behind the search form of `app\models\Students`.
 */
class StudentsSearch extends Students
{
    public $fullName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_id', 'autor'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'birthday', 'date_up', 'status', 'phone', 'email', 'adress'], 'safe'],
            [['active'], 'boolean'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Students::find()->with('groups_select')->where(['students.active'=>true]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => false,
                //'pageParam' => 'page',
                'validatePage' => false,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([

            'id' => $this->id,
            'birthday' => $this->birthday,
             //'id_group' => $this->group_id,

            'date_up' => $this->date_up,
            'active' => $this->active,
            'autor' => $this->autor,
        ]);

        $sql='SELECT * FROM `students` WHERE `active`=TRUE AND id IN ( SELECT id_student from groups_select WHERE id_group=:id_group)';
        $students  =\app\models\Students::findBySql($sql, [
            ':id_group' => $this->group_id
        ])->all();

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'adress', $this->adress])
             ->andFilterWhere(['in', 'id', $students ]) ;
        return $dataProvider;
    }




}
