<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
);
?>

<h1>Manage Categories</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'name',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->name), $data->url)'
        ),
        'description',
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
