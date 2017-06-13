<?php
/* @var $this AuditController */
/* @var $model Audit */
?>

<?php
$this->breadcrumbs=array(
	'Audits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Audit', 'url'=>array('index')),
	array('label'=>'Create Audit', 'url'=>array('create')),
	array('label'=>'View Audit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Audit', 'url'=>array('admin')),
);
?>

    <h1>Update Audit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelGroupAudit'=>$modelGroupAudit)); ?>