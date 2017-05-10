<?php

namespace frontend\controllers;

use Yii;

use common\models\Zestaw;
use common\models\Odpowiedz;


class TestController extends \yii\web\Controller
{

    public function actionStart($id)
    {
        if($zestaw = Zestaw::findOne($id)) {
            $session = Yii::$app->session;
            $session->open();
            $session->set('id',$id);
            $session->set('poprawne_odpowiedzi',array());
            $session->set('zle_odpowiedzi',array());
            return $this->render('start', ['zestaw' => $zestaw]);
        }
        else { echo 'error - brak zestawu'; }

    }

    public function actionEnd()
    {
        $session = Yii::$app->session;
        $session->open();

        return $this->render('end',
                             ['id' => $session['id'],]);
    }

    public function actionNext()
    {
        $test = null;
        $session = Yii::$app->session;
        $session->open();

        // sprawdz czy test w trakcie
        if(!isset($_SESSION['id'])){
            return $this->render('error_nie-w-tescie');
        }

        //przygotuj zestaw i dane testu
        $id = $session->get('id');
        $poprawne_odpowiedzi  = $session->get('poprawne_odpowiedzi');
        $zle_odpowiedzi = $session->get('zle_odpowiedzi');
        $zestaw = Zestaw::findOne($id);

        // odbierz odpowiedz
        $wczytana_odpowiedz = new Odpowiedz();
        if($wczytana_odpowiedz->load($_POST)){
            // sprawdz odpowiedz
            $wczytana_odpowiedz->sprawdzOdpowiedz($zestaw->tablicaSlowek());

            // zapisz wynik odpowiedzi
            if($wczytana_odpowiedz->sprawdzenie==TRUE){
                $poprawne_odpowiedzi[] = $wczytana_odpowiedz->para_nr;
                $session->set('poprawne_odpowiedzi',$poprawne_odpowiedzi);
            }
            else {
                $zle_odpowiedzi[] = $wczytana_odpowiedz->para_nr;
                $session->set('zle_odpowiedzi',$zle_odpowiedzi);
            }
        }

        $test2 = $poprawne_odpowiedzi;

        // przygotuj dane dla algorytmu
        $algorytm_dane = [
            'poprawne_odpowiedzi' => $poprawne_odpowiedzi,
            'zle_odpowiedzi' => $zle_odpowiedzi,
            'tablica_slowek' => $zestaw->tablicaSlowek(),
        ];

        // wylosuj nowa pare
        // TODO wybor algorytmu
        $algorytm = new Algorytm1($algorytm_dane);
        $para = $algorytm->losujPare();
        //para [nr,pytanie,odpowiedz]

        // przygotuj model do nowej odpowiedzi
        if($para!=null) {
            $nowa_odpowiedz = new Odpowiedz();
            $nowa_odpowiedz->feedPara($para);

            return $this->render('next',
                                 ['id' => $id,
                                  'test' => $test,
                                  'nowa_odpowiedz' => $nowa_odpowiedz,
                                 ]);
        }
        else {
            return $this->redirect(['end']);
        }
    }

}

class Algorytm {
    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }
    }

    public function losujPare(){
        // losowanie nastepnego slowka (gdy zestaw juz przefiltrowany)
    }
    public function przygotujSlowka(){
        // filtrowanie zestawu
    }
}

class Algorytm1 extends Algorytm {
    public $liczba;

    public function losujPare() {
        $this->przygotujSlowka();

        if(count($this->tablica_slowek)==0) return null;

        $para_nr = array_rand($this->tablica_slowek);

        $next_word = $this->tablica_slowek[$para_nr];

        $para['nr'] = $para_nr;
        $para['pytanie'] = $next_word[0];
        $para['odpowiedz'] = $next_word[1];
        
        return $para;
    }

    public function przygotujSlowka(){
        // usun slowka ktore odpowiedziano poprawnie
        foreach($this->poprawne_odpowiedzi as $slowko_nr){
            unset($this->tablica_slowek[$slowko_nr]);
        }
    }

}
