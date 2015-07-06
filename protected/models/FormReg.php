<?php

/**
 * RegForm class.
 * RegForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class FormReg extends CFormModel {
	public $login;
	public $password;
	public $cpassword;
	public $email;
	public $rememberMe;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		return array(
			array('login, password, cpassword, email', 'required'),
			array('login', 'unique', 'className'=> 'tblUsers'),
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
	 * Check password and confirm password..
	 */
	public function confirm($attribute, $params) {
		if ($this->password != $this->cpassword) {
			$this->addError('password', 'Wrong confirm password.');
		}
	}

}
