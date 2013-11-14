<li>
    <?php echo CHtml::link(CHtml::encode($data->name), $this->createUrl('site/search', array('cat' => $data->id, 'search' => $match))); ?>
</li>