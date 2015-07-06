<?php

/**
 * RegForm class.
 * RegForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Reg extends CFormModel {
	public $login;
	public $password;
	public $cpassword;
	public $email;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		return array(
			array('login, password, cpassword', 'required'),
			array('email', 'email'),
			array('password, cpassword', 'confirm'),
			array('rememberMe', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels() {
		return array(
			'login' => 'Login',
			'password' => 'Password',
			'cpassword' => 'Confirm password',
			'email' => 'EMail',
			'rememberMe' => 'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */

	public function confirm($attribute, $params) {
		$this->addError('password', 'Incorrect username or password.');
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login() {
		if ($this->_identity === null) {
			$this->_identity = new UserIdentity($this->login, $this->password);
			$this->_identity->authenticate();
		}
		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			$duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		} else
			return false;
	}
}
