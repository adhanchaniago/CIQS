<?php
/* @var $this InstrukturController */
/* @var $model Instruktur */
?>

<?php
$this->breadcrumbs=array(
	'Instrukturs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Instruktur', 'url'=>array('index')),
	array('label'=>'Create Instruktur', 'url'=>array('create')),
	array('label'=>'Update Instruktur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Instruktur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Instruktur', 'url'=>array('admin')),
);
?>

<h1>View Instruktur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'nama',
		'alamat',
		'telp',
		'email',
		'updated',
	),
)); ?>