<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblSatuan;

/**
 * TblSatuanSearch represents the model behind the search form about `\common\models\TblSatuan`.
 */
class TblSatuanSearch extends TblSatuan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_satuan'], 'integer'],
            [['nm_satuan'], 'safe'],
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
        $query = TblSatuan::find();

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
            'id_satuan' => $this->id_satuan,
        ]);

        $query->andFilterWhere(['like', 'nm_satuan', $this->nm_satuan]);

        return $dataProvider;
    }
}
