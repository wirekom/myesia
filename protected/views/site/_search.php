<div class="cn_item">  <!-- setiap diklik diberi class "selected" -->
	<span class="img span2">
		 <a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl . "/uploads/" . $data->image ?>" data-original-title="">
            <?php echo $data->imageThumb; ?>
        </a>
	</span>
	<div class="span8">
		<span class="title">
			<h2><?php echo CHtml::link(CHtml::encode(substr(strip_tags($data->title), 0, 20) . " .."), $data->url); ?></h2>
			<small><?php echo CHtml::encode($data->created); ?></small>
		</span>
		 <blockquote>
            <?php echo substr(strip_tags($data->content), 0, 50) . " ..."; ?>
            <br/>

            <?php echo CHtml::link(CHtml::encode('Read More'), $data->url); ?>
        </blockquote>
	</div>
</div>