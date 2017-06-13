<?php
/* @var $this CdController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Cds',
);

$this->menu=array(
	array('label'=>'Create Cd','url'=>array('create')),
	array('label'=>'Manage Cd','url'=>array('admin')),
);
?>

<h1>Cds</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>