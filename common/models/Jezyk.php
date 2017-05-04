<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jezyk".
 *
 * @property string $id
 * @property string $nazwa
 */
class Jezyk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jezyk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa'], 'required'],
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
        ];
    }
}
