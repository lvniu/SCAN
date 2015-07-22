<?php
/* @var $this BusinessInfController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Infs',
);

$this->menu=array(
	array('label'=>'Create BusinessInf', 'url'=>array('create')),
	array('label'=>'Manage BusinessInf', 'url'=>array('admin')),
);
?>

<h1>Business Infs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
