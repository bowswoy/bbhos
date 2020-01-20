<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->u_id), array('view', 'id'=>$data->u_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_usr')); ?>:</b>
	<?php echo CHtml::encode($data->u_usr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_pwd')); ?>:</b>
	<?php echo CHtml::encode($data->u_pwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_fullname')); ?>:</b>
	<?php echo CHtml::encode($data->u_fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_position')); ?>:</b>
	<?php echo CHtml::encode($data->u_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_department')); ?>:</b>
	<?php echo CHtml::encode($data->u_department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_lastlogin')); ?>:</b>
	<?php echo CHtml::encode($data->u_lastlogin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('u_status')); ?>:</b>
	<?php echo CHtml::encode($data->u_status); ?>
	<br />

	*/ ?>

</div>