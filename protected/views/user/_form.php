<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_usr'); ?>
		<?php echo $form->textField($model,'u_usr',array('size'=>32,'maxlength'=>32, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_usr'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_pwd'); ?>
		<?php echo $form->textField($model,'u_pwd',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_pwd'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_fullname'); ?>
		<?php echo $form->textField($model,'u_fullname',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_fullname'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_position'); ?>
		<?php echo $form->textField($model,'u_position',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_position'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_department'); ?>
		<?php echo $form->textField($model,'u_department',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_department'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_lastlogin'); ?>
		<?php echo $form->textField($model,'u_lastlogin', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_lastlogin'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_status'); ?>
		<?php echo $form->textField($model,'u_status', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_status'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึกการแก้ไข', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->