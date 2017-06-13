<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */


$this->breadcrumbs=array(
	'Pengajuan'=>array('index'),
	'Bootcamp'=>array('index'),
	'Audit'
);

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

<h1>Pengajuan Audit</h1>

<!-- ------------------------NEW CODE----------------------------- -->
<?php
	// Check IE browser
	$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
?>

<?php
	if(Yii::app()->user->checkAccess('MITRA') && empty($typeAudit)){
		echo "<span id='pengajuanAudit'>";
		echo CHtml::link(TbHtml::icon(TbHtml::ICON_PLUS_SIGN).' Add new pengajuan','#',array('onclick'=>'if(confirm("Are you sure?")){$.post("'.Yii::app()->createUrl('pengajuan/addAudit').'", {id:'.$model->parent.'}, function(data) {$.fn.yiiGridView.update("pengajuan-grid"); $("#pengajuanAudit").hide()}, "html");} return false;', 'class' => 'btn btn-success'));
		?><br /><br /></span><?php
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
	'dataProvider'=>$model->searchAudit(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'mitra',
		'updated',
		'type',
		'audits.countParty',
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
			'template'=>"{changeStatus}{viewAudit}{addAudit}{editAudit}{upload}{view}{delete}",
			'htmlOptions' => array('style' => 'white-space: nowrap'),
			'afterDelete'=>'function(link,success,data){window.parent.$("#pengajuanAudit").show()}',
            //--------------------- begin new code --------------------------
            'buttons'=>array(
						'changeStatus'=>
                            array(
									'label'=>'Change Status',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/accept.png',
									'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id,"scenario"=>"changeStatusAudit"))',
									'visible'=>'!empty($data->bukti_bayar) && $data->status_bayar==0 && Yii::app()->user->checkAccess("KORD. AUDITOR")',
									'options' => array('confirm' => 'Are you sure?'),
                                ),
						'addAudit'=>
                            array(
									'label'=>'Create Audit',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/cup_add.png',
									'url'=>'$this->grid->controller->createUrl("audit/create", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
									'visible'=>'empty($data->audits) && !empty($data->bukti_bayar) && $data->status_bayar==1 && Yii::app()->user->checkAccess("KORD. AUDITOR")',
									'click'=>$updateClick,
									'options'=>$options,
                                ),
						'editAudit'=>
                            array(
									'label'=>'Update Audit',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/cup_edit.png',
									'url'=>'$this->grid->controller->createUrl("audit/update", array("id"=>$data->audits->id,"asDialog"=>1,"gridId"=>$this->grid->id))',
									'visible'=>'!empty($data->audits) && Yii::app()->user->checkAccess("KORD. AUDITOR")',
									'click'=>$updateClick,
									'options'=>$options,
                                ),
						'viewAudit'=>
                            array(
									'label'=>'View Audit',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/cup.png',
									'url'=>'$this->grid->controller->createUrl("audit/view", array("id"=>$data->audits->id,"asDialog"=>1,"gridId"=>$this->grid->id))',
									'visible'=>'!empty($data->audits) && (Yii::app()->user->checkAccess("KORD. AUDITOR") || Yii::app()->user->checkAccess("MITRA"))',
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