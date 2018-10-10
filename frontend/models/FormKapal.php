<?php

namespace app\models;

use yii\base\Model;

class FormKapal extends Model
{
    public $id_kapal;
    public $nama_kapal;
    public $tanggal_masuk;
    public $tanggal_keluar;
    public $tanda_selar;
	public $tambat_1;
	public $tambat_2;
	public $tambat_10;
	public $tender_1;
	public $tender_2;
	public $tender_10;
	public $hutang_tambat;
	public $hutang_tender;
	public $hutang_kebersihan;
	public $kebersihan;
	public $id_billing;
	
    public function attributeLabels()
    {
        return [
        	'id_kapal' => 'Id Kapal',
            'nama_kapal' => 'Nama Kapal',
            'tanggal_masuk' => 'Tanggal kapal masuk',
            'tanggal_keluar' => 'Tanggal kapal keluar',
			'tanda_selar' => 'Tanda selar kapal',
			'tambat_1' => 'Tambat hari ke-1',
			'tambat_2' => 'Tambat hari (2-10)',
			'tambat_10' => 'Tambat hari >10',
			'tender_1' => 'Tender hari ke-1',
			'tender_2' => 'Tender hari (2-10)',
			'tender_10' => 'Tender hari >10',
			'hutang_tambat' => 'Hutang Tambat',
			'hutang_tender' => 'Hutang Tender',
			'hutang_kebersihan' => 'Hutang Kebersihan',
			'kebersihan' => 'Kebersihan',
			'id_billing' => 'ID Billing SIMPONI',
        ];
    }

    public function rules()
    {
        return [
            //['nama_kapal', 'required','message' => 'Nama kapal tidak boleh kosong'],
			//['tanggal_keluar', 'required','message' => 'Tanggal tidak boleh kosong (yyyy-mm-dd hh:mm:ss)'],
			//['tanggal_masuk', 'required','message' => 'Tanggal tidak boleh kosong (yyyy-mm-dd hh:mm:ss)'],
        ];
    }
}
