<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TeachersCourses;

/**
 * TeachersCoursesSearch represents the model behind the search form of `app\models\TeachersCourses`.
 */
class TeachersCoursesSearch extends TeachersCourses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_teachers', 'id_courses', 'price', 'autor'], 'integer'],
            [['date_up'], 'safe'],
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
        $query = TeachersCourses::find()->where(['teachers_courses.active'=>true]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('teachers','courses');
        $dataProvider->sort->attributes['category'] = [
            'asc' => ['teachers.name' => SORT_ASC],
            'desc' => ['courses.id' => SORT_DESC],
        ];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_teachers' => $this->id_teachers,
            'id_group' => $this->id_group,
            'id_courses' => $this->id_courses,
            'price' => $this->price,
            'date_up' => $this->date_up,
            'autor' => $this->autor,
            'active' => $this->active,

        ]);

        return $dataProvider;
    }
}
