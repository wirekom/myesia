<?php
$this->breadcrumbs = array(
    'Categories',
);

$this->menu = array(
    array('label' => 'Create Category', 'url' => array('create')),
    array('label' => 'Manage Category', 'url' => array('admin')),
);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/CompactNewsPreviewer/css/style.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/contentSlide.js', CClientScript::POS_HEAD);
//Yii::app()->clientScript->registerScript('variables', 'init_hover();');?>


<div class="container inner">
    <div class="row-fluid"><!--========== Content ===========-->
        <?php echo CHtml::link('<span><h2>ALL CATEGORY</h2></span>', $this->createUrl('category/index')); ?>

        <div class="span3 no-margin krr">
            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider' => $dataProviderCategory,
                'template' => "<ul class=\"populer\">{items}</ul>",
                'itemView' => '_view',
            ));
            ?>
        </div>
        <div class="span4"><!-- Sebelah Kiri -->
            <div id="cn_list" class="cn_list">
                <?php
                $this->widget('bootstrap.widgets.TbListView', array(
//                    'id' => 'test-list-view',
                    'dataProvider' => $dataProviderNews,
                    'template' => "<div class='cn_page' style='display:block;'>{items}</div>\n{pager}",
                    'itemView' => '_news',
                    'afterAjaxUpdate' => 'js:init_hover',
                ));
                ?>
            </div>
        </div>
        <div class="span5 knn"><!-- Sebelah Kanan -->
            <div class="singleRev">
                <div class="cn_wrapper">
                    <div id="cn_preview" class="cn_preview">
                        <?php
                        $this->widget('bootstrap.widgets.TbListView', array(
                            'dataProvider' => $dataProviderNews,
                            'template' => "<div class='cn_page' style='display:block;'>{items}</div>",
                            'itemView' => '_news_dsc'
                        ));
                        ?>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>

    </div>
</div><!-- /container -->