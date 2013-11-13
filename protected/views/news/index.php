<?php
$this->breadcrumbs=array(
	'Artikels',
);

$this->menu=array(
	array('label'=>'Create Artikel','url'=>array('create')),
	array('label'=>'Manage Artikel','url'=>array('admin')),
);
?>

<script type="text/javascript">
jQuery(document).ready(function() {
	$("a.thumbnail").fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
});
</script>

<div class="container inner">
    <div class="row-fluid"><!--========== Content ===========-->
        <a href=""><span><h2>HOT NEWS</h2></span></a>
        <div class="span3 no-margin krr">
            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider' => $dataProviderCategory,
                'template' => "<ul class=\"populer\">{items}</ul>",
                'itemView' => '_view',
            ));
            ?>

        </div>
		<div class="span4"><!-- Sebelah Tengah -->
			<div id="cn_list" class="cn_list">
				<?php $this->widget('bootstrap.widgets.TbListView',array(
					'dataProvider'=>$dataProvider,
					'template'=>"<div class='cn_page' style='display:block;'>{items}</div>\n{pager}",
					'itemView'=>'_artikel',
				)); ?>
			</div>
		</div>
		
		<div class="span5 knn"><!-- Sebelah Kanan -->
			<div class="singleRev">
					<div class="cn_wrapper">
						<div id="cn_preview" class="cn_preview">
							<?php $this->widget('bootstrap.widgets.TbListView',array(
								'dataProvider'=>$dataNews,
								'template'=>"<div class='cn_page' style='display:block;'>{items}</div>\n{pager}",
								'itemView'=>'_listDes',
							)); ?>
						</div>
					</div>
			<!-- End -->
			</div>
		</div>
		
    </div>
</div><!-- /container -->
