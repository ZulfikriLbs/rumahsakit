<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaSubBab;

/**
 * TaSubBabSearch represents the model behind the search form about `\common\models\TaSubBab`.
 */
class TaSubBabSearch extends TaSubBab
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sub_bab', 'id_bab'], 'integer'],
            [['kd_bab', 'judul', 'deskripsi'], 'safe'],
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
        $query = TaSubBab::find();

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
            'id_sub_bab' => $this->id_sub_bab,
            'id_bab' => $this->id_bab,
        ]);

        $query->andFilterWhere(['like', 'kd_bab', $this->kd_bab])
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
