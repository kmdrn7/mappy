<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ruangan;

/**
 * RuanganSearch represents the model behind the search form of `backend\models\Ruangan`.
 */
class RuanganSearch extends Ruangan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ruangan', 'id_bangunan'], 'integer'],
            [['ruangan', 'deskripsi', 'created_at', 'updated_at'], 'safe'],
            [['lat', 'long'], 'number'],
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
        $query = Ruangan::find();

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
            'id_ruangan' => $this->id_ruangan,
            'id_bangunan' => $this->id_bangunan,
            'lat' => $this->lat,
            'long' => $this->long,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ruangan', $this->ruangan])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
