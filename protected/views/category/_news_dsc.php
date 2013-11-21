<div class="cn_content" style="top:5px;">
    <div>
        <h2><?php echo(strip_tags($data->title)); ?></h2><br>
        <blockquote style="padding:0;border:none;">
            <?php echo substr(strip_tags($data->content), 0, 500) . "..."; ?>
        </blockquote>
        <?php echo CHtml::link(CHtml::encode('Read More'), $data->url); ?>
    </div>
</div>