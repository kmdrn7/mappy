<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bangunan;

/**
 * BangunanSearch represents the model behind the search form of `app\models\Bangunan`.
 */
class BangunanSearch extends Bangunan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bangunan'], 'integer'],
            [['bangunan', 'deskripsi', 'gambar', 'created_at', 'updated_at'], 'safe'],
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
        $query = Bangunan::find();

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
            'id_bangunan' => $this->id_bangunan,
            'lat' => $this->lat,
            'long' => $this->long,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'bangunan', $this->bangunan])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
