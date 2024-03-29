<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ta nazwa użytkownika jest już zajęta.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Ten adres email jest już zajęty.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
	
	 /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'username' => 'Nazwa użytkownika',
			'email' => 'Email',
			'password' => 'Hasło',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
	{
		if ($this->validate()) {
			$user = new User();
			$user->username = $this->username;
			$user->email = $this->email;
			$user->setPassword($this->password);
			$user->generateAuthKey();
			$user->save(false);

			// the following three lines were added:
			$auth = \Yii::$app->authManager;
			$authorRole = $auth->getRole('author');
			$auth->assign($authorRole, $user->getId());

			return $user;
		}

		return null;
	}
}
