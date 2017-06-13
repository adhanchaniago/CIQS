<?php
/* @var $this AuditDokumenController */
/* @var $model AuditDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Audit Dokumens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuditDokumen', 'url'=>array('index')),
	array('label'=>'Create AuditDokumen', 'url'=>array('create')),
	array('label'=>'View AuditDokumen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AuditDokumen', 'url'=>array('admin')),
);
?>

    <h1>Update AuditDokumen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>