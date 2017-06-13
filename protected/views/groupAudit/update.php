<?php
/* @var $this GroupAuditController */
/* @var $model GroupAudit */
?>

<?php
$this->breadcrumbs=array(
	'Group Audits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GroupAudit', 'url'=>array('index')),
	array('label'=>'Create GroupAudit', 'url'=>array('create')),
	array('label'=>'View GroupAudit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GroupAudit', 'url'=>array('admin')),
);
?>

    <h1>Update GroupAudit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>