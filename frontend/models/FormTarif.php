<?php

namespace app\models;

use yii\base\Model;

class FormTarif extends Model
{
	public $nama_tarif;
    public $biaya;
    public $satuan;
	
	public function attributeLabels()
    {
        return [
            'nama_tarif' => 'Jenis tarif yang dibebankan',
            'biaya' => 'Jumlah biaya yang diterapkan',
            'satuan' => 'Satuan biaya',
        ];
    }	
}