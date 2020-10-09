<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RefBab;

/**
 * RefBabSearch represents the model behind the search form about `\backend\models\RefBab`.
 */
class RefBabSearch extends RefBab
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bab', 'id_kelas', 'kd_bab'], 'integer'],
            [['judul','deskripsi'], 'safe'],
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
        $query = RefBab::find();

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
            'id_bab' => $this->id_bab,
            'id_kelas' => $this->id_kelas,
            'kd_bab' => $this->kd_bab,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul]);
        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
