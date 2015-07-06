<?php

class UsersController extends Controller {
	public function actionIndex() {
		$data = [];

		$condition = 'login = :Login AND email = :EMail';
		$params = [
			':Login' => 'a',
			':EMail' => 'a@a.a',
		];

		$data['users'] = tblUsers::model()->findAll($condition, $params);

		$this->render('index', $data);
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
		$model = new FormReg;

		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-reg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/

		//*
		if (isset($_POST['FormReg'])) {
			$model->attributes = $_POST['FormReg'];
			if ($model->validate()) {
				//добавить данные в БД
				print "Добавить пользователя в БД...";
				$oUsers = new tblUsers;
				$oUsers->login = $model->login;
				$oUsers->password = $model->password;
				$oUsers->email = $model->email;
				if ($oUsers->save()) {
					$id = $oUsers->id;
					print "id = $id<BR>\n";
				}
			}
		}
		//*/
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