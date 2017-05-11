<?php

namespace frontend\controllers;

use Yii;

use common\models\Zestaw;
use common\models\Odpowiedz;


class TestController extends \yii\web\Controller
{

    public function actionStart($id)
    {
        if($zestaw = Zestaw::findOne($id)) 
		{
            $session = Yii::$app->session;
            $session->open();
            $session->set('id',$id);
            $session->set('answers_correct',array());
            $session->set('answers_wrong',array());
			$variableSend = 'ACTION START variable';
            return $this->render('start', ['zestaw' => $zestaw, 'variableSend' => $variableSend]);
        }
        else 
		{ 
            return $this->render('Wybrany zestaw nie istnieje!');
		}

    }

    public function actionEnd()
    {
        $session = Yii::$app->session;
        $session->open();

		$variableSend = 'ACTION END variable';
			
        return $this->render('end', ['id' => $session['id'], 'variableSend' => $variableSend, ]);
    }

    public function actionNext()
    {
        $test = null;
        $session = Yii::$app->session;
        $session->open();

        // check if test is started
        if(!isset($_SESSION['id']))
		{
            return $this->render('Żaden test nie jest w trakcie!');
        }

        // init
        $id = $session->get('id');
        $answers_correct  = $session->get('answers_correct');
        $answers_wrong = $session->get('answers_wrong');
        $zestaw = Zestaw::findOne($id);

        // odbierz odpowiedz
        $wczytana_odpowiedz = new Odpowiedz();
        if($wczytana_odpowiedz->load($_POST))
		{
            // sprawdz odpowiedz
            $wczytana_odpowiedz->sprawdzOdpowiedz($zestaw->wordsDictionary());

            // zapisz wynik odpowiedzi
            if($wczytana_odpowiedz->sprawdzenie==TRUE)
			{
                $answers_correct[] = $wczytana_odpowiedz->para_nr;
                $session->set('answers_correct', $answers_correct);
            }
            else 
			{
                $answers_wrong[] = $wczytana_odpowiedz->para_nr;
                $session->set('answers_wrong', $answers_wrong);
            }
        }

        $test2 = $answers_correct;

        // przygotuj dane dla algorytmu
        $algorytm_dane = [
            'answers_correct' => $answers_correct,
            'answers_wrong' => $answers_wrong,
            'wordsDictionary' => $zestaw->wordsDictionary(),
        ];

        // wylosuj nowa pare
        // TODO wybor algorytmu
        $algorytm = new Algorytm1($algorytm_dane);
        $para = $algorytm->losujPare();
        //para [nr,pytanie,odpowiedz]

        // przygotuj model do nowej odpowiedzi
        if($para!=null) 
		{
            $nowa_odpowiedz = new Odpowiedz();
            $nowa_odpowiedz->feedPara($para);

            return $this->render('next',
                                 ['id' => $id,
                                  'test' => $test,
                                  'nowa_odpowiedz' => $nowa_odpowiedz,
                                 ]);
        }
        else 
		{
			$variableSend = 'ACTION NEXT variable';
            return $this->redirect(['end', 'variableSend' => $variableSend ]);
        }
    }

}

class Algorytm 
{
    public function __construct(array $arguments = array()) 
	{
        if (!empty($arguments)) 
		{
            foreach ($arguments as $property => $argument) 
			{
                $this->{$property} = $argument;
            }
        }
    }

    public function losujPare()
	{
        // losowanie nastepnego slowka (gdy zestaw juz przefiltrowany)
    }
    public function przygotujSlowka()
	{
        // filtrowanie zestawu
    }
}

class Algorytm1 extends Algorytm 
{
    public $liczba;

    public function losujPare() 
	{
        $this->przygotujSlowka();

        if (count($this->wordsDictionary) == 0) 
			return null;

        $para_nr = array_rand($this->wordsDictionary);

        $next_word = $this->wordsDictionary[$para_nr];

        $para['nr'] = $para_nr;
        $para['pytanie'] = $next_word[0];
        $para['odpowiedz'] = $next_word[1];
        
        return $para;
    }

    public function przygotujSlowka()
	{
        // usun slowka ktore odpowiedziano poprawnie
        foreach($this->answers_correct as $slowko_nr)
		{
            unset($this->wordsDictionary[$slowko_nr]);
        }
    }

}
