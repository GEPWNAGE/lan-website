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
			"blue"
		)
	);
	?>

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
				<div class="col-md-4 col-sm-3">
					<!-- Logo. Use class "color" to add color to the text. -->
					<div class="logo">
						<h1><a href="#">GEPWNAGE<span class="color bold"> LAN</span></a></h1>
						<p class="meta">game all the things!</p>
					</div>
				</div>
				<div class="col-md-8 col-sm-9">
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
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.html">Home #1</a></li>
										<li><a href="index1.html">Home #2</a></li>
										<li><a href="index-rslider.html">Home #3</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="404-1.html">404</a></li>
										<li><a href="about1.html">About</a></li>
										<li><a href="faq.html">FAQ</a></li>
										<li><a href="features2.html">Features</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="faq.html">FAQ</a></li>
										<li><a href="pricing1.html">Pricing Table</a></li>
										<li><a href="process.html">Process</a></li>
										<li><a href="project.html">Project</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="support.html">Support</a></li>
										<li><a href="testimonials.html">Testimonials</a></li>
									</ul>
								</li>

								<li><a href="service2.html">Service</a></li>
								<li><a href="resume.html">Resume</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="blog1.html">Blog</a></li>
										<li><a href="blog3.html">Blog Box</a></li>
										<li><a href="blog-3col.html">Blog 3 Column</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
									</ul>
								</li>

								<li><a href="portfolio1.html">Portfolio</a></li>
								<li><a href="contactus1.html">Contact</a></li>
							</ul>
						</nav>
					</div>
					<!--/ Navigation end -->
				</div>
			</div>
		</div>
	</header>
	<!-- Seperator -->
	<div class="sep"></div>

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

	<!-- Footer starts -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Copyright info -->
					<p class="copy">Copyright &copy; <?= date("Y"); ?> | GEPWNAGE</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</footer>
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
