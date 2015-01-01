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
        <li><a href="index.html"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="has_sub <?= !in_array($controller, array("pages")) ?: "open"?>">
            <a href="#"><i class="fa fa-file-o"></i> Website Content <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><?php echo $this->Html->link("Pages", array("controller" => "pages", "action" => "index", "admin" => true));?></li>
                <li><a href="#">Menus</a></li>
            </ul>
        </li>
        <li class="has_sub <?= !in_array($controller, array("competitions")) ?: "open"?>">
            <a href="#"><i class="fa fa-bolt"></i> Competitions <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="media.html">Media</a></li>
                <li><a href="statement.html">Statement</a></li>
                <li><a href="error.html">Error</a></li>
                <li><a href="error-log.html">Error Log</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="grid.html">Grid</a></li>
            </ul>
        </li>
    </ul>
</div>

<!-- Sidebar ends -->