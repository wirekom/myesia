<?php
$this->breadcrumbs = array(
    'News' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List News', 'url' => array('index')),
    array('label' => 'Create News', 'url' => array('create')),
    array('label' => 'Update News', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete News', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage News', 'url' => array('admin')),
);
?>

<script type="text/javascript">
jQuery(document).ready(function() {
	$("a.thumbnail").fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
});
</script>

<div class="container inner">
	<div class="row-fluid"><!--========== Content ===========-->
		<div class="span4">
			<span class="img">		
				<a class="thumbnail" href="<?php echo Yii::app()->request->baseUrl.Yii::app()->params['uploads_pictures'].$model->image?>" title="<?php echo CHtml::encode($model->title); ?>.">
					<img src="<?php echo Yii::app()->request->baseUrl.Yii::app()->params['uploads_pictures'].$model->image?>" />
				</a>
			</span>

		    <div class="comment">
				<?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
					<div class="flash-success">
						<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
					</div>
				<?php else: ?>
					<?php
					$this->renderPartial('/comment/_form', array(
						'model' => $comment,
					));
					?>
				<?php endif; ?>
			</div>
			
			<div class="isi-koment">
					<?php if ($model->commentCount >= 1): ?>
					<h3>
						<?php echo $model->commentCount > 1 ? $model->commentCount . ' comments' : 'One comment'; ?>
					</h3>
					<?php
					$this->renderPartial('_comments', array(
						'post' => $model,
						'comments' => $model->comments,
					));
					?>
					<?php endif; ?>
			</div><!-- blog-comments-container-->
		</div>
		
		<div class="span5"><!-- Sebelah Kiri -->
			<div class="alat">
			<div class="wid-head">
				<h2 class="heading"><?php echo CHtml::encode($model->title); ?></h2>
			</div>
			<div class="wid-body ccd">
				<table><tr><!-- Like Count -->
				<td><span id="author" class="margin-none"><?php echo CHtml::encode($model->created); ?></span></td>
				<td><span class="suka">25</span></td>
				</tr></table>
				<div class="media-body">
				<?php echo CHtml::decode($model->content);?>
				</div>
				<!-- Tombol Like -->
				<span class="likeThis">
				Like</br>
				<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/good.png" /></a>
				</span>
			</div>
		</div>
		</div>
		<div class="span3"><!-- Sebelah Kanan -->
		<div class="babar">
			<h3 class="widget-title clearfix">
				<span class="title-text">Artikel Lainnya
				</span>
			</h3>
			<?php
					$this->widget('bootstrap.widgets.TbListView', array(
						'dataProvider' => $dataProvider,
						'template' => "<ul class=\"populer\">{items}</ul>",
						'itemView' => '_listartikel',
					));
				?>
		</div>
		</div>
    </div>
</div><!-- /container -->