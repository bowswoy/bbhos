<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - เข้าสู่ระบบ';
$this->breadcrumbs = array(
    'เข้าสู่ระบบ',
);
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/plugins/iCheck/square/blue.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/plugins/iCheck/icheck.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('myjquery', "
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
");
?>
<div class="login-box">

    <div class="login-logo">
        <a href="<?php echo $this->createUrl('site/login'); ?>"><b>BBHos</b> Admin</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

        <div class="form-group has-feedback">
            <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('username'), 'autocomplete' => 'off')); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="form-group has-feedback">
            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('password'), 'autocomplete' => 'off')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        <?php if ($model->scenario == 'withCaptcha' && CCaptcha::checkRequirements()) : ?>
            <div class="form-group has-feedback">
                <div class="row">
                    <div class="col-md-12">
                        <?php $this->widget('CCaptcha'); ?>
                        <?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control', 'placeholder' => 'ใส่ข้อความที่ปรากฎ')); ?>
                        <?php echo $form->error($model, 'verifyCode'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label><?php echo $form->checkBox($model, 'rememberMe'); ?> <?php echo $model->getAttributeLabel('rememberMe'); ?></label>
                </div>
            </div>
            <div class="col-xs-4">
                <?php echo CHtml::submitButton('เข้าสู่ระบบ', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>