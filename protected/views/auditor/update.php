<?php
/* @var $this AuditorController */
/* @var $model Auditor */
?>

<?php
$this->breadcrumbs=array(
	'Auditors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Auditor', 'url'=>array('index')),
	array('label'=>'Create Auditor', 'url'=>array('create')),
	array('label'=>'View Auditor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Auditor', 'url'=>array('admin')),
);
?>

    <h1>Update Auditor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>