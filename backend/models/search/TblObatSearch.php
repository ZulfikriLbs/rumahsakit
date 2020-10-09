<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblObat;

/**
 * TblObatSearch represents the model behind the search form about `\common\models\TblObat`.
 */
class TblObatSearch extends TblObat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_obat'], 'integer'],
            [['nm_obat', 'merk', 'nm_pabrikan', 'satuan'], 'safe'],
            [['harga'], 'number'],
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
        $query = TblObat::find();

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
            'id_obat' => $this->id_obat,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'nm_obat', $this->nm_obat])
            ->andFilterWhere(['like', 'merk', $this->merk])
            ->andFilterWhere(['like', 'nm_pabrikan', $this->nm_pabrikan])
            ->andFilterWhere(['like', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
