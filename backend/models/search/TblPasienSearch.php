<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblPasien;

/**
 * TblPasienSearch represents the model behind the search form about `\common\models\TblPasien`.
 */
class TblPasienSearch extends TblPasien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_rekam_medik', 'nm_pasien', 'jns_kelamin', 'alamat', 'no_ktp', 'cara_bayar', 'no_bpjs', 'no_registrasi', 'tgl_registrasi'], 'safe'],
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
        $query = TblPasien::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->tgl_registrasi){
            $dateAwal = date('Y').'-'.$this->tgl_registrasi.'-'.'01';
            $dateAkhir = date('Y-m-t',strtotime($dateAwal));
            $query->andFilterWhere(['between', 'tgl_registrasi', $dateAwal, $dateAkhir]);
        }

        $query->andFilterWhere(['like', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['like', 'nm_pasien', $this->nm_pasien])
            ->andFilterWhere(['like', 'jns_kelamin', $this->jns_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'cara_bayar', $this->cara_bayar])
            ->andFilterWhere(['like', 'no_bpjs', $this->no_bpjs])
            ->andFilterWhere(['like', 'no_registrasi', $this->no_registrasi]);

        return $dataProvider;
    }
}
