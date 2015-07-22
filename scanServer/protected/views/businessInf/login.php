
<?php
$this->pageTitle=Yii::app()->name . ' - login';
$this->breadcrumbs=array(
	'login',
);
?>

<h1>账号登 录</h1>


<div class="form">
<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableAjaxValidation'=true,
));  */?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
	'enableAjaxValidation'=>true,
)); ?>

<!-- 	<p class="note">Fields with <span class="required">*</span> are required.</p> -->
</br></br>
	<div class="login_row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="login_row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
    <div class = "login_row">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->labelEx($model, 'rememberMe'); ?>
    </div>
	<div class="register_row submit">
		<?php  echo CHtml::submitButton('登录',array('class'=>'btn btn-big btn-primary')); ?>
	</div>

	<div>
	   还没有账号？<a href="./index.php?r=businessInf/register" class="f4">免费注册</a>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->