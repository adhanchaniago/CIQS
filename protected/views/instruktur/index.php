<?php
/* @var $this InstrukturController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Instrukturs',
);

$this->menu=array(
	array('label'=>'Create Instruktur','url'=>array('create')),
	array('label'=>'Manage Instruktur','url'=>array('admin')),
);
?>

<h1>Instrukturs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>