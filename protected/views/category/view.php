<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Category', 'url' => array('index')),
    array('label' => 'Create Category', 'url' => array('create')),
    array('label' => 'Update Category', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Category', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Category', 'url' => array('admin')),
);
?>

<div class="container inner">
    <div class="row-fluid"><!--========== Content ===========-->
        <a href=""><span><h2>HOT NEWS</h2></span></a>
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
            <?php
            $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider' => new CArrayDataProvider($model->news, array(
                    'pagination' => array(
                        'pageSize' => 5,
                    ),
                    'sort' => array(
                        'attributes' => array(
                            'category_id',
                            'image',
                            'title',
                            'status',
                            'created',
                            'updated',
                            'author_id',
                        ),
                        'defaultOrder' => 'cost ASC',
                    ),
                        )),
                'template' => "<ul class='list_artikel'>{items}</ul>\n{pager}",
                'itemView' => '_news',
            ));
            ?>
        </div>
        <div class="span5 knn"><!-- Sebelah Kanan -->
            <div class="singleRev">
                <span class="tangle-left"></span>
                <span class="tangle-bottom"></span>
                <h3 class="tel">Loream Ipsum</h3>
                <span class="iten">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</br></br>
                    <a href="">Read More</a> 
                </span>
            </div>
        </div>
    </div>
</div>