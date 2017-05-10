<?php

namespace common\models;

use Yii;
use yii\base\Model;

class Odpowiedz extends Model {

    public $para_nr;
    public $odpowiedz_podana;

    public $para_pytanie;
    public $para_odpowiedz;

    public $sprawdzenie;

    public function rules ()
    {
        return [ [ ['para_pytanie','para_odpowiedz','odpowiedz_podana','para_nr'], 'string' ] ];
    }

    public function sprawdzOdpowiedz($zestaw){
        $check = (strcmp($zestaw[$this->para_nr][1], $this->odpowiedz_podana));
        // return $zestaw[$this->para_nr];
        $this->sprawdzenie = $check==0;
        return $this->sprawdzenie;
    }

    public function feedPara($para){
        $this->para_nr = $para['nr'];
        $this->para_pytanie = $para['pytanie'];
        $this->para_odpowiedz = $para['odpowiedz'];
    }
}