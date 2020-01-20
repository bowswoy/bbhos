<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->u_id,
);
?>

<h1>รายละเอียด User #<?php echo $model->u_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'u_id',
		'u_usr',
		'u_pwd',
		'u_fullname',
		'u_position',
		'u_department',
		'u_lastlogin',
		'u_status',
	),
)); ?>
