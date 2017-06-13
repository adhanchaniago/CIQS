<?php
/* @var $this InstrukturController */
/* @var $model Instruktur */
?>

<?php
$this->breadcrumbs=array(
	'Instrukturs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instruktur', 'url'=>array('index')),
	array('label'=>'Create Instruktur', 'url'=>array('create')),
	array('label'=>'View Instruktur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Instruktur', 'url'=>array('admin')),
);
?>

    <h1>Update Instruktur <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>