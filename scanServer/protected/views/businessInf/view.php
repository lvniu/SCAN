<?php
/* @var $this BusinessInfController */
/* @var $model BusinessInf */

$this->breadcrumbs=array(
	'Business Infs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BusinessInf', 'url'=>array('index')),
	array('label'=>'Create BusinessInf', 'url'=>array('create')),
	array('label'=>'Update BusinessInf', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BusinessInf', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BusinessInf', 'url'=>array('admin')),
);
?>

<h1>View BusinessInf #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_name',
		'company_name',
		'activity_name',
		'telephone',
	),
)); ?>
