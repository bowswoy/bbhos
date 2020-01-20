<?php

class NewsController extends Controller
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
		$modelAction = News::model()->findByPk($id);
		if($modelAction === null) {
			$modelAction = new News('search');
		}

		if(isset($_POST['News'])) {
			$modelAction->attributes=$_POST['News'];
			if($modelAction->save())
				$this->redirect(array('index'));
		}

		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
			if(isset($_GET['News']))
				$model->attributes=$_GET['News'];
		
		$this->render('index',array(
			'model'=>$model,
			'modelAction'=>$modelAction,
		));
	}

	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
