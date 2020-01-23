<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */

$this->widget('application.extensions.tinymce.SladekTinyMce');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.uploadfile.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/uploadfile.css');
Yii::app()->clientScript->registerCss('mycss', '
	div.mce-fullscreen {
		z-index: 10000;
	}
	.mce-content-body {
		line-height: 22px;
	}
	.del {
		position: absolute;
		color: #fff;
		right: 20px;
		padding: 5px;
		line-height: 20px;
		cursor: pointer;
	}
    .movearea {
        height: 70%;
        width: 64px;
        left: 15px;
        top: 0;
        position: absolute;
        cursor: move;
        text-align: right;
        padding-right: 20px;
    }
');
Yii::app()->clientScript->registerScript('text-editor', '
	tinymce.init({
		selector: "#' . CHtml::activeId($model, 'n_body') . '",
		height: 250,
		theme: "modern",
		language: "th_TH",
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image mybutton media fontsizeselect forecolor backcolor fullscreen",
		image_advtab: true,
		automatic_uploads: true,
	});

	$("#multiple_file_uploader").uploadFile({
		url:"' . $this->createUrl('uploads') . '",
		fileName:"myfile",
		multiple : true,
		showStatusAfterSuccess : false,
		maxFileCount : 3,
		maxFileSize: 3150000,
		acceptFiles : "image/*",
		allowedTypes : "jpg,jpeg,png,gif",
		showProgress : true,
		statusBarWidth: "100%",
		dragDropStr: "วางที่นี่",
		onSuccess: function (files, response, xhr) {
			tinymce.get("' . CHtml::activeId($model, 'n_body') . '").execCommand(\'mceInsertContent\', false, \'<img src="' . Yii::app()->baseUrl . '/images/\' + response + \'" style="display: block; margin-left: auto; margin-right: auto;" />\');
		},
		onError: function () {
			alert("มีบางอย่างผิดพลาด โปรดลองใหม่!");
		}
	});

	$("#thumb_file_uploader").uploadFile({
		url:"' . $this->createUrl('uploadthumb') . '",
		fileName:"myfile",
		multiple : false,
		showStatusAfterSuccess : false,
		maxFileCount : 1,
		acceptFiles : "image/*",
		allowedTypes : "jpg,jpeg,png,gif",
		showProgress : false,
		statusBarWidth: "100%",
		dragDropStr: "",
		onSuccess: function (files, response, xhr) {
			$("#cover_preview").html("<img src=\"' . Yii::app()->baseUrl . '/images/n_" + response + "\" width=\"100%\" />");
			$("#' . CHtml::activeId($model, 'n_thumbnail') . '").val(response);
		},
		onError: function () {
			alert("มีบางอย่างผิดพลาด โปรดลองใหม่!");
		}
	});

	$("#addattach").click(function(){
		$("#area_attach").append(\'<div class="row attach">\' + 
			\'<div class="col-md-12">\' + 
				\'<div class="form-group">\' + 
					\'<input type="file" name="Attachment[file][]" class="file-attach">\' + 
				\'</div>\' + 
			\'</div>\' + 
			\'<div class="col-md-9">\' + 
				\'<div class="form-group">\' + 
					\'<input type="text" name="Attachment[name][]" class="name-attach form-control" maxlength="120" placeholder="ใส่ชื่อไฟล์">\' + 
				\'</div>\' + 
			\'</div>\' + 
			\'<div class="col-md-3">\' + 
				\'<div class="form-group">\' + 
					\'<button type="button" class="btn btn-danger btn-flat attachremove"><i class="fa fa-times"></i></button>\' + 
				\'</div>\' + 
			\'</div>\' + 
		\'</div>\');

		$("#area_attach").on("click",".attachremove",function(){
			$(this).parent().parent().parent().remove();
		});

		$("#area_attach").on("change",".file-attach",function(){
			var fileExtension = ["doc", "docx", "pdf", "ppt", "pptx", "pps", "ppsx", "xls", "xlsx", "zip", "rar"];
			var file = $(this)[0].files[0];
			if (file && $.inArray($(this).val().split(".").pop().toLowerCase(), fileExtension) == -1){
				alert("ประเภทไฟล์ที่อนุญาต " + "doc, docx, pdf, ppt, pptx, pps, ppsx, xls, xlsx, zip, rar");
				$(this).val("");
			}
		});
	});

	$(".oldremove").click(function(){
		$("#old" + $(this).attr("id")).remove();
	});
');
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'news-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array(
			'role' => 'form',
			'enctype' => 'multipart/form-data'
		)
	)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-md-9">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'n_title'); ?>
				<?php echo $form->textField($model, 'n_title', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'n_title'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model, 'n_body'); ?>
				<div id="multiple_file_uploader">อัพโหลดรูปภาพ</div>
			</div>

			<div class="form-group">
				<?php echo $form->textArea($model, 'n_body', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
				<?php echo $form->error($model, 'n_body'); ?>
			</div>

		</div>
		<div class="col-md-3">

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

			<div class="form-group">
				<?php echo $form->labelEx($model, 'n_thumbnail'); ?>
				<div id="thumb_file_uploader">เลือกภาพ</div>
				<?php echo $form->hiddenField($model, 'n_thumbnail'); ?>
				<br />
				<div id="cover_preview"><img src="<?php echo $model->isNewRecord ? Yii::app()->theme->baseUrl . '/images/noimg.png' : Yii::app()->baseUrl . '/images/n_' . $model->n_thumbnail; ?>" width="100%" /></div>
			</div>

			<div class="form-group">
				<label>ไฟล์แนบ</label>
				<div id="area_attach">
					<?php
					foreach ($attachments as $a) {
						echo '
						<div class="row attach" id="old', $a->a_id, '">
							<div class="col-md-12">
								<i class="fa fa-times text-red oldremove" id="', $a->a_id, '"></i> <a href="', $this->createUrl('site/attr', array('id' => $a->a_id)), '" target="_blank">', $a->a_name, '.', $a->a_type, '</a>
								<input type="hidden" name="Attachment[a_filename][]" value="', $a->a_filename, '">
								<input type="hidden" name="Attachment[a_name][]" value="', $a->a_name, '" maxlength="120">
								<input type="hidden" name="Attachment[a_type][]" value="', $a->a_type, '">
								<input type="hidden" name="Attachment[a_size][]" value="', $a->a_size, '">
								<input type="hidden" name="Attachment[a_order][]" value="', $a->a_order, '">
								<input type="hidden" name="Attachment[n_id][]" value="', $a->n_id, '">
							</div>
						</div>';
					}
					?>
				</div>
			</div>

			<div class="form-group">
				<input type="button" value="+ เพิ่มไฟล์แนบ" id="addattach" class="btn btn-warning btn-sm btn-flat">
			</div>

			<div class="form-group text-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึกการแก้ไข', array('class' => 'btn btn-success btn-flat btn-lg')); ?>
			</div>

		</div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->