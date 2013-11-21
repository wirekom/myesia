<div class="view">
    <h2><?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?></h2>
    <br />

    <?php
    $this->beginWidget('CMarkdown', array('purifyOutput' => true));
    echo $data->content;
    $this->endWidget();
    ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
    <?php echo CHtml::encode($data->author); ?>
    <br />
</div>