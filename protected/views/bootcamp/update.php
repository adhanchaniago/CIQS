<?php
/* @var $this BootcampController */
/* @var $model Bootcamp */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bootcamp', 'url'=>array('index')),
	array('label'=>'Create Bootcamp', 'url'=>array('create')),
	array('label'=>'View Bootcamp', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bootcamp', 'url'=>array('admin')),
);
?>

    <h1>Update Bootcamp <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>