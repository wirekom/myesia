<li>
	<span class="thumbnail-artikel">
		<?php echo $data->imageThumb; ?>
	</span>
	<h3><?php echo substr(strip_tags($data->title),0,20); ?></h3>
		<span><?php echo substr(strip_tags($data->content),0,50)."..."; ?></br>
			<?php echo CHtml::link(CHtml::encode('Selanjutnya..'), 
			$data->url, array('style'=>'font-size:11px;padding:5px 0;height:15px;text-transform:capitalize;')); ?>
		</span>
</li>