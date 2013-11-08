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
                                                            array('label' => 'Visi Misi dan Value Baru', 'url' => array('/visi/index')),
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
                                                    array('label' => 'PR System', 'url' => array('/category/index')),
                                                    array('label' => 'ExPro', 'url' => array('#')),
                                                    array('label' => 'Komunika', 'url' => array('#')),
                                                    array('label' => 'E-Learning', 'url' => array('#')),
                                                    array('label' => 'SOP', 'url' => array('#')),
                                                    array('label' => 'Arsip', 'url' => array('#')),
                                                    array('label' => 'Setting', 'url' => array('#'), 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                                            array('label' => 'User', 'url' => array('/user/admin')),
                                                            array('label' => 'News', 'url' => array('/news/admin')),
                                                            array('label' => 'Visi', 'url' => array('/Visi/admin')),
                                                            array('label' => 'Video', 'url' => array('/video/admin')),
                                                            array('label' => 'Category', 'url' => array('/category/admin')),
                                                            array('label' => 'Page', 'url' => array('/staticPage/admin')),
                                                        )),
                                                ),
                                            ),
                                            '	<form class="navbar-search pull-right" method="get" action="/site/search" id="search_box">
													<input class="search-query span2" type="text" id="search" name="search" placeholder="Search" />
												</form>',
                                        ),
                                    ));
                                    ?>
									
									<!--form class="navbar-search pull-right" method="get" action="<?php echo Yii::app()->request->baseUrl."/index.php/site/search"?>" id="search_box">
										<input class="search-query span2" type="text" id="search" name="search" placeholder="Search" />
									</form>-->

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
		<div class="pull-left">
			<ul id="ulala">
				<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga.jpg" /></li>
				<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga.jpg" /></li>
				<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga.jpg" /></li>
				<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga.jpg" /></li>
			</ul>
		</div>
		<div class="pull-right puter">
			Copyright &copy; <?php echo date('Y'); ?> Bakrie Telecom. All rights reserved.
		</div>
	</div><!-- footer -->
</footer>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/CompactNewsPreviewer/css/style.css" />
<script type="text/javascript">
            $(function() {
                //caching
				//next and prev buttons
				var $cn_next	= $('#cn_next');
				var $cn_prev	= $('#cn_prev');
				//wrapper of the left items
				var $cn_list 	= $('#cn_list');
				var $pages		= $cn_list.find('.cn_page');
				//how many pages
				var cnt_pages	= $pages.length;
				//the default page is the first one
				var page		= 1;
				//list of news (left items)
				var $items 		= $cn_list.find('.cn_item');
				//the current item being viewed (right side)
				var $cn_preview = $('#cn_preview');
				//index of the item being viewed. 
				//the default is the first one
				var current		= 1;
				
				/*
				for each item we store its index relative to all the document.
				we bind a click event that slides up or down the current item
				and slides up or down the clicked one. 
				Moving up or down will depend if the clicked item is after or
				before the current one
				*/
				$("div.cn_content").addClass("hid");
				$items.each(function(i){
					var $item = $(this);
					$item.data('idx',i+1);
					
					$item.bind('click',function(){
						var $this 		= $(this);
						$cn_list.find('.selected').removeClass('selected');
						$this.addClass('selected');
						var idx			= $(this).data('idx');
						var $current 	= $cn_preview.find('.cn_content:nth-child('+current+')');
						var $next		= $cn_preview.find('.cn_content:nth-child('+idx+')');
						
						if(idx > current){
							$current.stop().animate({'top':'-300px'},600,'easeOutBack',function(){
								$(this).css({'top':'310px'});
							});
							$next.css({'top':'310px', 'display':'block'}).stop().animate({'top':'5px'},600,'easeOutBack');
						}
						else if(idx < current){
							$current.stop().animate({'top':'310px'},600,'easeOutBack',function(){
								$(this).css({'top':'310px'});
							});
							$next.css({'top':'-300px'}).stop().animate({'top':'5px'},600,'easeOutBack');
						}
						current = idx;
					});
				});
				
				/*
				shows next page if exists:
				the next page fades in
				also checks if the button should get disabled
				*/
				$cn_next.bind('click',function(e){
					var $this = $(this);
					$cn_prev.removeClass('disabled');
					++page;
					if(page == cnt_pages)
						$this.addClass('disabled');
					if(page > cnt_pages){ 
						page = cnt_pages;
						return;
					}	
					$pages.hide();
					$cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
					e.preventDefault();
				});
				/*
				shows previous page if exists:
				the previous page fades in
				also checks if the button should get disabled
				*/
				$cn_prev.bind('click',function(e){
					var $this = $(this);
					$cn_next.removeClass('disabled');
					--page;
					if(page == 1)
						$this.addClass('disabled');
					if(page < 1){ 
						page = 1;
						return;
					}
					$pages.hide();
					$cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
					e.preventDefault();
				});
				
            });
        </script>

</body>
</html>
