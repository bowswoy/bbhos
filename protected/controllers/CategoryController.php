<?php

class CategoryController extends Controller
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
		$modelAction = Category::model()->findByPk($id);
		if($modelAction === null) {
			$modelAction = new Category('search');
		}

		if(isset($_POST['Category'])) {
			$modelAction->attributes=$_POST['Category'];
			if($modelAction->save())
				$this->redirect(array('index'));
		}

		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Category']))
				$model->attributes=$_GET['Category'];
		
		$this->render('index',array(
			'model'=>$model,
			'modelAction'=>$modelAction,
		));
	}

	public function loadModel($id)
	{
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
