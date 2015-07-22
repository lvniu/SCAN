<?php
/* @var $this BusinessInfController */
/* @var $model BusinessInf */

$this->breadcrumbs=array(
	'Business Infs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusinessInf', 'url'=>array('index')),
	array('label'=>'Manage BusinessInf', 'url'=>array('admin')),
);
?>

<h1>Create BusinessInf</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>