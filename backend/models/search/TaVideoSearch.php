<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaVideo;

/**
 * TaVideoSearch represents the model behind the search form about `\common\models\TaVideo`.
 */
class TaVideoSearch extends TaVideo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_video', 'id_sub_bab', 'created_at', 'updated_at'], 'integer'],
            [['judul', 'deskripsi', 'hashcode', 'link'], 'safe'],
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
        $query = TaVideo::find();

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
            'id_video' => $this->id_video,
            'id_sub_bab' => $this->id_sub_bab,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'hashcode', $this->hashcode])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
