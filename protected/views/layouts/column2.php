<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-4 last">
	<div id="sidebar">
    <?php $this->widget('bootstrap.widgets.TbNav', array(
		'type' => TbHtml::NAV_TYPE_TABS,
		'stacked' => true,
		'items'=>$this->menu,
    )); ?>
	</div><!-- sidebar -->
</div>
<div class="span-23">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>