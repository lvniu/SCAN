<?php
$this->pageTitle=Yii::app()->name . ' - register';
$this->breadcrumbs=array(
	'register',
);
?>

<h1>注  册</h1>


<div class="form">
<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableAjaxValidation'=true,
));  */?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'register-form',
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
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="login_row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="login_row">
		<?php echo $form->labelEx($model,'repassword'); ?>
		<?php echo $form->passwordField($model,'repassword'); ?>
		<?php echo $form->error($model,'repassword'); ?>
	</div>


	<div class="register_row submit">
		<?php  echo CHtml::submitButton('注册',array('class'=>'btn btn-big btn-primary')); ?>
	</div>

	<div>
	   <a href="./index.php?r=businessInf/login" class="f4">登录</a>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->