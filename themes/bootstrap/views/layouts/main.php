<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link type="image/x-icon" href="../images/icon.ico" rel="icon">
            <link type="image/x-icon" href="../images/icon.ico" rel="shortcut icon">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                    <meta content="Your description" name="description">
                        <meta content="esia, myesia" name="keywords">
                            <meta content="Syukri" name="M.Syukri Khafidh">

                                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/howdoyoutturnthisno.css" />
                                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" />
                                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/diapo.css" />
                                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox-1.3.4.css" />
                                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/images/JQ/skin.css" />

                                <title><?php echo CHtml::encode($this->pageTitle); ?></title>

                                <?php Yii::app()->bootstrap->register(); ?>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/diapo.js"></script>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hoverIntent.minified.js"></script>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing-1.3.js"></script>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.js"></script>
                                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
                                </head>

                                <body>
                                    <div class="container">	
                                        <div class="logoz">
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_esia_baru2.png" title="<?php echo CHtml::encode($this->pageTitle); ?>" />
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                    $this->widget('bootstrap.widgets.TbNavbar', array(
                                        'brand' => false,
                                        'fixed' => 'top',
                                        'collapse' => true, // requires bootstrap-responsive.css
                                        'items' => array(
                                            array(
                                                'class' => 'bootstrap.widgets.TbMenu',
                                                'items' => array(
                                                    array('label' => 'Beranda', 'url' => array('/site/index')),
                                                    array('label' => 'HR', 'url' => array('#'), 'items' => array(
                                                            array('label' => 'HRIS', 'url' => array('#')),
                                                            array('label' => 'Visi Misi dan Value Baru', 'url' => array('#')),
                                                            array('label' => 'Jadwal Training', 'url' => array('#')),
                                                            array('label' => 'Pengumungan HR', 'url' => array('#')),
                                                            array('label' => 'Struktur Organisasi', 'url' => array('#')),
                                                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                                        )),
                                                    array('label' => 'GA Helpdesk', 'url' => array('#'), 'items' => array(
                                                            array('label' => 'Transport', 'url' => array('#')),
                                                            array('label' => 'GSM', 'url' => array('#')),
                                                            array('label' => 'ATK', 'url' => array('#')),
                                                            array('label' => 'Voucher Taxi', 'url' => array('#')),
                                                        )),
                                                    array('label' => 'PR System', 'url' => array('/artikel/index')),
                                                    array('label' => 'ExPro', 'url' => array('#')),
                                                    array('label' => 'Komunika', 'url' => array('#')),
                                                    array('label' => 'E-Learning', 'url' => array('#')),
                                                    array('label' => 'SOP', 'url' => array('#')),
                                                    array('label' => 'Arsip', 'url' => array('#')),
                                                    array('label' => 'Setting', 'url' => array('#'), 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                                            array('label' => 'User', 'url' => array('/user/admin')),
                                                            array('label' => 'News', 'url' => array('/news/admin')),
                                                            array('label' => 'Category', 'url' => array('/category/admin')),
                                                            array('label' => 'Page', 'url' => array('/staticPage/admin')),
                                                        )),
                                                ),
                                            ),
                                            '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                                        ),
                                    ));
                                    ?>

                                    <div class="container">
                                        <?php if (isset($this->breadcrumbs)): ?>
                                            <?php
                                            $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                                                'links' => $this->breadcrumbs,
                                            ));
                                            ?><!-- breadcrumbs -->
<?php endif ?>
                                    </div>
<?php echo $content; ?>

                                    <div class="clear"></div>
                                    <hr>
                                        <footer id="puterr">
                                            <div class="container">
                                                <div class="pull-right">
                                                    Copyright &copy; <?php echo date('Y'); ?> Bakrie Telecom. All rights reserved.
                                                </div>
                                            </div><!-- footer -->
                                        </footer>
                                </body>
                                </html>
