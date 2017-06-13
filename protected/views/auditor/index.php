<?php
/* @var $this AuditorController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Auditors',
);

$this->menu=array(
	array('label'=>'Create Auditor','url'=>array('create')),
	array('label'=>'Manage Auditor','url'=>array('admin')),
);
?>

<h1>Auditors</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>