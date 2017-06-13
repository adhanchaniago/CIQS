<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
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

            <?php echo $form->textFieldControlGroup($model,'telp',array('span'=>5,'maxlength'=>45)); ?>
			
            <p class="hint">
				Note: Choose a level for this user.
			</p>
            <?php //echo $form->textFieldControlGroup($model,'level',array('span'=>5,'maxlength'=>10)); ?>
            <?php echo $form->labelEx($model,'level'); ?>
            <?php echo $form->dropDownList($model,'level',
            CHtml::listData(Level::model()->findAll(array('order' => 'id')), 'id', 'name'),
            array('empty'=> '--', "style"=> ""));?>
            <?php echo $form->error($model,'level'); ?>

            <?php //echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->