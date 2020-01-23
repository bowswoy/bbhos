<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="container-fluid">
	<!-- Slide -->
	<div id="carousel_slide" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php $i = 0;
			foreach ($slide as $n) { ?>
				<li data-target="#carousel_slide" data-slide-to="<?php echo $i; ?>" <?php echo $i == 0 ? ' class="active"' : ''; ?>></li>
			<?php $i++;
			} ?>
		</ol>
		<div class="carousel-inner">
			<?php $i = 0;
			foreach ($slide as $n) { ?>
				<div class="carousel-item<?php echo $i == 0 ? ' active' : ''; ?>">
					<a href="<?php echo ps::validUrl($n->n_body) ? strip_tags($n->n_body) : $this->createUrl('site/view', array('id' => $n->n_id)); ?>">
						<img src="<?php echo Yii::app()->baseUrl; ?>/images/original_<?php echo $n->n_thumbnail; ?>" class="d-block w-100" alt="<?php echo $n->n_id; ?>">
					</a>
				</div>
			<?php $i++;
			} ?>
		</div>

		<a class="carousel-control-prev" href="#carousel_slide" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carousel_slide" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- Slide end -->
</div>


<div class="container">

	<div class="bg-head mt-4">
		<span>ข่าวสาร/ประชาสัมพันธ์</span>
	</div>

	<div class="row">
		<?php
		$i = 0;
		foreach ($news as $n) {
			$i++;
		?>
			<div class="col-6 col-md-3 mt-4<?php echo $i > 2 ? ' d-none d-md-block' : ''; ?>">
				<a href="<?php echo $this->createUrl('site/view', array('id' => $n->n_id)); ?>">
					<img src="<?php echo Yii::app()->baseUrl; ?>/images/n_<?php echo $n->n_thumbnail; ?>" class="img-fluid mb-2" alt="news <?php echo $n->n_id; ?>" />
				</a>
				<p>
					<a class="text-dark" href="<?php echo $this->createUrl('site/view', array('id' => $n->n_id)); ?>"><?php echo ps::subStr($n->n_title, 90); ?></a>
				</p>
			</div>
		<?php
		}
		?>
	</div>


	<div class="text-center">
		<a href="<?php echo $this->createUrl('site/category', array('id' => 2)); ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">ดูทั้งหมด <i class="fa fa-chevron-right"></i></a>
	</div>

	<div class="row">
		<div class="col-md-5 mt-4">
			<div class="bg-head-sm mb-4">
				<span>ประกาศนียบัตร</span>
			</div>

			<div id="cert_slide" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php $i = 0;
					foreach ($cert as $n) { ?>
						<li data-target="#cert_slide" data-slide-to="<?php echo $i; ?>" <?php echo $i == 0 ? ' class="active"' : ''; ?>></li>
					<?php $i++;
					} ?>
				</ol>
				<div class="carousel-inner">
					<?php $i = 0;
					foreach ($cert as $n) { ?>
						<div class="carousel-item<?php echo $i == 0 ? ' active' : ''; ?>">
							<a href="<?php echo ps::validUrl($n->n_body) ? strip_tags($n->n_body) : $this->createUrl('site/view', array('id' => $n->n_id)); ?>">
								<img src="<?php echo Yii::app()->baseUrl; ?>/images/original_<?php echo $n->n_thumbnail; ?>" class="d-block w-100" alt="<?php echo $n->n_id; ?>">
							</a>
						</div>
					<?php $i++;
					} ?>
				</div>

				<a class="carousel-control-prev" href="#cert_slide" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#cert_slide" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

		</div>
		<div class="col-md-7 mt-4 mb-4">
			<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ข่าวจัดซื้อจัดจ้าง</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ข่าวรับสมัครงาน</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="pt-2 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<ul class="bb-list ml-4">
						<?php
						foreach ($procurement as $n) {
						?>
							<li><a href="<?php echo $this->createUrl('site/view', array('id' => $n->n_id)); ?>"><?php echo $n->n_title; ?> (<?php echo ps::dateOut($n->n_datetime, 'medium', 'short'); ?>)</a></li>
						<?php } ?>
					</ul>

					<div class="text-right mt-3">
						<a href="<?php echo $this->createUrl('site/category', array('id' => 4)); ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">ดูทั้งหมด <i class="fa fa-chevron-right"></i></a>
					</div>

				</div>
				<div class="pt-2 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<ul class="bb-list ml-4">
						<?php
						foreach ($job as $n) {
						?>
							<li><a href="<?php echo $this->createUrl('site/view', array('id' => $n->n_id)); ?>"><?php echo $n->n_title; ?> (<?php echo ps::dateOut($n->n_datetime, 'medium', 'short'); ?>)</a></li>
						<?php } ?>
					</ul>

					<div class="text-right mt-3">
						<a href="<?php echo $this->createUrl('site/category', array('id' => 5)); ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">ดูทั้งหมด <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="bg-head-sm mt-4">
		<span>หน่วยงานที่เกี่ยวข้อง</span>
	</div>

	<div class="row">
		<?php
		foreach ($banner as $n) {
		?>
			<div class="col-6 mt-3 col-md-3 mt-2">
				<a href="<?php echo ps::validUrl($n->n_body) ? strip_tags($n->n_body) : $this->createUrl('site/view', array('id' => $n->n_id)); ?>" target="_blank">
					<img src="<?php echo Yii::app()->baseUrl; ?>/images/original_<?php echo $n->n_thumbnail; ?>" class="img-fluid" />
				</a>
			</div>
		<?php } ?>
	</div>
</div>