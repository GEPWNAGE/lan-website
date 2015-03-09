<?
/**
 * @var View $this
 */
$action = $this->request->param('action');
$controller = $this->request->param('controller');
?>
<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
        <!-- Main menu with font awesome icon -->
        <li class="has_sub <?= !in_array($controller, array("pages")) ?: "open"?>">
            <a href="#"><i class="fa fa-file-o"></i> Website Content <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><?php echo $this->Html->link("Pages", array("controller" => "pages", "action" => "index", "admin" => true));?></li>
                <li><a href="#">Menus</a></li>
            </ul>
        </li>
	    <li class="has_sub <?= !in_array($controller, array("participants")) ?: "open"?>">
		    <a href="#"><i class="fa fa-male"></i> Deelnemers <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
		    <ul>
			    <li><a href="<?php echo $this->Html->url(array("controller" => "participants", "action" => "index", "admin" => true));?>">Lijst</a></li>
			    <li><a href="<?php echo $this->Html->url(array("controller" => "participants", "action" => "add", "admin" => true));?>">Nieuw</a></li>
			    <li><a href="<?php echo $this->Html->url(array("controller" => "participants", "action" => "mail", "admin" => true));?>">Mail</a></li>
		    </ul>
	    </li>
    </ul>
</div>

<!-- Sidebar ends -->