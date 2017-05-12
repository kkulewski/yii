<?php

namespace common\models;

use Yii;
use yii\base\Model;

class Odpowiedz extends Model 
{

    public $pairNumber;
    public $pairQuestion;
    public $pairAnswer;
	public $userAnswer;

    public function rules ()
    {
        return [ [ ['pairNumber', 'pairQuestion', 'pairAnswer', 'userAnswer',], 'string' ] ];
    }
	
	public function feedPair($pair)
	{
        $this->pairNumber = $pair['pairNumber'];
        $this->pairQuestion = $pair['pairQuestion'];
        $this->pairAnswer = $pair['pairAnswer'];
    }

    public function isAnswerCorrect($zestaw, $reverse)
	{
		if($reverse == TRUE)
			$answerKey = 0;
		else
			$answerKey = 1;
		
        $isDifferent = ( strcmp($zestaw[$this->pairNumber][$answerKey], $this->userAnswer) );
		
		if($isDifferent == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
    }
}