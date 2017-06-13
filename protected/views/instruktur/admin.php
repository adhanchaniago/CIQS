<?php
/* @var $this InstrukturController */
/* @var $model Instruktur */


$this->breadcrumbs=array(
	'Instruktur'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Instruktur', 'url'=>array('index')),
	array('label'=>'Create Instruktur', 'url'=>array('create')),
);

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#instruktur-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<!-- ------------------------NEW CODE----------------------------- -->
<script>
	$(document).ready(function() {
		$('#modal').on('shown', function() {
			window.parent.$('body').css('overflow','hidden');
		});
		$('#modal').on('hidden', function () {
			window.parent.$('body').css('overflow','auto');
		});
	});
</script>

<style>
	.modal-body{
		height:550px;
	}
</style>
<!-- ------------------------NEW CODE----------------------------- -->

<h1>Instruktur</h1>

<?php /*?><p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --><?php */?>

<!-- ------------------------NEW CODE----------------------------- -->
<?php
	// Check IE browser
	$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
?>

<?php
	if($model['scenario'] != 'choose'){
		$createUrl = $this->createUrl('create',array("asDialog"=>1,"gridId"=>'instruktur-grid'));
		// IE
		if ($msie) {
			$onclickCreate = array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');", 'class' => 'btn btn-success');
		}else{
			$onclickCreate = array('onclick'=>"$('#new-cru-frame').attr('src','$createUrl ');", 'data-toggle' => 'modal', 'data-target' => '#modal', 'class' => 'btn btn-success');
		}
		echo CHtml::link(TbHtml::icon(TbHtml::ICON_PLUS_SIGN).' Add new instruktur','#',$onclickCreate);
		?><br /><br /><?php
	}
?>

<?php
// IE
if ($msie) {
	$buttonColumn = 'CButtonColumn';
	$viewClick = 'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}';
	$updateClick = 'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}';
	$chooseClick = 'function(){window.parent.$("#Bootcamp_instruktur").val($(this).parent().parent().children(":first-child").text()); window.parent.$("#instruktur_name").val($(this).parent().parent().children(":nth-child(2)").text()); window.parent.$("#instruktur_address").val($(this).parent().parent().children(":nth-child(3)").text()); window.parent.$("#instruktur_telp").val($(this).parent().parent().children(":nth-child(4)").text()); window.parent.$("#instruktur_email").val($(this).parent().parent().children(":nth-child(5)").text()); window.parent.$("#instruktur-dialog").dialog("close"); window.parent.$("#instruktur-frame").attr("src",""); return false;}';
	$options = array();
}else{
	$buttonColumn = 'bootstrap.widgets.TbButtonColumn';
	$viewClick = 'function(){$("#new-cru-frame").attr("src",$(this).attr("href"));  return false;}';
	$updateClick = 'function(){$("#new-cru-frame").attr("src",$(this).attr("href"));  return false;}';
	$chooseClick = 'function(){window.parent.$("#Bootcamp_instruktur").val($(this).parent().parent().children(":first-child").text()); window.parent.$("#instruktur_name").val($(this).parent().parent().children(":nth-child(2)").text()); window.parent.$("#instruktur_address").val($(this).parent().parent().children(":nth-child(3)").text()); window.parent.$("#instruktur_telp").val($(this).parent().parent().children(":nth-child(4)").text()); window.parent.$("#instruktur_email").val($(this).parent().parent().children(":nth-child(5)").text()); window.parent.$("#instruktur").modal("hide"); window.parent.$("#new-instruktur-frame").attr("src",""); return false;}';
	$options = array('data-toggle' => 'modal', 'data-target' => '#modal');
}
?>
<!-- ------------------------NEW CODE----------------------------- -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'instruktur-grid',
	'type' => array(TbHtml::GRID_TYPE_BORDERED, TbHtml::GRID_TYPE_STRIPED, TbHtml::GRID_TYPE_HOVER),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama',
		'alamat',
		'telp',
		'email',
		//'updated',
		array(
            'class'=>$buttonColumn,
			'template'=>"{choose}{view}{update}{delete}",
			'htmlOptions' => array('style' => 'white-space: nowrap'),
            //--------------------- begin new code --------------------------
            'buttons'=>array(
						'choose'=>
                            array(
									'label'=>'Choose this as instruktur',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/user_add.png',
                                    'url'=>'$this->grid->controller->createUrl("choose", array("id"=>$data->primaryKey))',
                                    'click'=>$chooseClick,
									'visible'=>'Yii::app()->user->checkAccess("ADMIN MARKETING")',
                                ),
						'view'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("view", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
                                    'click'=>$viewClick,
									'options'=>$options,
									'visible'=>'Yii::app()->user->checkAccess("ADMINISTRATOR")',
                                ),
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
                                    'click'=>$updateClick,
									'options'=>$options,
									'visible'=>'Yii::app()->user->checkAccess("ADMINISTRATOR")',
                                ),
						'delete'=>
                            array(
									'visible'=>'Yii::app()->user->checkAccess("ADMINISTRATOR")',
                                ),
			),
            //--------------------- end new code --------------------------
        ),
	),
)); ?>

<?php 
	$this->widget('bootstrap.widgets.TbModal', array(
		'id' => 'modal',
		'header' => 'Bootstrap Modal',
		'content' => '<iframe id="new-cru-frame" width="100%" height="100%" frameBorder="0"></iframe>',
	)); 
?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Jquery Modal',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>750,
        'height'=>400,
    ),
    ));
	?>
	<iframe id="cru-frame" width="100%" height="100%"></iframe>
	<?php
 
	$this->endWidget();
//--------------------- end new code --------------------------
?>