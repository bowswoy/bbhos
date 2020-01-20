<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->c_id,
);
?>

<h1>รายละเอียด Category #<?php echo $model->c_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_id',
		'c_name',
		'c_status',
	),
)); ?>
