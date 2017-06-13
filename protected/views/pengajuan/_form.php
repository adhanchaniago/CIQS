<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */
/* @var $form TbActiveForm */
?>

<style>
	.error{
		background-color:#FF9D9D;
	}
</style>

<?php if($model['scenario'] != 'upload'){ ?>
<script type="text/javascript">
	$( document ).ready(function() {
		$("#addField").click(function (e) {
			$('#party').append('<fieldset><!--<legend>Participant</legend>--><p>Nama : <input id="participants[]" class="span2" type="text" name="participants[]" value=""> Email : <input id="email[]" class="span2" type="text" name="email[]" value=""> Telp : <input id="telp[]" class="span2" type="text" name="telp[]" value=""> <button class="btn btn-danger removeParty" type="button"><i class="icon-remove-sign"></i> Remove</button></p></fieldset>');
			var count = $('#count').html();
			$('#count').html(parseInt(count) + 1);
		});
		
		$('.removeParty').live('click', function (e) {
			if(confirm('remove this participant?')){
				$( this ).closest( "fieldset" ).hide('slow', function(){ $( this ).closest( "fieldset" ).remove(); });
				var count = $('#count').html();
				$('#count').html(parseInt(count) - 1);
			}
		});
		
		$('.removePartyExist').live('click', function (e) {
			if(confirm('remove this participant?')){
				$.post('<?php echo Yii::app()->createUrl('participant/deleteGet'); ?>', {
						'id':$( this ).closest( "fieldset" ).find('input[type=hidden]').val(),
					}, function(data) {
					}, 'html'
				);
				$( this ).closest( "fieldset" ).hide('slow', function(){ $( this ).closest( "fieldset" ).remove(); });
				var count = $('#count').html();
				$('#count').html(parseInt(count) - 1);
			}
		});
		
		$( "#pengajuan-form" ).submit(function( event ) {
			
			var ready = 1;
			
			$("#pengajuan-form :input").not("[type=submit],[type=button]").removeClass('error').each(function () {
				 if ($.trim($(this).val()).length == 0){
					  $(this).addClass('error');
					  ready = 0;
				 }
			});
			
			if(ready == 1){
				return true;
			}else{
				alert('Tidak boleh kosong');
				return false;
			}
		});
	});
	
</script>
<?php } ?>

<div class="form">
	
    <?php if($model['scenario'] != 'upload'){ ?>
    <?php echo TbHtml::button(TbHtml::icon(TbHtml::ICON_PLUS_SIGN).' Add Participant', array('color' => TbHtml::BUTTON_COLOR_SUCCESS,'id'=>'addField')); ?> Total Participant : <b><span id="count"><?php echo empty($modelParticipant) ? '1' : count($modelParticipant); ?></span></b>
    <br /><br />
    <?php } ?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pengajuan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>
            
            <div id="party">
            	<?php if($model['scenario'] == 'insert' || ($model->isNewRecord && empty($modelParticipant))){ ?>
                <fieldset>
                    <!--<legend>Participant 1</legend>-->
                    <p>
                        Nama : <?php echo TbHtml::textField('participants[]','',array('span'=>2)); ?>
                        Email : <?php echo TbHtml::textField('email[]','',array('span'=>2)); ?>
                        Telp : <?php echo TbHtml::textField('telp[]','',array('span'=>2)); ?>
                    </p>
                </fieldset>
                <?php }else if($model['scenario'] == 'insert' || $model['scenario'] == 'update'){
						foreach($modelParticipant as $row){
							?>
							<fieldset>
								<p>
									<?php echo TbHtml::hiddenField('id[]',$row->id,array('span'=>3)); ?>
									Nama : <?php echo TbHtml::textField('participants[]',$row->nama,array('span'=>2)); ?>
									Email : <?php echo TbHtml::textField('email[]',$row->email,array('span'=>2)); ?>
									Telp : <?php echo TbHtml::textField('telp[]',$row->telp,array('span'=>2)); ?>
									<button class="btn btn-danger removePartyExist" type="button"><i class="icon-remove-sign"></i> Remove</button>
								</p>
							</fieldset>
							<?php
						}
					}else if($model['scenario'] == 'upload'){
						?>
						<?php echo $form->labelEx($model,'bukti_bayar'); ?>
						<?php echo CHtml::activeFileField($model, 'bukti_bayar'); ?>
						<p class="hint">
                            Note: file upload must .pdf and max size 500kb.
                        </p>
						<?php
					}
				?>
            </div>

            <?php //echo $form->textFieldControlGroup($model,'mitra',array('span'=>5,'maxlength'=>10)); ?>

            <?php //echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'type',array('span'=>5,'maxlength'=>45)); ?>

            <?php //echo $form->textFieldControlGroup($model,'status_bayar',array('span'=>5,'maxlength'=>10)); ?>

            <?php //echo $form->textFieldControlGroup($model,'bukti_bayar',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
			'name'=>'save',
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->