<div class="row">
    <div class="col-12 col-md-3 mt-3">
        <a href="<?php echo $this->createUrl('site/view', array('id' => $data->n_id)); ?>">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/n_<?php echo $data->n_thumbnail; ?>" class="img-fluid" alt="<?php echo $data->n_thumbnail; ?>">
        </a>
    </div>
    <div class="col-12 col-md-9 mt-3">
        <a class="text-dark" href="<?php echo $this->createUrl('site/view', array('id' => $data->n_id)); ?>">
            <h5 class="cat-text"><?php echo $data->n_title; ?></h5>
        </a>
        <p class="text-muted">วันที่: <?php echo ps::dateOut($data->n_datetime, 'medium', 'short'); ?> / อ่านแล้ว <?php echo number_format($data->n_views); ?> ครั้ง</p>
    </div>
</div>