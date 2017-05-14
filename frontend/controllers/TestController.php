<?php

namespace frontend\controllers;

use Yii;

use common\models\Zestaw;
use common\models\Odpowiedz;

class TestController extends \yii\web\Controller
{
	public $Correct = 0;
	public $Wrong = 0;
	
    public function actionView($id)
    {
        if($zestaw = Zestaw::findOne($id)) 
		{
            $session = Yii::$app->session;
            $session->open();
            $session->set('id', $id);
            $session->set('answers_correct', array());
            $session->set('answers_wrong', array());
			$session->set('answered', array());
			$session->set('currentQuestionNumber', 1);
			
			
			$show = Yii::$app->getRequest()->getQueryParam('show');
			
			if($show == TRUE)
			{
				$attributes = ['nazwa:text:Nazwa zestawu', 'jezyk1.nazwa:text:Język 1', 'jezyk2.nazwa:text:Język 2', 'zestaw:ntext:Zawartość', ];
			}
			else
			{
				$attributes = ['nazwa:text:Nazwa zestawu', 'jezyk1.nazwa:text:Język 1', 'jezyk2.nazwa:text:Język 2', ];
			}

            return $this->render('view', ['zestaw' => $zestaw, 'attributes' => $attributes, ]);
        }
        else 
		{ 
            return $this->render('Wybrany zestaw nie istnieje!');
		}

    }

    public function actionResult()
    {
        $session = Yii::$app->session;
        $session->open();

		$correct = count ( $session->get('answers_correct') );
		$wrong = count ( $session->get('answers_wrong') );

        return $this->render('result', ['id' => $session['id'], 'correct' => $correct, 'wrong' => $wrong]);
    }

    public function actionNext()
    {
        $session = Yii::$app->session;
        $session->open();

        // check if test started
        if(!isset($_SESSION['id']))
		{
            return $this->render('Żaden test nie jest w trakcie!');
        }

        // init session details
        $id = $session->get('id');
        $answers_correct  = $session->get('answers_correct');
        $answers_wrong = $session->get('answers_wrong');
		$answered = $session->get('answered');
        $zestaw = Zestaw::findOne($id);
		
		
		$mode = Yii::$app->getRequest()->getQueryParam('mode');
		$reverse = Yii::$app->getRequest()->getQueryParam('reverse');
		// get $mode from user -> button in test-start view?

        // get user answer
        $receivedAnswer = new Odpowiedz();
        if($receivedAnswer->load($_POST))
		{
            // zapisz wynik odpowiedzi
            if($receivedAnswer->isAnswerCorrect($zestaw->wordsDictionary(), $reverse) == TRUE)
			{	
                $answers_correct[] = $receivedAnswer->pairNumber;
                $session->set('answers_correct', $answers_correct);
				$this->Correct = count ($answers_correct);
            }
            else 
			{
                $answers_wrong[] = $receivedAnswer->pairNumber;
                $session->set('answers_wrong', $answers_wrong);
				$this->Wrong = count ($answers_wrong);
            }
			
			$answered[] = $receivedAnswer->pairNumber;
			$session->set('answered', $answered);
			
			
			// update question number counter
			$questionNumber = $session->get('currentQuestionNumber');
			$session->set('currentQuestionNumber', $questionNumber + 1);
        }

        // prepare data for test
        $testData = [
			'answered' => $answered,
            'answers_correct' => $answers_correct,
            'answers_wrong' => $answers_wrong,
            'wordsDictionary' => $zestaw->wordsDictionary(),
        ];
		
		$totalQuestions = count($zestaw->wordsDictionary());

        // get new pair
		if( $mode == 1)
		{
			 $testMode = new RandomTestMode($testData);
		}
		else if ( $mode == 2 )
		{
			$testMode = new SingleRandomTestMode($testData);
		}
		else if ( $mode == 3 )
		{
			$testMode = new SequentialTestMode($testData);
		}
		else if ( $mode == 4 )
		{
			$testMode = new SingleSequentialTestMode($testData);
		}
		
		// handle next pair
        $pair = $testMode->getPair($reverse);
        if($pair != null) 
		{
            $nextAnswer = new Odpowiedz();
            $nextAnswer->feedPair($pair);
			
			$questionNumber = $session->get('currentQuestionNumber');
			$questionCouterTitle = 'Tryb nauki - pytanie';
			
            return $this->render('next', ['id' => $id, 'nextAnswer' => $nextAnswer, 
										'questionNumber' => $questionNumber, 'totalQuestions' => $totalQuestions,
										'questionCounterTitle' => $questionCouterTitle, ]);
        }
        else 
		{
            return $this->redirect(['result']);
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

    public function getPair($reverse) { }
	
	public function takePair($reverse, $pairNumber) 
	{
		// if no more pairs left - finish test
        if (count($this->wordsDictionary) == 0) 
			return null;
		
		if($reverse == TRUE)
		{
			$q = 1;
			$a = 0;
		}
		else
		{
			$q = 0;
			$a = 1;
		}

		// get random pair
        $nextWord = $this->wordsDictionary[$pairNumber];
        $pair['pairNumber'] = $pairNumber;
        $pair['pairQuestion'] = $nextWord[$q];
        $pair['pairAnswer'] = $nextWord[$a];
        
        return $pair;		
	}
}

class RandomTestMode extends TestMode 
{
    public function getPair($reverse) 
	{
		// remove correctly guessed pairs from set
        foreach($this->answers_correct as $correctGuess)
		{
            unset($this->wordsDictionary[$correctGuess]);
        }
		
        $pairNumber = array_rand($this->wordsDictionary);
		return $this->takePair($reverse, $pairNumber);
    }
}

class SingleRandomTestMode extends TestMode 
{
    public function getPair($reverse) 
	{
		// remove correctly guessed pairs from set
        foreach($this->answered as $answeredQuestion)
		{
            unset($this->wordsDictionary[$answeredQuestion]);
        }

        $pairNumber = array_rand($this->wordsDictionary);
		return $this->takePair($reverse, $pairNumber);
    }
}

class SequentialTestMode extends TestMode 
{
    public function getPair($reverse) 
	{
		// remove correctly guessed pairs from set
        foreach($this->answers_correct as $correctGuess)
		{
            unset($this->wordsDictionary[$correctGuess]);
        }

        $pairNumber = key($this->wordsDictionary);
		return $this->takePair($reverse, $pairNumber);
    }
}

class SingleSequentialTestMode extends TestMode 
{
    public function getPair($reverse) 
	{
		// remove correctly guessed pairs from set
        foreach($this->answered as $answeredQuestion)
		{
            unset($this->wordsDictionary[$answeredQuestion]);
        }

        $pairNumber = key($this->wordsDictionary);
		return $this->takePair($reverse, $pairNumber);
    }
}
