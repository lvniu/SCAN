<?php
/* @var $this BusinessInfController */
/* @var $model BusinessInf */

$this->breadcrumbs=array(
	'Business Infs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusinessInf', 'url'=>array('index')),
	array('label'=>'Create BusinessInf', 'url'=>array('create')),
	array('label'=>'View BusinessInf', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BusinessInf', 'url'=>array('admin')),
);
?>

<h1>Update BusinessInf <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>