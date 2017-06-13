<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */


$this->breadcrumbs=array(
	'Pengajuan'=>array('index'),
	'Bootcamp',
);

$this->menu=array(
	array('label'=>'List Pengajuan', 'url'=>array('index')),
	array('label'=>'Create Pengajuan', 'url'=>array('create')),
);

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pengajuan-grid').yiiGridView('update', {
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

<h1>Pengajuan Bootcamp</h1>

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
	if(Yii::app()->user->checkAccess('MITRA')){
		$createUrl = $this->createUrl('create',array("asDialog"=>1,"gridId"=>'pengajuan-grid'));
		// IE
		if ($msie) {
			$onclickCreate = array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');", 'class' => 'btn btn-success');
		}else{
			$onclickCreate = array('onclick'=>"$('#new-cru-frame').attr('src','$createUrl ');", 'data-toggle' => 'modal', 'data-target' => '#modal', 'class' => 'btn btn-success');
		}
		echo CHtml::link(TbHtml::icon(TbHtml::ICON_PLUS_SIGN).' Add new pengajuan','#',$onclickCreate);
		?><br /><br /><?php
	}
?>

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
<!-- ------------------------NEW CODE----------------------------- -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pengajuan-grid',
	'type' => array(TbHtml::GRID_TYPE_BORDERED, TbHtml::GRID_TYPE_STRIPED, TbHtml::GRID_TYPE_HOVER),
	'dataProvider'=>$model->searchBootcamp(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'mitra',
		'updated',
		'type',
		'countParty',
		//'status_bayar',
		array(            
            'name'=>'status_bayar',
            'type'=>'raw', //because of using html-code
            'value'=>'$data->status_bayar==0 ? TbHtml::labelTb("Belum Bayar", array("color" => TbHtml::LABEL_COLOR_WARNING)) : TbHtml::labelTb("Sudah Bayar", array("color" => TbHtml::LABEL_COLOR_SUCCESS))', //call this controller method for each row
        ),
		//'bukti_bayar',
		array(            
            'name'=>'bukti_bayar',
            'type'=>'raw', //because of using html-code
            'value'=>'!empty($data->bukti_bayar) ? TbHtml::labelTb("Ada", array("color" => TbHtml::LABEL_COLOR_SUCCESS)) : TbHtml::labelTb("Belum Ada", array("color" => TbHtml::LABEL_COLOR_WARNING));', //call this controller method for each row
        ),
		array(
            'class'=>$buttonColumn,
			'template'=>"{pengajuanAudit}{checkDokumen}{changeStatus}{viewBootcamp}{addBootcamp}{editBootcamp}{upload}{view}{update}{delete}",
			'htmlOptions' => array('style' => 'white-space: nowrap'),
            //--------------------- begin new code --------------------------
            'buttons'=>array(
						'pengajuanAudit'=>
                            array(
									'label'=>'Ajukan Audit',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/book_open.png',
									'url'=>'$this->grid->controller->createUrl("audit", array("id"=>$data->bootcamps->id))',
									'visible'=>'!empty($data->bootcamps->bootcampDokumens) && (Yii::app()->user->checkAccess("MITRA") || Yii::app()->user->checkAccess("KORD. AUDITOR"))',
                                ),
						'checkDokumen'=>
                            array(
									'label'=>'Check Dokumen',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/book.png',
									'url'=>'$this->grid->controller->createUrl("checkDocument", array("id"=>$data->bootcamps->id))',
									'visible'=>'!empty($data->bootcamps) && (Yii::app()->user->checkAccess("MGR. Q&A") || Yii::app()->user->checkAccess("KORD. AUDITOR") || Yii::app()->user->checkAccess("MITRA"))',
                                ),
						'changeStatus'=>
                            array(
									'label'=>'Change Status',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/accept.png',
									'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id,"scenario"=>"changeStatusBootcamp"))',
									'visible'=>'!empty($data->bukti_bayar) && $data->status_bayar==0 && Yii::app()->user->checkAccess("ADMIN MARKETING")',
									'options' => array('confirm' => 'Are you sure?'),
                                ),
						'addBootcamp'=>
                            array(
									'label'=>'Create Bootcamp',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/cup_add.png',
									'url'=>'$this->grid->controller->createUrl("bootcamp/create", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
									'visible'=>'empty($data->bootcamps) && !empty($data->bukti_bayar) && $data->status_bayar==1 && Yii::app()->user->checkAccess("ADMIN MARKETING")',
									'click'=>$updateClick,
									'options'=>$options,
                                ),
						'editBootcamp'=>
                            array(
									'label'=>'Update Bootcamp',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/cup_edit.png',
									'url'=>'$this->grid->controller->createUrl("bootcamp/update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
									'visible'=>'!empty($data->bootcamps) && Yii::app()->user->checkAccess("ADMIN MARKETING")',
									'click'=>$updateClick,
									'options'=>$options,
                                ),
						'viewBootcamp'=>
                            array(
									'label'=>'View Bootcamp',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/cup.png',
									'url'=>'$this->grid->controller->createUrl("bootcamp/view", array("id"=>$data->bootcamps->id,"asDialog"=>1,"gridId"=>$this->grid->id))',
									'visible'=>'!empty($data->bootcamps) && (Yii::app()->user->checkAccess("ADMIN MARKETING") || Yii::app()->user->checkAccess("MITRA"))',
									'click'=>$updateClick,
									'options'=>$options,
                                ),
						'upload'=>
                            array(
									'label'=>'Upload',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/drive_go.png',
									'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id,"scenario"=>"upload"))',
                                    'click'=>$updateClick,
									'options'=>$options,
									'visible'=>'$data->status_bayar==0 && Yii::app()->user->checkAccess("MITRA")',
                                ),
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
									'visible'=>'$data->status_bayar==0 && Yii::app()->user->checkAccess("MITRA")',
                                ),
						'delete'=>
                            array(
									'visible'=>'$data->status_bayar==0 && Yii::app()->user->checkAccess("MITRA")',
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
		//'htmlOptions' => array('class' => 'modal-sm')
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