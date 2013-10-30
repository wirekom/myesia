<li>
    <span class="img span2">
        <a data-title="<?php echo CHtml::encode($data->image); ?>" rel="tooltip" class="thumbnail" href="<?php echo Yii::app()->request->baseUrl . "/uploads/" . $data->image ?>" data-original-title="">
            <img alt="" src="<?php echo Yii::app()->request->baseUrl . "/uploads/" . $data->image ?>">
        </a>
    </span>
    <div class="span8">
        <span class="title">
            <?php echo CHtml::link(CHtml::encode(substr(strip_tags($data->title), 0, 20) . " .."), $data->url); ?>
            <small><?php echo CHtml::encode($data->created); ?></small>
        </span>
        <blockquote>
            <?php echo substr(strip_tags($data->content), 0, 50) . " ...";?>
            <br/>
            
            <?php echo CHtml::link(CHtml::encode('Read More'), $data->url); ?>
        </blockquote>
    </div>
</li>