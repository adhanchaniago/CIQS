<?php
/* @var $this CdController */
/* @var $model Cd */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'cd-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldControlGroup($model,'judul',array('span'=>5,'maxlength'=>50)); ?>

        <?php echo $form->textFieldControlGroup($model,'kategori',array('span'=>5,'maxlength'=>25)); ?>

        <?php echo $form->textFieldControlGroup($model,'stok',array('span'=>5)); ?>

        <?php echo $form->textFieldControlGroup($model,'harga',array('span'=>5)); ?>
        
        <?php echo $form->fileFieldControlGroup($model,'sampul', array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
            'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
        <?php
            // Check IE browser
            $msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
            // IE
            if ($msie) {
                $onclick = "window.parent.$('#cru-dialog').dialog('close');window.parent.$('#cru-frame').attr('src','');";
            }else{
                $onclick = "window.parent.$('#modal').modal('hide');window.parent.$('#new-cru-frame').attr('src','');";
            }
        ?>
        <?php 
			if(isset($asDialog)){
				if($asDialog == 1){
					echo TbHtml::button('Cancel',array(
					'onclick'=>$onclick,
					'color'=>TbHtml::BUTTON_COLOR_WARNING,
					'size'=>TbHtml::BUTTON_SIZE_LARGE,)); 
				}
			}
		?>
        </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->