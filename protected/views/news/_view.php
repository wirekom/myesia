<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?></h2>
    <br />
    
    <?php echo $data->imageHtml; ?>

    <?php
    $this->beginWidget('CMarkdown', array('purifyOutput' => true));
    echo $data->content;
    $this->endWidget();
    ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
    <?php echo CHtml::encode($data->author_id); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
    <?php echo CHtml::encode($data->category->name); ?>
    <br />
</div>