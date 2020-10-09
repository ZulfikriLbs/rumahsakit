<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblTransaksi;

/**
 * TblTransaksiSearch represents the model behind the search form about `\common\models\TblTransaksi`.
 */
class TblTransaksiSearch extends TblTransaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_obat'], 'integer'],
            [['tgl_transaksi', 'no_rekam_medik', 'nm_pasien', 'cara_bayar', 'nm_obat', 'jumlah'], 'safe'],
            [['harga', 'total'], 'number'],
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
        $query = TblTransaksi::find();

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
            'id_transaksi' => $this->id_transaksi,
            'id_obat' => $this->id_obat,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['like', 'nm_pasien', $this->nm_pasien])
            ->andFilterWhere(['like', 'cara_bayar', $this->cara_bayar])
            ->andFilterWhere(['like', 'nm_obat', $this->nm_obat]);
        if ($this->tgl_transaksi){
            $dateAwal = date('Y').'-'.$this->tgl_transaksi.'-'.'01';
            $dateAkhir = date('Y-m-t',strtotime($dateAwal));
            $query->andFilterWhere(['between', 'tgl_transaksi', $dateAwal, $dateAkhir]);
        }

        return $dataProvider;
    }
}
