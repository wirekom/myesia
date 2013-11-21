<?php
$this->breadcrumbs = array(
    'Static Pages' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List StaticPage', 'url' => array('index')),
    array('label' => 'Create StaticPage', 'url' => array('create')),
    array('label' => 'Update StaticPage', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete StaticPage', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage StaticPage', 'url' => array('admin')),
);
?>

<h1>View StaticPage #<?php echo $model->title; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        array(
            'name' => 'content',
            'type' => 'html',
        ),
        array(
            'name' => 'status',
            'type' => 'raw',
            'value' => CHtml::encode($model->statusText),
        ),
        'author',
    ),
));
?>
