<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'news-form',
		'enableAjaxValidation' => false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'n_title'); ?>
				<?php echo $form->textField($model, 'n_title', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'n_title'); ?>
			</div>


			<div class="form-group">
				<?php echo $form->labelEx($model, 'n_body'); ?>
				<?php echo $form->textArea($model, 'n_body', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'n_body'); ?>
			</div>

		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'n_ispin'); ?>
				<?php echo $form->dropDownlist($model, 'n_ispin', array(0 => 'ปกติ', 1 => 'ปักหมุด'), array('class' => 'form-control')); ?>
				<?php echo $form->error($model, 'n_ispin'); ?>
			</div>


			<div class="form-group">
				<?php echo $form->labelEx($model, 'c_id'); ?>
				<?php echo $form->dropDownlist($model, 'c_id', CHtml::listData(Category::model()->findAll(array('condition' => 'c_status = 1', 'order' => 'c_name ASC')), 'c_id', 'c_name'), array('class' => 'form-control')); ?>
				<?php echo $form->error($model, 'c_id'); ?>
			</div>

			<div class="form-group text-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึกการแก้ไข', array('class' => 'btn btn-primary')); ?>
			</div>

		</div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->