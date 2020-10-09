<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaSoal;

/**
 * TaSoalSearch represents the model behind the search form about `\common\models\TaSoal`.
 */
class TaSoalSearch extends TaSoal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_soal', 'id_sub_bab', 'no_soal'], 'integer'],
            [['soal', 'pil_a', 'pil_b', 'pil_c', 'pil_d', 'kunci','indikator', 'kompetensi_dasar'], 'safe'],
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
        $query = TaSoal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_soal' => $this->id_soal,
            'id_sub_bab' => $this->id_sub_bab,
        ]);

        $query->andFilterWhere(['like', 'soal', $this->soal])
            ->andFilterWhere(['like', 'pil_a', $this->pil_a])
            ->andFilterWhere(['like', 'pil_b', $this->pil_b])
            ->andFilterWhere(['like', 'pil_c', $this->pil_c])
            ->andFilterWhere(['like', 'pil_d', $this->pil_d])
            ->andFilterWhere(['like', 'kunci', $this->kunci]);

        return $dataProvider;
    }
}
