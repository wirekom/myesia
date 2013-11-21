<?php
$this->breadcrumbs = array(
    'Menus' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Menu', 'url' => array('index')),
    array('label' => 'Create Menu', 'url' => array('create')),
);
?>

<h1>Manage Menus</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'menu-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), $data->viewUrl)'
        ),
        array(
            'name' => 'url',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->url), $data->url)'
        ),
        array(
            'name' => 'published',
            'filter' => $model->publishedOptions,
            'type' => 'raw',
            'value' => 'CHtml::encode($data->publishedText)'
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
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
));
?>
