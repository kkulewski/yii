<?php

namespace frontend\controllers;

use Yii;

use common\models\Zestaw;
use common\models\Odpowiedz;


class TestController extends \yii\web\Controller
{
	public $Ca = 5;
	public $Wa = 3;
	public $Correct = 0;
	public $Wrong = 0;
	
	
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
			//$this->Ca = 7;
			//$this->Wa = 4;
            return $this->render('start', ['zestaw' => $zestaw, 'variableSend' => $variableSend, 'Ca' => $this->Ca ]);
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
		$correct = count ( $session->get('answers_correct') );
		$wrong = count ( $session->get('answers_wrong') );
			
        return $this->render('end', ['id' => $session['id'], 'variableSend' => $variableSend, 'correct' => $correct, 'wrong' => $wrong]);
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
				$this->Correct = count ($answers_correct);
            }
            else 
			{
                $answers_wrong[] = $wczytana_odpowiedz->para_nr;
                $session->set('answers_wrong', $answers_wrong);
				$this->Wrong = count ($answers_wrong);
            }
        }

        // przygotuj dane dla algorytmu
        $algorytm_dane = [
            'answers_correct' => $answers_correct,
            'answers_wrong' => $answers_wrong,
            'wordsDictionary' => $zestaw->wordsDictionary(),
        ];

        // wylosuj nowa pare
        // TODO wybor algorytmu
        $testMode = new RandomTestMode($algorytm_dane);
        $para = $testMode->getPair();
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
            return $this->redirect(['end', 'variableSend' => $variableSend, ]);
        }
    }

}

class TestMode 
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

    public function getPair() { }
    public function prepareSet() { }
}

class RandomTestMode extends TestMode 
{
    public $liczba;

    public function getPair() 
	{
        $this->prepareSet();

        if (count($this->wordsDictionary) == 0) 
			return null;

        $pairNumber = array_rand($this->wordsDictionary);

        $nextWord = $this->wordsDictionary[$pairNumber];

        $pair['nr'] = $pairNumber;
        $pair['pytanie'] = $nextWord[0];
        $pair['odpowiedz'] = $nextWord[1];
        
        return $pair;
    }

    public function prepareSet()
	{
        // delete correctly guessed words
        foreach($this->answers_correct as $correctGuess)
		{
            unset($this->wordsDictionary[$correctGuess]);
        }
    }

}
