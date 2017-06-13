<?php
/* @var $this CdController */
/* @var $model Cd */
?>

<?php
$this->breadcrumbs=array(
	'Cds'=>array('index'),
	' '.$model->kode_cd=>array('view','id'=>$model->kode_cd),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cd', 'url'=>array('index')),
	array('label'=>'Create Cd', 'url'=>array('create')),
	array('label'=>'View Cd', 'url'=>array('view', 'id'=>$model->kode_cd)),
	array('label'=>'Manage Cd', 'url'=>array('admin')),
);
?>

    <h1>Update Cd <?php echo $model->kode_cd; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'asDialog'=>$_GET['asDialog'])); ?>