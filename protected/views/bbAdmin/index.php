<?php
/* @var $this BbAdminController */

$this->breadcrumbs = array(
	'ผู้ดูแลระบบ',
);
?>

<h4>ผู้ดูแลระบบ</h4>
<p>&nbsp;</p>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">เมนูการจัดการ</h3>
	</div>
	<div class="box-body">
		<a href="<?php echo $this->createUrl('news/index'); ?>" class="btn btn-app">
			<i class="fa fa-plus-circle"></i> ข่าวสาร
		</a>

		<a href="<?php echo $this->createUrl('category/index'); ?>" class="btn btn-app">
			<i class="fa fa-folder"></i> หมวดหมู่
		</a>

		<a href="<?php echo $this->createUrl('user/index'); ?>" class="btn btn-app">
			<i class="fa fa-users"></i> ผู้ใช้งาน
		</a>
	</div>
</div>