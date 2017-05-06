<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "konto".
 *
 * @property integer $id
 * @property integer $rola_id
 * @property string $imie
 * @property string $nazwisko
 * @property string $email
 * @property string $login
 * @property string $haslo
 *
 * @property Rola $rola
 * @property Uprawnienia[] $uprawnienias
 * @property Podkategoria[] $podkategorias
 * @property Wynik[] $wyniks
 * @property Zestaw[] $zestaws
 */
class Konto extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rola_id', 'imie', 'nazwisko', 'email', 'login', 'haslo'], 'required'],
            [['rola_id'], 'integer'],
            [['imie'], 'string', 'max' => 20],
            [['nazwisko'], 'string', 'max' => 30],
            [['email', 'login', 'haslo'], 'string', 'max' => 50],
            [['rola_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rola::className(), 'targetAttribute' => ['rola_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rola_id' => 'Rola',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'email' => 'Email',
            'login' => 'Login',
            'haslo' => 'Haslo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRola()
    {
        return $this->hasOne(Rola::className(), ['id' => 'rola_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUprawnienias()
    {
        return $this->hasMany(Uprawnienia::className(), ['konto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPodkategorias()
    {
        return $this->hasMany(Podkategoria::className(), ['id' => 'podkategoria_id'])->viaTable('uprawnienia', ['konto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWyniks()
    {
        return $this->hasMany(Wynik::className(), ['konto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZestaws()
    {
        return $this->hasMany(Zestaw::className(), ['konto_id' => 'id']);
    }

    public function getAuthKey() {
	
    }
   
    public function getId(){
	return $this->id;
    }

    public function validateAuthKey($authKey){

    }

    public static  function findIdentity($id){
    	 return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
	throw new \yii\base\NotSupportedException();
    }
   
    public static function findByUsername($username){
	return self::findOne(['login'=>$username]);
    }

    public function validatePassword($password){
	return $this->haslo === $password;
    } 
}

