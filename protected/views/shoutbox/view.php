<?php
$this->breadcrumbs = array(
    'Shoutboxes' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Shoutbox', 'url' => array('index')),
    array('label' => 'Create Shoutbox', 'url' => array('create')),
    array('label' => 'Update Shoutbox', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Shoutbox', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Shoutbox', 'url' => array('admin')),
);
?>

<h1>View Shoutbox <?php echo $model->title; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'author',
        array(
            'name' => 'content',
            'type' => 'html',
        ),
        array(
            'name' => 'type',
            'type' => 'raw',
            'value' => CHtml::encode($model->typeText),
        ),
        'updated',
    ),
));
?>
