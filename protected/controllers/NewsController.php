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
			array(
				'allow',
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex($id = 0)
	{
		$modelAction = News::model()->findByPk($id);
		if ($modelAction === null) {
			$modelAction = new News('search');
		}

		if (isset($_POST['News'])) {
			$modelAction->attributes = $_POST['News'];
			if ($modelAction->save()) {
				Attachment::model()->deleteAll("n_id = :nid", array('nid' => $modelAction->n_id));
				$output_dir = Yii::app()->basePath . "/../attachments";
				$fileExtension = array("doc", "docx", "pdf", "ppt", "pptx", "pps", "ppsx", "xls", "xlsx", "zip", "rar");

				if (isset($_FILES['Attachment']['name'])) {
					for ($i = 0; $i < count($_FILES["Attachment"]["name"]['file']); $i++) {
						if ($_POST["Attachment"]["name"][$i] == '')
							$_POST["Attachment"]["name"][$i] = CHtml::encode(str_replace('.', '_', $_FILES["Attachment"]["name"]['file'][$i]));

						if ($_FILES["Attachment"]["name"]['file'][$i] != "") {

							$ext = pathinfo($_FILES["Attachment"]["name"]['file'][$i], PATHINFO_EXTENSION);
							if (in_array(strtolower($ext), $fileExtension)) {
								$fileName = date("YmdHis") . '_' . $this->randomString() . "." . $ext;
								if (file_exists($output_dir . $fileName)) {
									$fileName = $fileName = date("YmdHis") . '_' . $this->randomString() . "." . $ext;
								}

								if (move_uploaded_file($_FILES["Attachment"]["tmp_name"]['file'][$i], $output_dir . '/' . $fileName)) {

									$attachment = new Attachment;
									$attachment->a_filename = $fileName;
									$attachment->a_name = CHtml::encode($_POST["Attachment"]["name"][$i]);
									$attachment->a_type = CHtml::encode($ext);
									$attachment->a_size = $_FILES["Attachment"]["size"]['file'][$i];
									$attachment->a_order = $i;
									$attachment->n_id = $modelAction->n_id;
									if ($attachment->save()) {
										//PSMoj::createLog('เพิ่มไฟล์แนบ ' . $attachment->att_file . ' ใน ' . $model->post_title, 'MdAttachments');
									}
								}
							}
						}
					}
				}

				$this->redirect(array('index'));
			}
		}

		$model = new News('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['News']))
			$model->attributes = $_GET['News'];

		$this->render('index', array(
			'model' => $model,
			'modelAction' => $modelAction,
			'attachments' => $modelAction->attachments
		));
	}

	public function loadModel($id)
	{
		$model = News::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUploads()
	{
		$output_dir = Yii::app()->basePath . "/../images";
		if (isset($_FILES["myfile"])) {

			list($width, $height) = getimagesize($_FILES["myfile"]["tmp_name"]);
			$error = $_FILES["myfile"]["error"];

			if (!is_array($_FILES["myfile"]["name"])) {
				$ext = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);
				$fileName = date("YmdHis") . '_' . $this->randomString() . "." . $ext;
				if (file_exists($output_dir . $fileName)) {
					$fileName = $fileName = date("YmdHis") . '_' . $this->randomString() . "." . $ext;
				}
				@move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . '/' . $fileName);
				$thumb = Yii::app()->phpThumb->create($output_dir . '/' . $fileName);
				if ($width > 1200) {
					$thumb->resize(1200, 1200);
					$thumb->save($output_dir . '/' . $fileName);
				}
				echo $fileName . '?' . filemtime($output_dir . '/' . $fileName);
			}
		} else {
			echo 'no';
		}
	}

	public function actionUploadThumb()
	{
		$output_dir = Yii::app()->basePath . "/../images";
		if (isset($_FILES["myfile"])) {

			list($width, $height) = getimagesize($_FILES["myfile"]["tmp_name"]);

			if (!is_array($_FILES["myfile"]["name"])) {
				$ext = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);
				$fileName = date("YmdHis") . '_' . $this->randomString() . "." . $ext;
				if (file_exists($output_dir . $fileName)) {
					$fileName = $fileName = date("YmdHis") . '_' . $this->randomString() . "." . $ext;
				}
				@move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . '/' . $fileName);
				$thumb = Yii::app()->phpThumb->create($output_dir . '/' . $fileName);
				$thumb->save($output_dir . '/original_' . $fileName);

				if ($width > 1024) {
					$thumb->resize(1024, 1024);
					$thumb->save($output_dir . '/' . $fileName);
				}

				$thumb->resize(600, 390);
				$thumb->save($output_dir . '/gallery_' . $fileName);
				$thumb->cropFromCenter(600, 315);
				$thumb->save($output_dir . '/og_' . $fileName);
				$thumb->adaptiveResize(300, 157);
				$thumb->save($output_dir . '/n_' . $fileName);
				echo $fileName;
			}
		}
	}

	public function randomString($length = 5)
	{
		$str = "";
		$characters = array_merge(range('0', '9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
}
