<?php
$this->breadcrumbs = array(
    'Static Pages' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List StaticPage', 'url' => array('index')),
    array('label' => 'Create StaticPage', 'url' => array('create')),
);

?>

<h1>Manage Static Pages</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'static-page-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), $data->url)'
        ),
        array(
            'name' => 'status',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->statusText)'
        ),
        array(
            'name' => 'created',
            'type' => 'datetime',
            'filter' => false,
        ),
        array(
            'name' => 'updated',
            'type' => 'datetime',
            'filter' => false,
        ),
        'author_id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
