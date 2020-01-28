<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
  Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap/dist/css/bootstrap.min.css');
  Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/font-awesome/css/font-awesome.min.css');
  Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/bower_components/Ionicons/css/ionicons.min.css');
  Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/dist/css/AdminLTE.min.css');
  Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/dist/css/skins/_all-skins.min.css');
  Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/index.css');
  ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php
    if (Yii::app()->user->hasFlash('result')) {
      $flash_msg = explode('::', Yii::app()->user->getFlash('result'));
    ?>
      <div class="top-alert">
        <div class="alert alert-<?php echo $flash_msg[0]; ?> alert-dismissible fade in" role="alert">
          <i class="glyphicon glyphicon-<?php echo $flash_msg[0] == 'success' ? 'ok' : 'exclamation-sign'; ?>"></i>&nbsp; <?php echo $flash_msg[1]; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      </div>
    <?php
    }
    ?>

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo Yii::app()->getbaseUrl(true); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>BBH</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>BBHos</b> Admin</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if (Yii::app()->user->isGuest || !isset(Yii::app()->user->detail)) { ?>
              <li class="user user-menu">
                <a href="<?php echo $this->createUrl('site/login'); ?>">
                  <span class="hidden-xs">บุคคลทั่วไป เข้าสู่ระบบ</span>
                </a>
              </li>
            <?php } else { ?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo Yii::app()->user->detail->u_fullname; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      <?php echo Yii::app()->user->detail->u_position; ?>
                      <small><?php echo Yii::app()->user->detail->u_department; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo $this->createUrl('user/profile'); ?>" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo $this->createUrl('site/logout'); ?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
                    </div>
                  </li>
                </ul>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">เมนูการใช้งาน</li>
          <li><a href="<?php echo Yii::app()->getbaseUrl(true); ?>"><i class="fa fa-home text-red"></i> <span>หน้าหลัก</span></a></li>
          <li><a href="<?php echo $this->createUrl('news/index'); ?>"><i class="fa fa-plus-circle text-white"></i> <span>ข่าวสาร</span></a></li>
          <li><a href="<?php echo $this->createUrl('category/index'); ?>"><i class="fa fa-folder text-white"></i> <span>หมวดหมู่</span></a></li>
          <li><a href="<?php echo $this->createUrl('user/index'); ?>"><i class="fa fa-users text-white"></i> <span>ผู้ใช้งาน</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <?php if (isset($this->breadcrumbs)) : ?>
          <div>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
              'links' => $this->breadcrumbs,
              'homeLink' => '<li><a href="' . Yii::app()->getbaseUrl(true) . '"><i class="fa fa-home"></i> หน้าหลัก</a></li>',
              'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
              'inactiveLinkTemplate' => '<li class="active">{label}</li>',
              'tagName' => 'ol',
              'separator' => ' ',
              'htmlOptions' => array(
                'class' => 'breadcrumb'
              )
            )); ?>
            <!-- breadcrumbs -->
          </div>
        <?php endif ?>
      </section>

      <section class="content">
        <?php echo $content; ?>
      </section>

    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        &copy; <?php echo date('Y'); ?>
      </div>
      <strong>พัฒนาโดย xxx</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <?php
  Yii::app()->clientScript->coreScriptPosition = CClientScript::POS_END;
  Yii::app()->clientScript->registerCoreScript('jquery');
  Yii::app()->clientScript->registerCoreScript('jquery.ui');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/bower_components/bootstrap/dist/js/bootstrap.min.js', CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/dist/js/adminlte.min.js', CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/cookies.js', CClientScript::POS_END);
  Yii::app()->clientScript->registerScript('settheme', '
		$(".top-alert").delay(3000).fadeOut();
	');
  ?>
</body>

</html>