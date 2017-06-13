<?php
/* @var $this MitraController */
/* @var $model Mitra */
?>

<?php
$this->breadcrumbs=array(
	'Mitras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mitra', 'url'=>array('index')),
	array('label'=>'Create Mitra', 'url'=>array('create')),
	array('label'=>'View Mitra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Mitra', 'url'=>array('admin')),
);
?>

    <h1>Update Mitra <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>