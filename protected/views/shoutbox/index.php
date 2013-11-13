<?php
$this->breadcrumbs = array(
    'Shoutboxes',
);

$this->menu = array(
    array('label' => 'Create Shoutbox', 'url' => array('create')),
    array('label' => 'Manage Shoutbox', 'url' => array('admin')),
);
?>

<h1>Shoutboxes</h1>
<div id="shoutboxes">
    <?php foreach ($shoutboxes as $shoutbox): ?>
        <div class="shoutbox">
            <p>Autor: <?php echo $shoutbox->author->username; ?></p>
            <p><?php echo $shoutbox->content; ?></p>
        </div>
    <?php endforeach; ?>
</div>
<?php
$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#shoutboxes',
    'itemSelector' => 'div.shoutbox',
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end... my only friend, the end',
    'pages' => $pages,
));
?>