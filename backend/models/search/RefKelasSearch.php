<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RefKelas;

/**
 * RefKelasSearch represents the model behind the search form about `\common\models\RefKelas`.
 */
class RefKelasSearch extends RefKelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelas'], 'integer'],
            [['nm_kelas'], 'safe'],
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
        $query = RefKelas::find();

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
            'id_kelas' => $this->id_kelas,
        ]);

        $query->andFilterWhere(['like', 'nm_kelas', $this->nm_kelas]);

        return $dataProvider;
    }
}
