<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblRegistrasiPenunjangPasien;

/**
 * RegistrasiRadiologi represents the model behind the search form about `\common\models\TblRegistrasiPenunjangPasien`.
 */
class RegistrasiRadiologi extends TblRegistrasiPenunjangPasien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_registrasi_penunjang_pasien', 'tgl_registrasi_penunjang_pasien', 'nomor_registrasi_pasien', 'diagnosa', 'tgl_catat', 'sample_id'], 'safe'],
            [['id_dokter', 'id_detail_instalasi', 'no_urut', 'id'], 'integer'],
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
        $query = TblRegistrasiPenunjangPasien::find();

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
            'tgl_registrasi_penunjang_pasien' => $this->tgl_registrasi_penunjang_pasien,
            'id_dokter' => $this->id_dokter,
            'id_detail_instalasi' => $this->id_detail_instalasi,
            'no_urut' => $this->no_urut,
            'id' => $this->id,
            'tgl_catat' => $this->tgl_catat,
        ]);

        $query->andFilterWhere(['like', 'nomor_registrasi_penunjang_pasien', $this->nomor_registrasi_penunjang_pasien])
            ->andFilterWhere(['like', 'nomor_registrasi_pasien', $this->nomor_registrasi_pasien])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
            ->andFilterWhere(['like', 'sample_id', $this->sample_id]);

        return $dataProvider;
    }
}
