<?php
$this->pageTitle = $category->c_name;
?>

<div class="container">
    <div class="mt-5 mb-1">
        <h1 class="view-title pt-5"><?php echo $category->c_name; ?></h1>
    </div>

    <div class="view-body text-dark">

        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $model->search(),
            'itemView' => '_item',
            'pagerCssClass' => 'pagination',
            'summaryText' => false,
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
        ));
        ?>

    </div>
</div>