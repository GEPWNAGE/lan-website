<?php
/**
 * @var View $this
 */
?>
<style>
	.row a:hover{
		text-decoration: none;
	}
</style>
<div class="row">
	<div class="col-md-4 col-sm-12">
		<a href="<?= $this->Html->url(array("controller" => "competitions", "action" => "index", "slug" => "hearthstone"));?>" title="Hearthstone" style="max-width: 100%;">
			<h2 class="text-center">Vrijdag 00:00</h2><br>
			<img src="http://static.gepwnage.nl/Hearthstone_Logo.png" alt="Hearthstone" style="max-width: 100%;"/>
		</a>
	</div>
	<div class="col-md-4 col-sm-12">
		<a href="<?= $this->Html->url(array("controller" => "competitions", "action" => "index", "slug" => "wolfenstein"));?>" title="Hearthstone" style="max-width: 100%;">
			<h2 class="text-center">Zaterdag 20:00</h2><br>
			<img src="http://static.gepwnage.nl/Wolfenstein_Enemy_Territory_logo.png" alt="Hearthstone" style="max-width: 100%;"/>
		</a>
	</div>
	<div class="col-md-4 col-sm-12">
		<a href="<?= $this->Html->url(array("controller" => "competitions", "action" => "index", "slug" => "worms"));?>" title="Hearthstone" style="max-width: 100%;">
			<h2 class="text-center">Zondag 12:00</h2><br>
			<img src="http://static.gepwnage.nl/Worms-World-Party.jpg" alt="Hearthstone" style="max-width: 100%;"/>
		</a>
	</div>
</div>