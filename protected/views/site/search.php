<?php
$this->breadcrumbs = array(
    'Search',
);
?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $("a.thumbnail").fancybox({
            'overlayShow': true,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic'
        });
    });
</script>

<div class="container inner">
    <div class="row-fluid"><!--========== Content ===========-->
        <?php echo CHtml::link('<span><h2>ALL CATEGORY</h2></span>', $this->createUrl('site/search', array('search' => $match))); ?>
        
        <div class="span3 no-margin krr">
            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider' => $dataProviderCategory,
                'template' => "<ul class=\"populer\">{items}</ul>",
                'itemView' => '_category',
                'viewData' => array('match' => $match,)
            ));
            ?>
        </div>
        <div class="span9"><!-- Sebelah Kiri -->
            <span class="h"><b>Search Results</b></span>

            <?php
            $this->widget('zii.widgets.CListView', array(
                'id' => "list-pengumuman",
                'dataProvider' => $dataProvider,
                'itemView' => '_search',
                'template' => "<div class='cn_page' style='display:block;'>{items}</div>\n{pager}",
                'summaryText' => false
            ));
            ?>
        </div>
        
    </div>
</div><!-- /container -->
