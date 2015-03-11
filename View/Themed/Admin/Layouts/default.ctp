<?
/**
 * @var View $this
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Title and other stuffs -->
    <title>GEPWNAGE LAN Admin | <?= $title_for_layout; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stylesheets -->
    <? echo $this->Html->css(
        array(
            "bootstrap.min.css",
            "font-awesome.min.css",
            "jquery-ui.css",
            "fullcalendar.css",
            "prettyPhoto.css",
            "rateit.css",
            "bootstrap-datetimepicker.min.css",
            "jquery.dataTables.css",
            "jquery.onoff.css",
            "style_admin.css",
            "widgets.css",
        )
    ); ?>

    <? echo $this->Html->script("respond.min.js"); ?>
    <!--[if lt IE 9]>
    <? echo $this->Html->script("html5shiv.js"); ?>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="http://gepwnage.nl/favicon.ico">
</head>

<body>

<? if($this->request->param('action') == "admin_login"){
    echo $this->fetch("content");
} else {
    ?>

    <!-- Header starts -->
    <header>
        <div class="container">
            <div class="row">
                <!-- Logo section -->
                <div class="col-md-4">
                    <!-- Logo. -->
                    <div class="logo">
                        <h1><a href="#">LAN<span class="bold">Admin</span></a></h1>

                        <p class="meta">make 'em game</p>
                    </div>
                    <!-- Logo ends -->
                </div>
            </div>
        </div>
    </header>

    <!-- Header ends -->

    <!-- Main content starts -->

    <div class="content">

        <? echo $this->element("sidebar"); ?>

        <!-- Main bar -->
        <div class="mainbar">
            <!-- Page heading -->
            <div class="page-head clearfix">
                <h2 class="pull-left"><i class="fa fa-<?= $icon_for_layout ?>"></i> <?= $title_for_layout ?></h2>
            </div>
            <!-- Page heading ends -->

            <!-- Matter -->
            <div class="matter">
                <div class="container">
		            <?php $flash = $this->Session->flash();
		            if(!empty($flash)){?>
			            <div class="alert alert-info" role="alert">
				            <?= $flash ?>
			            </div>
		            <?php } ?>
                    <? echo $this->fetch("content"); ?>
                </div>
            </div>
            <!-- Matter ends -->

        </div>

        <!-- Mainbar ends -->
        <div class="clearfix"></div>

    </div>
    <!-- Content ends -->

    <!-- Footer starts -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Copyright info -->
                    <p class="copy">Copyright &copy; <?= date("Y"); ?> | GEPWNAGE </p>
                </div>
            </div>
        </div>
    </footer>
<? } ?>

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<!-- JS -->
<? echo $this->Html->script(
    array(
        "jquery.js",
        "bootstrap.min.js",
        "jquery-ui.min.js",
        "fullcalendar.min.js",
        "jquery.rateit.min.js",
        "jquery.prettyPhoto.js",
        "jquery.slimscroll.min.js",
        "jquery.dataTables.min.js",
	    "tinymce.min.js",
	    "jquery.tinymce.min.js",
	    "tinymce/themes/modern/theme.min.js",
    )
); ?>

<!-- jQuery Flot -->
<? echo $this->Html->script(
    array(
        "excanvas.min.js",
        "jquery.flot.js",
        "jquery.flot.resize.js",
        "jquery.flot.pie.js",
        "jquery.flot.stack.js",
    )
); ?>

<!-- jQuery Notification - Noty -->
<? echo $this->Html->script(
    array(
        "jquery.noty.js",
        "themes/default.js",
        "layouts/bottom.js",
        "layouts/topRight.js",
        "layouts/top.js",
    )
); ?>
<!-- jQuery Notification ends -->

<? echo $this->Html->script(
    array(
        "sparklines.js",
        "bootstrap-datetimepicker.min.js",
        "jquery.onoff.min.js",
        "filter.js",
        "custom_admin.js",
        "charts.js",
    )
); ?>

	<script>
		$(document).ready(function(){
			$("textarea.tinymce").tinymce({
				theme: 'modern',
				plugins: [
					"code"
				]
			});
		});
	</script>

</body>
</html>