<?php
/* @var $this GroupAuditController */
/* @var $model GroupAudit */
?>

<?php
$this->breadcrumbs=array(
	'Group Audits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GroupAudit', 'url'=>array('index')),
	array('label'=>'Create GroupAudit', 'url'=>array('create')),
	array('label'=>'Update GroupAudit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GroupAudit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GroupAudit', 'url'=>array('admin')),
);
?>

<h1>View GroupAudit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'audit',
		'auditor',
		'updated',
	),
)); ?>