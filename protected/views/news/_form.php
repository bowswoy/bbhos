<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'n_title'); ?>
		<?php echo $form->textField($model,'n_title',array('size'=>60,'maxlength'=>512, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'n_title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'n_datetime'); ?>
		<?php echo $form->textField($model,'n_datetime', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'n_datetime'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'n_views'); ?>
		<?php echo $form->textField($model,'n_views', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'n_views'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'n_ispin'); ?>
		<?php echo $form->textField($model,'n_ispin', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'n_ispin'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'n_body'); ?>
		<?php echo $form->textArea($model,'n_body',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'n_body'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'n_last_update'); ?>
		<?php echo $form->textField($model,'n_last_update', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'n_last_update'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'n_status'); ?>
		<?php echo $form->textField($model,'n_status', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'n_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'c_id'); ?>
		<?php echo $form->textField($model,'c_id', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'c_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'u_id'); ?>
		<?php echo $form->textField($model,'u_id', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'u_id'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึกการแก้ไข', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->