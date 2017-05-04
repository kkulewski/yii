<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kategoria".
 *
 * @property string $id
 * @property string $nazwa
 * @property string $opis
 * @property resource $obrazek
 */
class Kategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa', 'opis'], 'required'],
            [['opis', 'obrazek'], 'string'],
            [['nazwa'], 'string', 'max' => 50],
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
            'obrazek' => 'Obrazek',
        ];
    }
}
