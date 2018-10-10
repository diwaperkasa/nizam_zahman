<?php

namespace app\models;

use yii\db\ActiveRecord;

class TarifPNBP extends ActiveRecord
{
    public static function tableName()
    {
        return 'tarif_pnbp';
    }
}