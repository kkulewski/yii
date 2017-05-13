<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "podkategoria".
 *
 * @property string $id
 * @property integer $kategoria_id
 * @property string $nazwa
 * @property string $opis
 */
class Podkategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'podkategoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategoria_id', 'nazwa', 'opis'], 'required'],
            [['kategoria_id'], 'integer'],
            [['opis'], 'string'],
            [['nazwa'], 'string', 'max' => 50],
			[['kategoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kategoria::className(), 'targetAttribute' => ['kategoria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategoria.nazwa' => 'Kategoria',
            'nazwa' => 'Nazwa',
            'opis' => 'Opis',
        ];
    }
	
	 /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategoria()
    {
        return $this->hasOne(Kategoria::className(), ['id' => 'kategoria_id']);
    }
	
	
	public function getZestawy()
	{
    	   return $this->hasMany(Zestaw::classname(), ['id' => 'podkategoria_id']);
    }
}
