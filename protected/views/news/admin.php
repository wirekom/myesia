<?php
$this->breadcrumbs = array(
    'News' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List News', 'url' => array('index')),
    array('label' => 'Create News', 'url' => array('create')),
);
?>

<h1>Manage News</h1>


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'news-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'category_id',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->category->name)',
            'filter' => $model->getCategoryOptions(),
        ),
        array(
            'name' => 'image',
            'type' => 'html',
            'value' => '$data->imageHtml'
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), $data->url)'
        ),
        array(
            'name' => 'status',
            'filter' => $model->getStatusOptions(),
            'type' => 'raw',
            'value' => 'CHtml::encode($data->statusText)'
        ),
        'is_banner',
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
            'template' => '{update}{delete}',
        ),
    ),
));
?>
