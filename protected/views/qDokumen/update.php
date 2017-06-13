<?php
/* @var $this QDokumenController */
/* @var $model QDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Qdokumens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QDokumen', 'url'=>array('index')),
	array('label'=>'Create QDokumen', 'url'=>array('create')),
	array('label'=>'View QDokumen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QDokumen', 'url'=>array('admin')),
);
?>

    <h1>Update QDokumen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>