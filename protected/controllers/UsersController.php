<?php

class UsersController extends Controller {
	public function actionIndex() {
		$model = new Users;

		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-index-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		//*/

		if (isset($_POST['Users'])) {
			$model->attributes = $_POST['Users'];
			//if ($model->validate()) {
			// form inputs are valid, do something here
			return;
			//}
		}
		$this->render('index', array('model' => $model));
	}

	public function actionDelete() {
		$this->render('delete');
	}

	public function actionEdit() {
		$this->render('edit');
	}

	public function actionLogin() {
		$this->render('login');
	}

	public function actionReg() {
		$model = new Reg;

		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-reg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/

		/*
		if (isset($_POST['Users'])) {
			$model->attributes = $_POST['Users'];
			if ($model->validate()) {
				// form inputs are valid, do something here
				return;
			}
		}
		*/
		$this->render('reg', array('model' => $model));
	}

	public function actionView() {
		$this->render('view');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	//*/

	/*
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	//*/
}