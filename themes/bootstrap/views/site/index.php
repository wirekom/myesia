<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="bgSlide">
	<div class="container">
		<!--Start Carousel-->	
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/1.jpg">
				<div class="carousel-caption">
				  <h4>First Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			  </div>
			  <div class="item">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/2.jpg">
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			  </div>
			  <div class="item">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/3.jpg">
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Loream ipsum dolor si amet</p>
				</div>
			  </div>
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
};
jQuery(document).ready(function() {
    jQuery('#Jcarousel').jcarousel({
        // Configuration goes here
		auto: 0,
		visible: 4,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
	$("a#example2").fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
});
</script>
<div class="bgSlide_menu">
	<div class="container">
		<ul id="Jcarousel" class="jcarousel-skin-ie7">
		<!-- The content will be dynamically loaded in here -->
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image4.jpg" title="Ayo selamatkan bumi">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb3.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Video</h2>
					<p>Video Gallery Bakrie Telecom</p>
				</div>
			</li>
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image1.jpg" title="Pendatang baru :D">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb1.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Foto</h2>
					<p>Picture Gallery Bakrie Telecom</p>
				</div>
			</li>
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image2.jpg" title="Kopi pagi yang nikmat">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb2.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Pojok Komunitas</h2>
					<p>Pojok-Komunitas Bakrie Telecom</p>
				</div>
			</li>
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image5.jpg" title="Wisata Kuliner memang asik">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb4.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Secangkir Kopi</h2>
					<p>Secangkir Kopi di Pagi Hari</p>
				</div>
			</li>
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image3.jpg" title="gambar1">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb5.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Profil Karyawan</h2>
					<p>Profil Karyawan Bakrie Telecom</p>
				</div>
			</li>
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image7.jpg" title="gambar1">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb7.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Kuis</h2>
					<p>Kuis Berhadiah</p>
				</div>
			</li>
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image6.jpg" title="gambar1">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb6.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Berita Keluarga</h2>
					<p>Berita Keluarga Bakrie Telecom</p>
				</div>
			</li>
			<li>
				<a id="example2" href="<?php echo Yii::app()->request->baseUrl; ?>/images/featured/image3.jpg" title="gambar1">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/thumb5.jpg" alt="Gambar1" />
				</a>
				<div class="desk">
					<h2>Esia-Pedia</h2>
					<p>Esia Pedia</p>
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="container">
	  <!--Start second row of columns-->
	<div class="row-fluid">
        <div class="span4">
			<ul class="twoCtn">
				<li>
				<h2><a href="#" title="">WORKSHOP DIGITAL</a></h2>
				<small>7 September 2013</small>
				<span class="desk">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam, 
				</span>
				</li>
			</ul>
		</div>
        <div class="span4">
			<div class="oneCtn">
				<h2><a href="#" title="">SUNDAY RUNNING</a></h2>
				<small>1 September 2013</small>
				<span class="desk">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam, 
				</span>
			</div>
		</div>
        <div class="span4">
			  <!--a class="twitter-timeline"  href="https://twitter.com/name_twitter" data-tweet-limit="4"  data-widget-id="YOUR ID TWITTER">Tweets by @name_twitter</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<!--img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twit.jpg" alt="Gambar1" />-->
			<div class="threeCtn">
				<h2>BERITA KELUARGA</h2>
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#pane1" data-toggle="tab">Ucapan Selamat</a></li>
							<li><a href="#pane2" data-toggle="tab">Ucapan Duka Cita</a></li>
						</ul>
						<div class="tab-content">
							<div id="pane1" class="tab-pane active">
								<pre>Ucapan Selamat ...</pre>
							</div>
							<div id="pane2" class="tab-pane">
							  <pre>Ucapan Duka Cita ...</pre>
							</div>
						</div><!-- /.tab-content -->
					</div><!-- /.tabbable -->
			</div>
        </div>
    </div>
	  <!--End second row of columns-->
</div>