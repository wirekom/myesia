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
<div class="container inner">
	<div class="row-fluid"><!--========== Content ===========-->
		<div class="span9"><!-- Sebelah Kiri -->
			<div style="height:600px;">
				<?php
				Yii::app()->clientScript->registerCoreScript('jquery');

				$this->widget('ext.pdfJs.QPdfJs', array(
					'url' => Yii::app()->baseUrl . Yii::app()->params['uploads_documents'] . $model->image,
				))
				?>
			</div>

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
		<div class="span3 knn"><!-- Sebelah Kanan -->
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