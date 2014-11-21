<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TipsClass;

/**
 * TipsClassSearch represents the model behind the search form about `backend\models\TipsClass`.
 */
class TipsClassSearch extends TipsClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'city_id', 'town_id', 'location_id', 'spot_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TipsClass::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'town_id' => $this->town_id,
            'location_id' => $this->location_id,
            'spot_id' => $this->spot_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
