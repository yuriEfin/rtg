<?php

namespace backend\models\hotel\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\hotel\Order;

/**
 * OrderSearch represents the model behind the search form of `backend\models\hotel\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'room_id', 'phone'], 'integer'],
            [['username', 'booked_date_from', 'booked_date_to', 'created_at', 'updated_at'], 'safe'],
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
        $query = Order::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'room_id' => $this->room_id,
            'phone' => $this->phone,
            'booked_date_from' => $this->booked_date_from,
            'booked_date_to' => $this->booked_date_to,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
