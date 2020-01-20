<?php

class UserController extends Controller
{

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex($id = 0)
	{
		$modelAction = User::model()->findByPk($id);
		if($modelAction === null) {
			$modelAction = new User('search');
		}

		if(isset($_POST['User'])) {
			$modelAction->attributes=$_POST['User'];
			if($modelAction->save())
				$this->redirect(array('index'));
		}

		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
			if(isset($_GET['User']))
				$model->attributes=$_GET['User'];
		
		$this->render('index',array(
			'model'=>$model,
			'modelAction'=>$modelAction,
		));
	}

	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
