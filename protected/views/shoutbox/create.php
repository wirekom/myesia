<?php
$this->breadcrumbs=array(
	'Shoutboxes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Shoutbox','url'=>array('index')),
	array('label'=>'Manage Shoutbox','url'=>array('admin')),
);
?>

<h1>Create Shoutbox</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>