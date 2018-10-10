<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MstKapal;

/**
 * SearchMstKapal represents the model behind the search form of `app\models\MstKapal`.
 */
class SearchMstKapal extends MstKapal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kapal', 'tanda_selar', 'kode_perusahaan', 'jenis_izin', 'kode_kapal', 'surat_ukur', 'tempat_gross_akte', 'nomor_gross_akte', 'tanggal_gross_akte', 'nomor_buku_kapal', 'sertifikat_kelaikan', 'tempat_pembangunan', 'merek_mesin', 'tipe_mesin', 'no_mesin', 'jumlah_palkah', 'hp', 'p', 'l', 'd', 'spesifikasi_alat_tangkap', 'nama_kapal_sebelumnya', 'nama_pemilik_sebelumnya', 'foto_kapal', 'nomor_imo', 'id_transmitter', 'status_armada', 'catatan', 'tanggal_buat', 'tanggal_ubah'], 'safe'],
            [['gt_kapal', 'panjang_kapal', 'daya_kapal', 'kapasitas_palkah', 'nt_kapal', 'lebar_kapal', 'dalam_kapal', 'loa'], 'number'],
            [['id', 'id_master', 'id_perusahaan', 'id_alat_tangkap', 'id_alat_tangkap_perizinan', 'id_bahan_kapal', 'id_jenis_kapal', 'id_kategori_kapal', 'id_bendera_kapal', 'id_negara_asal_kapal', 'id_bendera_ina', 'tahun_pembangunan', 'rpm', 'id_pengguna_buat', 'id_pengguna_ubah'], 'integer'],
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
        $query = MstKapal::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
		// datetime and number query
        $query->andFilterWhere([
            'gt_kapal' => $this->gt_kapal,
            'panjang_kapal' => $this->panjang_kapal,
            'id' => $this->id,
            'id_master' => $this->id_master,
            'id_perusahaan' => $this->id_perusahaan,
            'id_alat_tangkap' => $this->id_alat_tangkap,
            'id_alat_tangkap_perizinan' => $this->id_alat_tangkap_perizinan,
            'id_bahan_kapal' => $this->id_bahan_kapal,
            'id_jenis_kapal' => $this->id_jenis_kapal,
            'id_kategori_kapal' => $this->id_kategori_kapal,
            'id_bendera_kapal' => $this->id_bendera_kapal,
            'id_negara_asal_kapal' => $this->id_negara_asal_kapal,
            'id_bendera_ina' => $this->id_bendera_ina,
            'tanggal_gross_akte' => $this->tanggal_gross_akte,
            'tahun_pembangunan' => $this->tahun_pembangunan,
            'daya_kapal' => $this->daya_kapal,
            'rpm' => $this->rpm,
            'kapasitas_palkah' => $this->kapasitas_palkah,
            'nt_kapal' => $this->nt_kapal,
            'lebar_kapal' => $this->lebar_kapal,
            'dalam_kapal' => $this->dalam_kapal,
            'loa' => $this->loa,
            'id_pengguna_buat' => $this->id_pengguna_buat,
            'tanggal_buat' => $this->tanggal_buat,
            'id_pengguna_ubah' => $this->id_pengguna_ubah,
            'tanggal_ubah' => $this->tanggal_ubah,
        ]);
		
		// string or textdomain query
        //filterWhere(['nama_kapal'=> $this->nama_kapal])
        $query->FilterWhere(['like', 'nama_kapal', $this->nama_kapal])
            ->andFilterWhere(['like', 'tanda_selar', $this->tanda_selar])
            ->andFilterWhere(['like', 'kode_perusahaan', $this->kode_perusahaan])
            ->andFilterWhere(['like', 'jenis_izin', $this->jenis_izin])
            ->andFilterWhere(['like', 'kode_kapal', $this->kode_kapal])
            ->andFilterWhere(['like', 'surat_ukur', $this->surat_ukur])
            ->andFilterWhere(['like', 'tempat_gross_akte', $this->tempat_gross_akte])
            ->andFilterWhere(['like', 'nomor_gross_akte', $this->nomor_gross_akte])
            ->andFilterWhere(['like', 'nomor_buku_kapal', $this->nomor_buku_kapal])
            ->andFilterWhere(['like', 'sertifikat_kelaikan', $this->sertifikat_kelaikan])
            ->andFilterWhere(['like', 'tempat_pembangunan', $this->tempat_pembangunan])
            ->andFilterWhere(['like', 'merek_mesin', $this->merek_mesin])
            ->andFilterWhere(['like', 'tipe_mesin', $this->tipe_mesin])
            ->andFilterWhere(['like', 'no_mesin', $this->no_mesin])
            ->andFilterWhere(['like', 'jumlah_palkah', $this->jumlah_palkah])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'p', $this->p])
            ->andFilterWhere(['like', 'l', $this->l])
            ->andFilterWhere(['like', 'd', $this->d])
            ->andFilterWhere(['like', 'spesifikasi_alat_tangkap', $this->spesifikasi_alat_tangkap])
            ->andFilterWhere(['like', 'nama_kapal_sebelumnya', $this->nama_kapal_sebelumnya])
            ->andFilterWhere(['like', 'nama_pemilik_sebelumnya', $this->nama_pemilik_sebelumnya])
            ->andFilterWhere(['like', 'foto_kapal', $this->foto_kapal])
            ->andFilterWhere(['like', 'nomor_imo', $this->nomor_imo])
            ->andFilterWhere(['like', 'id_transmitter', $this->id_transmitter])
            ->andFilterWhere(['like', 'status_armada', $this->status_armada])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);
		
		//var_dump($params);
		//print_r ($dataProvider);
        return $dataProvider;
    }
}
