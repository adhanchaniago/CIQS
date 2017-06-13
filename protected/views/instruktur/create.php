<?php
/* @var $this InstrukturController */
/* @var $model Instruktur */
?>

<?php
$this->breadcrumbs=array(
	'Instrukturs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Instruktur', 'url'=>array('index')),
	array('label'=>'Manage Instruktur', 'url'=>array('admin')),
);
?>

<h1>Create Instruktur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>