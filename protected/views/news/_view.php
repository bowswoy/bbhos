<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->n_id), array('view', 'id'=>$data->n_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_title')); ?>:</b>
	<?php echo CHtml::encode($data->n_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->n_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_views')); ?>:</b>
	<?php echo CHtml::encode($data->n_views); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_ispin')); ?>:</b>
	<?php echo CHtml::encode($data->n_ispin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_body')); ?>:</b>
	<?php echo CHtml::encode($data->n_body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_last_update')); ?>:</b>
	<?php echo CHtml::encode($data->n_last_update); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('n_status')); ?>:</b>
	<?php echo CHtml::encode($data->n_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::encode($data->c_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_id')); ?>:</b>
	<?php echo CHtml::encode($data->u_id); ?>
	<br />

	*/ ?>

</div>