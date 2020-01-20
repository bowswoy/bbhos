<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->n_id,
);
?>

<h1>รายละเอียด News #<?php echo $model->n_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'n_id',
		'n_title',
		'n_datetime',
		'n_views',
		'n_ispin',
		'n_body',
		'n_last_update',
		'n_status',
		'c_id',
		'u_id',
	),
)); ?>
