<?php
/**
 * @var View $this
 * @var String $title_for_layout
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?= $title_for_layout; ?> | GEPWNAGE LAN
	</title>
	<!-- Styles -->
	<?
	echo $this->Html->css(
		array(
			"bootstrap.min",
			"prettyPhoto",
			"flexslider",
			"slider",
			"owl.carousel",
			"font-awesome.min",
			"style",
			"blue",
			"gepwnage"
		)
	);
	?>

	<meta property="og:type"            content="website" />
	<meta property="og:url"             content="<?=  Router::url( $this->here, true ); ?>" />
	<meta property="og:title"           content="<?= $title_for_layout ?>" />
	<meta property="og:image"           content="<?= isset($page) && Hash::get($page, "Page.info.facebook_og") ? Hash::get($page, "Page.info.facebook_og") : "http://static.gepwnage.nl/og_default.png"?>" />
	<?php if(isset($page) && Hash::get($page, "Page.info.facebook_description")){?>
		<meta property="og:description"     content="<?= Hash::get($page, "Page.info.facebook_description") ?>" />
	<?php } ?>

	<!--[if lt IE 9]>
	<? echo $this->Html->script("html5shiv.js"); ?>
	<![endif]-->

	<!-- Favicon -->
	<link rel="shortcut icon" href="http://gepwnage.nl/favicon.ico">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-8 clearfix">
					<div class="logo">
						<img src="/img/logo.png" alt="WAKAWAKA" style="max-height: 60px;margin-right:20px;"/>
						<div class="pull-left">
							<h1><a href="#">GEPWNAGE<span class="color bold">LAN</span></a></h1>
						</div>
					</div>
				</div>
                <div class="col-md-6 col-sm-4 clearfix">
                    <div class="pull-right" style="padding-top: 15px;">
                        <img src="/img/deloitte.png" alt="ft. Deloitte"/>
                    </div>
                </div>
				<div class="col-md-12">
					<!-- Navigation -->
					<div class="navbar bs-docs-nav" role="banner">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
							<ul class="nav navbar-nav navbar-right">
								<?php $menu = Configure::read("Menu");
								foreach($menu[$this->params['language'] ?: "nld"] as $menuItem){
                                    $class = "";
                                    if(($this->params['pass'][0] == 'home' && Hash::get($menuItem, 'url.0') == 'home') || ($menuItem['url']['controller'] == $this->params['controller']
                                        && $menuItem['url']['action'] == $this->params['action']
                                        && Hash::get($menuItem, 'url.slug') == $this->params['pass'][0])){
                                        $class = "active";
                                    }
                                    ?>
									<li>
                                        <a href="<?= is_array($menuItem['url']) ? $this->Html->url($menuItem['url']) : $menuItem['url'];?>" class="<?=$class?>"><?= $menuItem['title']; ?></a>
                                    </li>
								<?php } ?>
								<li><a href="http://www.gepwnage.nl" target="_blank">GEPWNAGE.nl</a></li>
								<?php if(($this->params['language'] ?: "nl") == "nl"){?>
									<li><a href="/en/"><img src="http://lan.gepwnage.nl/img/en.png"/>&nbsp;&nbsp;English</a></li>
								<?php } else {?>
									<li><a href="/"><img src="http://lan.gepwnage.nl/img/nl.png"/>&nbsp;&nbsp;Nederlands</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
					<!--/ Navigation end -->
				</div>
			</div>
		</div>
	</header>

	<!-- Page heading starts -->
	<div class="page-head">
		<div class="container">
			<h2><?= $title_for_layout ?></h2>
		</div>
	</div>
	<!--/ Page Heading ends -->

	<!-- Page content starts -->
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	</div>
	<!--/ Page content ends -->

	<div id="bottom-container">
		<marquee style="width: 100%;position:relative;z-index: 10;" scrollamount="5" loop="-1" direction="right">
			<img src="http://www.gepwnage.nl/img/15.gif">
		</marquee>
		<!-- Footer starts -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- Copyright info -->
						<p class="copy">&copy; 2008 - <?= date("Y"); ?> | Dispuut GEPWNAGE</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</footer>
	</div>
	<!--/ Footer ends -->

	<!-- Scroll to top -->
	<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

	<!-- Javascript files -->
	<?php
	echo $this->Html->script(
		array(
			"jquery",
			"bootstrap.min",
			"jquery.isotope",
			"jquery.prettyPhoto",
			"filter",
			"jquery.flexslider-min",
			"jquery.cslider",
			"modernizr.custom.28468",
			"owl.carousel.min",
			"respond.min",
			"custom"
		)
	);
	?>
</body>
</html>
