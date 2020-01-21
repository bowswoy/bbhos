<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs = array(
	'News' => array('index'),
	'จัดการข้อมูล',
);
?>

<div class="row">
	<div class="col-md-12">

		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">เพิ่มข้อมูล</h3>
			</div>
			<div class="box-body">
				<?php $this->renderPartial('_form', array('model' => $modelAction)); ?>
			</div>
		</div>

	</div>
</div>

<div class="row">
	<div class="col-md-12">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">จัดการข้อมูล News</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id' => 'news-grid',
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
								'name' => 'n_title',
								'filter' => CHtml::textField('News[n_title]', $model->n_title, array('class' => 'form-control', 'autoconplete' => 'off', 'placeholder' => 'ใส่คำบางส่วนค้นหาได้')),
							),
							array(
								'name' => 'n_datetime',
								'filter' => CHtml::textField('News[n_datetime]', '', array('class' => 'form-control', 'autoconplete' => 'off', 'placeholder' => 'ใส่คำบางส่วนค้นหาได้')),
							),
							array(
								'name' => 'c_id',
								'filter' => CHtml::textField('News[c_id]', '', CHtml::listData(Category::model()->findAll(array('condition' => 'c_status = 1', 'order' => 'c_name ASC')), 'c_id', 'c_name'), array('class' => 'form-control', 'autoconplete' => 'off', 'placeholder' => 'ใส่คำบางส่วนค้นหาได้')),
							),
							array(
								'class' => 'CButtonColumn',
								'template' => '{view} {update} {delete}',
								'buttons' => array(
									'update' => array(
										'url' => 'Yii::app()->createUrl("news/index", array("id" => $data->primaryKey))'
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