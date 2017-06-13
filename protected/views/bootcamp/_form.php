<?php
/* @var $this BootcampController */
/* @var $model Bootcamp */
/* @var $form TbActiveForm */
?>

<!-- ------------------------NEW CODE----------------------------- -->
<style>
	.modal-body{
		height:250px;
	}
</style>
<!-- ------------------------NEW CODE----------------------------- -->

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'bootcamp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php //echo $form->textFieldControlGroup($model,'tgl_mulai',array('span'=>5)); ?>
            <?php echo $form->labelEx($model,'tgl_mulai'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'name'=>'tgl_mulai',
						'attribute'=>'tgl_mulai', // Model attribute filed which hold user input
					  	'model'=>$model,            // Model name
					  	'language'=>'en',
					  	'value'=>date('Y-m-d'),
					  	'options'=>array(
							'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
							'dateFormat'=>'yy-mm-dd',//Date format 'mm/dd/yy','yy-mm-dd','d M, y','d MM, y','DD, d MM, yy'
						),
					  	'htmlOptions'=>array(
							'span'=>'5'
						),
					)
			);?>
			<?php echo $form->error($model,'tgl_mulai'); ?>


            <?php //echo $form->textFieldControlGroup($model,'tgl_selesai',array('span'=>5)); ?>
            <?php echo $form->labelEx($model,'tgl_selesai'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
					  'name'=>'tgl_selesai',
					  'attribute'=>'tgl_selesai', // Model attribute filed which hold user input
					  'model'=>$model,            // Model name
					  'language'=>'en',
					  'value'=>date('Y-m-d'),
					  'options'=>array(
							'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
							'dateFormat'=>'yy-mm-dd',//Date format 'mm/dd/yy','yy-mm-dd','d M, y','d MM, y','DD, d MM, yy'
						),
					)
			);?>
			<?php echo $form->error($model,'tgl_selesai'); ?>

            <?php echo $form->textFieldControlGroup($model,'lokasi',array('span'=>5,'maxlength'=>100)); ?>

            <?php //echo $form->textFieldControlGroup($model,'pengajuan',array('span'=>5,'maxlength'=>10)); ?>
            <?php echo $form->hiddenField($model,'pengajuan'); ?>

            <?php //echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>
			
            <?php //echo $form->textFieldControlGroup($model,'instruktur',array('span'=>5,'maxlength'=>10)); ?>
            
            <?php
				// Check IE browser
				$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
				$createUrls = $this->createUrl('instruktur/admin',array("asDialog"=>1,"gridId"=>'pengajuan-grid'));
				// IE
				if ($msie) {
					$onclickCreates = array('onclick'=>"$('#instruktur-frame').attr('src','$createUrls '); $('#instruktur-dialog').dialog('open');", 'class' => 'btn btn-success');
				}else{
					$onclickCreates = array('onclick'=>"$('#new-instruktur-frame').attr('src','$createUrls ');", 'data-toggle' => 'modal', 'data-target' => '#instruktur', 'class' => 'btn btn-success');
				}
				echo $form->labelEx($model,'instruktur');
				echo "Nama : ".CHtml::textField('Bootcamp[instruktur_name]',$model->instruktur0->nama,array('id'=>'instruktur_name','class'=>'span5','readonly'=>true));
				echo "Alamat : ".CHtml::textField('Bootcamp[instruktur_address]',$model->instruktur0->alamat,array('id'=>'instruktur_address','class'=>'span5','disabled'=>true));
				echo "Telp : ".CHtml::textField('Bootcamp[instruktur_telp]',$model->instruktur0->telp,array('id'=>'instruktur_telp','class'=>'span5','disabled'=>true));
				echo "Email : ".CHtml::textField('Bootcamp[instruktur_email]',$model->instruktur0->email,array('id'=>'instruktur_email','class'=>'span5','disabled'=>true));
				echo " ";
				echo CHtml::link(TbHtml::icon(TbHtml::ICON_PLUS_SIGN).' Add Instruktur','#',$onclickCreates);
				echo $form->hiddenField($model,'instruktur');
				echo $form->error($model,'instruktur');
			?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php 
	$this->widget('bootstrap.widgets.TbModal', array(
		'id' => 'instruktur',
		'header' => 'Bootstrap Modal',
		'content' => '<iframe id="new-instruktur-frame" width="100%" height="100%" frameBorder="0"></iframe>',
	)); 
?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'instruktur-dialog',
    'options'=>array(
        'title'=>'Jquery Modal',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>300,
    ),
    ));
	?>
	<iframe id="instruktur-frame" width="100%" height="100%"></iframe>
	<?php
 
	$this->endWidget();
//--------------------- end new code --------------------------
?>