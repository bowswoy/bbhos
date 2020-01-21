<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
	'Categories' => array('index'),
	'จัดการข้อมูล',
);
?>

<div class="row">
	<div class="col-md-4">

		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">เพิ่มข้อมูล</h3>
			</div>
			<div class="box-body">
				<?php $this->renderPartial('_form', array('model' => $modelAction)); ?> </div>
		</div>

	</div>
	<div class="col-md-8">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">จัดการข้อมูล Categories</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id' => 'category-grid',
						'dataProvider' => $model->search(),
						'filter' => $model,
						'ajaxUpdate' => false,
						'enableSorting' => false,
						'summaryText' => false,
						'itemsCssClass' => 'table table-striped',
						'htmlOptions' => array('class' => 'box-body no-padding'),
						'pagerCssClass' => 'pagination',
						'pager' => array(
							'header' => false,
							'cssFile' => false,
							'firstPageLabel' => '&laquo;',
							'prevPageLabel' => '&lsaquo;',
							'nextPageLabel' => '&rsaquo;',
							'lastPageLabel' => '&raquo;',
							'selectedPageCssClass' => 'active',
							'htmlOptions' => array(
								'class' => 'pagination pagination-sm',
							),
						),
						'columns' => array(
							array(
								'name' => 'c_name',
								'filter' => CHtml::textField('Category[c_name]', $model->c_name, array('class' => 'form-control', 'autoconplete' => 'off', 'placeholder' => 'ใส่คำบางส่วนค้นหาได้')),
							),
							array(
								'class' => 'CButtonColumn',
								'template' => '{view} {update} {delete}',
								'buttons' => array(
									'update' => array(
										'url' => 'Yii::app()->createUrl("category/index", array("id" => $data->primaryKey))'
									)
								),
								'htmlOptions' => array(
									'nowrap' => true
								)
							),
						),
					)); ?>
				</div>
			</div>
		</div>
	</div>
</div>