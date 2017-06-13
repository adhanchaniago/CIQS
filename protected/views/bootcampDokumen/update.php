<?php
/* @var $this BootcampDokumenController */
/* @var $model BootcampDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamp Dokumens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BootcampDokumen', 'url'=>array('index')),
	array('label'=>'Create BootcampDokumen', 'url'=>array('create')),
	array('label'=>'View BootcampDokumen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BootcampDokumen', 'url'=>array('admin')),
);
?>

    <h1>Update BootcampDokumen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>