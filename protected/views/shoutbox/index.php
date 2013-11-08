<?php
$this->breadcrumbs=array(
	'Shoutboxes',
);

$this->menu=array(
	array('label'=>'Create Shoutbox','url'=>array('create')),
	array('label'=>'Manage Shoutbox','url'=>array('admin')),
);
?>

<h1>Shoutboxes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
