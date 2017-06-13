<?php
/* @var $this CdController */
/* @var $model Cd */


$this->breadcrumbs=array(
	'Video'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cd', 'url'=>array('index')),
	array('label'=>'Create Cd', 'url'=>array('create')),
);

?>

<!-- NEW CODE -->
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
<!-- NEW CODE -->

<h1>Video</h1>

<style>
	.modal-body{
		height:350px;
	}
</style>

<?php
	// Check IE browser
	$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
?>

<?php
	$createUrl = $this->createUrl('create',array("asDialog"=>1,"gridId"=>'cd-grid'));
	// IE
	if ($msie) {
		$onclickCreate = array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');", 'class' => 'btn btn-success');
	}else{
		$onclickCreate = array('onclick'=>"$('#new-cru-frame').attr('src','$createUrl ');", 'data-toggle' => 'modal', 'data-target' => '#modal', 'class' => 'btn btn-success');
	}
	echo CHtml::link(TbHtml::icon(TbHtml::ICON_PLUS_SIGN).' Add new video','#',$onclickCreate);
?>

<?php
	$createUrl = $this->createUrl('admin',array("asDialog"=>1,"gridId"=>'cd-grid'));
	// IE
	if ($msie) {
		$onclickAdmin = array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');", 'class' => 'btn btn-info');
	}else{
		$onclickAdmin = array('onclick'=>"$('#new-cru-frame').attr('src','$createUrl ');", 'data-toggle' => 'modal', 'data-target' => '#modal', 'class' => 'btn btn-info');
	}
	echo CHtml::link(TbHtml::icon(TbHtml::ICON_LIST_ALT).' Sample popup cgridview','#',$onclickAdmin);
?>

<br /><br />

<?php
// IE
if ($msie) {
	$buttonColumn = 'CButtonColumn';
	$viewClick = 'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}';
	$updateClick = 'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}';
	$options = array();
}else{
	$buttonColumn = 'bootstrap.widgets.TbButtonColumn';
	$viewClick = 'function(){$("#new-cru-frame").attr("src",$(this).attr("href"));  return false;}';
	$updateClick = 'function(){$("#new-cru-frame").attr("src",$(this).attr("href"));  return false;}';
	$options = array('data-toggle' => 'modal', 'data-target' => '#modal');
}
?>

<?php 
	$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cd-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type' => array(TbHtml::GRID_TYPE_BORDERED, TbHtml::GRID_TYPE_STRIPED, TbHtml::GRID_TYPE_HOVER),
	'columns'=>array(
		'kode_cd',
		array(
			'name'=>'sampul',
			'filter'=>'',
			'type'=>'raw', 
			//'value'=>'CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/cd/sampul/$data->kode_cd", sampul, array("width"=>"50px")), array("cd/sampul/".$data->kode_cd))',
			'value'=>'CHtml::link(CHtml::image(Yii::app()->controller->createUrl("sampul", array("id"=>$data->kode_cd)), sampul, array("width"=>"50px")), array("cd/sampul/".$data->kode_cd))',
		),
		'judul',
		'kategori',
		'stok',
		'harga',
		array(
            'class'=>$buttonColumn,
            //--------------------- begin new code --------------------------
            'buttons'=>array(
						'view'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("view", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
                                    'click'=>$viewClick,
									'options'=>$options,
                                ),
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
                                    'click'=>$updateClick,
									'options'=>$options,
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