<?php
	$this->breadcrumbs=array(
		'Pengajuan'=>array('index'),
		'Terms & Conditions',
	);
?>

<script type="text/javascript">
$( document ).ready(function() {
	$('#persetujuan').change(function(){
		var c = this.checked ? 'block' : 'none';
		$('#next1').css('display', c);
	});
});
</script>

<h3>Terms & Conditions</h3>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>

<?php echo CHtml::beginForm(); ?>
	
    <div class="form-actions">
    	<?php echo TbHtml::checkBox('persetujuan',false); ?> I agree to the Terms & Conditions
        <?php echo TbHtml::submitButton('Next',array(
			'id'=>'next1',
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
			'style'=>'display:none;margin-top:20px;',
		)); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>