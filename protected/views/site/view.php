<?php
$this->pageTitle = $model->n_title;
?>

<div class="container">
    <div class="mt-5 mb-5">
        <h1 class="view-title pt-5"><?php echo $model->n_title; ?></h1>
        <p class="text-muted">วันที่: <?php echo ps::dateOut($model->n_datetime, 'medium', 'medium'); ?> / อ่านแล้ว <?php echo number_format($model->n_views); ?> ครั้ง</p>
    </div>

    <div class="view-body text-dark">
        <?php echo $model->n_body; ?>
    </div>

    <?php if (count($model->attachments)) { ?>
        <div class="mt-3">
            <h4>เอกสารแนบ</h4>
            <?php
            echo '
            <ul>';
            foreach ($model->attachments as $att) {
                echo '
                <li><a href="', $this->createUrl('site/attr', array('id' => $att->a_id)), '" target="_blank">', $att->a_name, '</a></li>';
            }
            echo '
            </ul>';
            ?>
        </div>
    <?php } ?>
</div>