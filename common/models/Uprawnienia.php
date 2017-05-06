<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uprawnienia".
 *
 * @property integer $konto_id
 * @property integer $podkategoria_id
 */
class Uprawnienia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uprawnienia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['konto_id', 'podkategoria_id'], 'required'],
            [['konto_id', 'podkategoria_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'konto_id' => 'Konto ID',
            'podkategoria_id' => 'Podkategoria ID',
        ];
    }
}
