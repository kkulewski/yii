<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rola".
 *
 * @property string $id
 * @property string $nazwa
 * @property string $opis
 */
class Rola extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rola';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa', 'opis'], 'required'],
            [['nazwa'], 'string', 'max' => 50],
            [['opis'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nazwa' => 'Nazwa',
            'opis' => 'Opis',
        ];
    }
}
