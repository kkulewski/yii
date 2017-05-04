<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zestaw".
 *
 * @property string $id
 * @property integer $konto_id
 * @property integer $jezyk1_id
 * @property integer $jezyk2_id
 * @property integer $podkategoria_id
 * @property string $nazwa
 * @property string $zestaw
 * @property integer $ilosc_slowek
 * @property string $data_dodania
 * @property string $data_edycji
 */
class Zestaw extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zestaw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['konto_id', 'jezyk1_id', 'jezyk2_id', 'podkategoria_id', 'nazwa', 'zestaw', 'ilosc_slowek', 'data_dodania'], 'required'],
            [['konto_id', 'jezyk1_id', 'jezyk2_id', 'podkategoria_id', 'ilosc_slowek'], 'integer'],
            [['zestaw'], 'string'],
            [['data_dodania', 'data_edycji'], 'safe'],
            [['nazwa'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'konto_id' => 'Konto ID',
            'jezyk1_id' => 'Jezyk1 ID',
            'jezyk2_id' => 'Jezyk2 ID',
            'podkategoria_id' => 'Podkategoria ID',
            'nazwa' => 'Nazwa',
            'zestaw' => 'Zestaw',
            'ilosc_slowek' => 'Ilosc Slowek',
            'data_dodania' => 'Data Dodania',
            'data_edycji' => 'Data Edycji',
        ];
    }
}
