<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="bgSlide">
    <div class="container">
        <!--Start Carousel-->	
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <?php $active = 'active';?>
                <?php foreach ($banners as $banner) : ?>
                    <div class="item <?php echo $active; $active = ''; ?>">
                        <?php echo CHtml::image(Yii::app()->baseUrl . Yii::app()->params['uploads_pictures'] . $banner->image); ?>
                        <div class="carousel-caption">
                            <h4><?php echo $banner->title; ?></h4>
                            <p>
                                <?php echo substr(strip_tags($banner->content), 0, 200); ?>
                            <br/>
                            <?php echo CHtml::link(CHtml::encode('Read More'), $banner->url); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/arrow.png" alt="Arrow"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/arrow2.png" alt="Arrow"></a>
        </div>
        <!--End Carousel-->
    </div>
</div>
<script type="text/javascript">
    tb_pathToImage = "<?php echo Yii::app()->request->baseUrl; ?>/images/JQ/loading-thickbox.gif";
    function mycarousel_initCallback(carousel)
    {
        // Disable autoscrolling if the user clicks the prev or next button.
        carousel.buttonNext.bind('click', function() {
            carousel.startAuto(0);
        });

        carousel.buttonPrev.bind('click', function() {
            carousel.startAuto(0);
        });

        // Pause autoscrolling if the user moves with the cursor over the clip.
        carousel.clip.hover(function() {
            carousel.stopAuto();
        }, function() {
            carousel.startAuto();
        });
    }
    ;
    jQuery(document).ready(function() {
        jQuery('#Jcarousel').jcarousel({
            // Configuration goes here
            auto: 0,
            visible: 4,
            wrap: 'last',
            initCallback: mycarousel_initCallback
        });
        $("a#example2").fancybox({
            'overlayShow': true,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic'
        });
    });
</script>
<div class="bgSlide_menu">
    <div class="container">
        <ul id="Jcarousel" class="jcarousel-skin-ie7">
            <!-- The content will be dynamically loaded in here -->
            <?php foreach ($categories as $category) : ?>
                <li>
                    <?php if ($category->latestNews !== NULL) : ?>
                        <?php
                        echo CHtml::link(
                                CHtml::image(Yii::app()->baseUrl . Yii::app()->params['uploads_pictures'] . $category->latestNews->image, $category->latestNews->title), Yii::app()->baseUrl . Yii::app()->params['uploads_pictures'] . $category->latestNews->image, array('id' => 'example2', 'title' => $category->latestNews->title)
                        );
                        ?>
                    <?php else : ?>
                        <a id="example2" href="<?php echo Yii::app()->baseUrl; ?>/images/featured/image4.jpg" title="Content Not found!">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/thumbs/thumb3.jpg" alt="Gambar1" />
                        </a>
                    <?php endif; ?>
                    <div class="desk">
                        <?php echo CHtml::link("<h2>$category->name</h2>", $category->url); ?>
                        <p><?php echo $category->description; ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="container">
    <!--Start second row of columns-->
    <div class="row-fluid">
        <?php foreach ($twoNews as $news) : ?>
            <div class="span4">
                <ul class="twoCtn">
                    <li>
                        <h2><?php echo CHtml::link($news->title, $news->url); ?></h2>
                        <small><?php echo $news->updated; ?></small>
                        <span class="desk">
                            <?php echo substr(strip_tags($news->content), 0, 500); ?>
                            <br/>
                            <?php echo CHtml::link(CHtml::encode('Read More'), $news->url); ?>
                        </span>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
        <div class="span4">
            <!--a class="twitter-timeline"  href="https://twitter.com/name_twitter" data-tweet-limit="4"  data-widget-id="YOUR ID TWITTER">Tweets by @name_twitter</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          <!--img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twit.jpg" alt="Gambar1" />-->
            <div class="threeCtn">
                <h2>BERITA KELUARGA</h2>
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#pane1" data-toggle="tab">Ucapan Selamat</a></li>
                        <li><a href="#pane2" data-toggle="tab">Duka Cita</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="pane1" class="tab-pane active">
                            <div class="ucap">
                                <ul class="an">
                                    <li>
                                        <span class="img span3">
                                            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga1.jpg">
                                        </span>
                                        <div class="span9">
                                            <span class="title">
                                                <a href="#">Loream ipsum dolor si amet</a><br>
                                                <small>2013-09-27 15:14:49</small>
                                            </span>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="img span3">
                                            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga1.jpg">
                                        </span>
                                        <div class="span9">
                                            <span class="title">
                                                <a href="#">Loream ipsum dolor si amet</a><br>
                                                <small>2013-09-27 15:14:49</small>
                                            </span>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="img span3">
                                            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga1.jpg">
                                        </span>
                                        <div class="span9">
                                            <span class="title">
                                                <a href="#">Loream ipsum dolor si amet</a><br>
                                                <small>2013-09-27 15:14:49</small>
                                            </span>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="pane2" class="tab-pane">
                            <div class="ucap">
                                <ul class="an">
                                    <li>
                                        <span class="img span3">
                                            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga1.jpg">
                                        </span>
                                        <div class="span9">
                                            <span class="title">
                                                <a href="#">Selamat tahun baru</a><br>
                                                <small>2013-10-10 15:14:49</small>
                                            </span>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="img span3">
                                            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga1.jpg">
                                        </span>
                                        <div class="span9">
                                            <span class="title">
                                                <a href="#">Selamat makan</a><br>
                                                <small>2013-10-11 15:14:49</small>
                                            </span>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="img span3">
                                            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ga1.jpg">
                                        </span>
                                        <div class="span9">
                                            <span class="title">
                                                <a href="#">Selamat riadi</a><br>
                                                <small>2013-10-12 15:14:49</small>
                                            </span>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.tab-content -->
                </div><!-- /.tabbable -->
            </div>
        </div>
    </div>
    <!--End second row of columns-->
</div>