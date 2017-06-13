<?php
/* @var $this AuditDokumenController */
/* @var $model AuditDokumen */


$this->breadcrumbs=array(
	'Audit Dokumens'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AuditDokumen', 'url'=>array('index')),
	array('label'=>'Create AuditDokumen', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#audit-dokumen-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Audit Dokumens</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'audit-dokumen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'audit',
		'temuan',
		'tindakan',
		'updated',
		'evidence',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>