<?php
/* @var $this MitraController */
/* @var $model Mitra */
/* @var $form TbActiveForm */
?>

<?php
	if(isset($scenario)){
		if($scenario == 'addBiodata'){
			$this->breadcrumbs=array(
				'Pengajuan'=>array('pengajuan/index'),
				'Terms & Conditions'=>array('pengajuan/index'),
				'add Profil',
			);
		}
	}
?>

<script type="text/javascript">
$( document ).ready(function() {
	$("#Mitra_nama").bind('keyup', function (e) {
		if (e.which >= 97 && e.which <= 122) {
			var newKey = e.which - 32;
			// I have tried setting those
			e.keyCode = newKey;
			e.charCode = newKey;
		}
	
		$("#Mitra_nama").val(($("#Mitra_nama").val()).toUpperCase());
	});
});
</script>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'mitra-form',
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
			
            <p class="hint">
				Note: Your login name must be unique and a max of 45 characters.
			</p>
            <?php echo $form->textFieldControlGroup($model,'username',array('span'=>5,'maxlength'=>45,$model->isNewRecord ? '' : 'readonly'=>'readonly')); ?>
			
            <p class="hint">
				Note: Password must be repeated exactly.
			</p>
            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>45)); ?>
            
            <?php echo $form->passwordFieldControlGroup($model,'password2',array('span'=>5,'maxlength'=>45)); ?>
            
            <?php echo $form->textFieldControlGroup($model,'nama',array('span'=>5,'maxlength'=>45)); ?>
            
            <?php //echo $form->textFieldControlGroup($model,'nama',array('span'=>5,'maxlength'=>45,$model->isNewRecord ? '' : 'readonly'=>'readonly')); ?>
			
            <?php if(!Yii::app()->user->checkAccess('ADMIN MARKETING') || Yii::app()->user->checkAccess('ADMINISTRATOR')) { ?>
            <?php echo $form->textAreaControlGroup($model,'alamat',array('rows'=>6,'span'=>8)); ?>
			
            <?php echo $form->textFieldControlGroup($model,'telepon',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>50)); ?>

            <?php echo $form->textFieldControlGroup($model,'npwp',array('span'=>5,'maxlength'=>45)); ?>
            
			<?php echo $form->textFieldControlGroup($model,'fax',array('span'=>5,'maxlength'=>50)); ?>

            <?php echo $form->textFieldControlGroup($model,'dirut',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'mr',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'bidang_usaha',array('span'=>5,'maxlength'=>100)); ?>
            <?php } ?>
			
            <?php //echo $form->textFieldControlGroup($model,'persetujuan',array('span'=>5)); ?>
            
            <?php //echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->