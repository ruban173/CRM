<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentsPayment;

/**
 * StudentsPaymentSearch represents the model behind the search form of `app\models\StudentsPayment`.
 */
class StudentsPaymentSearch extends StudentsPayment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'count'], 'integer'],
            [['price'], 'number'],
            [['date_up', 'type', 'date','id_group','id_course','id_student'], 'safe'],
            [['status', 'active'], 'boolean'],
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
        $query = StudentsPayment::find()->where(['active'=>true]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => false,
                //'pageParam' => 'page',
               
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
            'id_student' => $this->id_student,
            'price' => $this->price,
            'date_up' => $this->date_up,
            'count' => $this->count,
            'status' => $this->status,
            'date' => $this->date,
            'active' => $this->active,
            'id_group' => $this->id_group,
            'id_course' => $this->id_course,

        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'id_student', $this->id_student])
            ->andFilterWhere(['like', 'id_group', $this->id_group])
            ->andFilterWhere(['like', 'id_course', $this->id_course])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
