<?php $this->beginContent(''); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->pageTitle; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap/dist/css/bootstrap.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/font-awesome/css/font-awesome.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/Ionicons/css/ionicons.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/dist/css/AdminLTE.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/dist/css/skins/_all-skins.min.css');
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/index.css');
  ?>
<body class="hold-transition login-page">
	<?php echo $content; ?>
	<?php
		Yii::app()->clientScript->coreScriptPosition=CClientScript::POS_END;
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerCoreScript('jquery.ui');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap/dist/js/bootstrap.min.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/dist/js/adminlte.min.js', CClientScript::POS_END);
	?>
</body>
</html>
<?php $this->endContent(); ?>