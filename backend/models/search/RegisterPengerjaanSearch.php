<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TaRegisterPengerjaan;
use common\models\TaRegisterPengerjaanRincian;
use common\models\TaSoal;

/**
 * RegisterPengerjaanSearch represents the model behind the search form about `\common\models\TaRegisterPengerjaan`.
 */
class RegisterPengerjaanSearch extends TaRegisterPengerjaan
{
   
    public const GURU = 'guru';
    public const MURID = 'murid';

    public $id_soal;
     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_register', 'id_user', 'waktu_dimulai', 'waktu_selesai', 'id_soal'], 'integer'],
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
    public function search($params, $role = RegisterPengerjaanSearch::MURID)
    {
        if ($role === RegisterPengerjaanSearch::GURU){
            $query = TaRegisterPengerjaanRincian::find();
            $query->innerJoinWith(['soal', 'register']);
            $query->where('kunci <> jawaban');
        }else{
            $query = TaRegisterPengerjaan::find();
        }

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
            'id_register' => $this->id_register,
            'id_user' => $this->id_user,
            'waktu_dimulai' => $this->waktu_dimulai,
            'waktu_selesai' => $this->waktu_selesai,
        ]);

        return $dataProvider;
    }
}
