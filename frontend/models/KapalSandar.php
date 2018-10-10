<?php

namespace app\models;

use yii\db\ActiveRecord;

class KapalSandar extends ActiveRecord
{
    public static function tableName()
    {
        return 'daftar_kapal_tambat';
    }
}