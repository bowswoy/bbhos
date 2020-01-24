<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap.min.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/vendor/fontawesome/css/all.min.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/index.css');
?>
<!DOCTYPE html>
<html lang="th" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="d-flex flex-column h-100">

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white box-shadow fixed-top" style="border-top: 2px solid #fdd005;">
            <div class="container">
                <a class="navbar-brand" href="<?php echo Yii::app()->getBaseUrl(true); ?>">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> โรงพยาบาลบึงบูรพ์
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo Yii::app()->getBaseUrl(true); ?>">หน้าแรก <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">เกี่ยวกับโรงพยาบาล</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ข่าวสาร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">บริการประชาชน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ติดต่อเรา</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="flex-shrink-0 mb-4">
        <?php echo $content; ?>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="top-footer border-bottom">
            <div class="container">
                <div class="pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>แนะนำโรงพยาบาล</h5>
                            <ul class="nav-list">
                                <li><a href="#">เกี่ยวกับโรงพยาบาล</a></li>
                                <li><a href="#">โครงสร้างการบริหารงาน</a></li>
                                <li><a href="#">ทำเนียบบุคลากร</a></li>
                                <li><a href="#">ที่อยู่/ช่องทางติดต่อ</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5>บริการประชาชน</h5>
                            <ul class="nav-list">
                                <li><a href="#">ผู้ป่วยนอก</a></li>
                                <li><a href="#">ผู้ป่วยอุบัติเหตุและฉุกเฉิน</a></li>
                                <li><a href="#">คลินิกเฉพาะ</a></li>
                                <li><a href="#">ทันตกรรม</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5>ข่าวสาร</h5>
                            <ul class="nav-list">
                                <li><a href="#">ประกาศ/แจ้งทราบ</a></li>
                                <li><a href="#">ประกวดราคา/จัดซื้อ-จัดจ้าง</a></li>
                                <li><a href="#">รับสมัครงาน</a></li>
                                <li><a href="#">สาระน่ารู้</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <b>โรงพยาบาลบึงบูรพ์</b> จังหวัดศรีสะเกษ<br /> โทร. 045-689043, 045-689317<br /> แจ้งอุบัติเหตุ โทร 1669, 045-689670
                            <div class="bb-social mt-3">
                                <span class="fab fa-facebook fa-2x"></span> &nbsp;&nbsp;
                                <span class="fas fa-rss-square fa-2x"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-3">
            <span class="text-muted">&copy; 2020</span>
        </div>
    </footer>
</body>

</html>

<?php
Yii::app()->clientScript->coreScriptPosition = CClientScript::POS_END;
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
