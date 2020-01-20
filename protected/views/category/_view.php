<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->c_id), array('view', 'id'=>$data->c_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_name')); ?>:</b>
	<?php echo CHtml::encode($data->c_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_status')); ?>:</b>
	<?php echo CHtml::encode($data->c_status); ?>
	<br />


</div>