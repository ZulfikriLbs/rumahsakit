<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaPembahasan;

/**
 * TaPembahasanSearch represents the model behind the search form about `\common\models\TaPembahasan`.
 */
class TaPembahasanSearch extends TaPembahasan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pembahasan', 'id_soal'], 'integer'],
            [['judul_video', 'pembahasan'], 'safe'],
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
        $query = TaPembahasan::find();

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
            'id_pembahasan' => $this->id_pembahasan,
            'id_soal' => $this->id_soal,
        ]);

        $query->andFilterWhere(['like', 'judul_video', $this->judul_video])
            ->andFilterWhere(['like', 'pembahasan', $this->pembahasan]);

        return $dataProvider;
    }
}
