<?
/**
 * @var View $this
 */
$edit = $this->request->param('action') == "admin_edit";
$add = $this->request->param('action') == "admin_add";
?>
<?php echo $this->Form->create("Competition", array("class" => "form-horizontal", 'inputDefaults' => array('label' => false, 'div' => false)));?>
<?php
if($edit){
	echo $this->Form->input("id", array("type" => "hidden"));
}
?>
<div class="padd">
	<div class="form-group">
		<label class="col-lg-3 control-label">Name</label>
		<div class="col-lg-7">
			<?= $this->Form->input("Competition.name", array("class" => "form-control"));?>
		</div>
	</div>
	<?php if($edit){ ?>
		<div class="form-group">
			<label class="col-lg-3 control-label">Slug</label>
			<div class="col-lg-7">
				<?= $this->Form->input("Competition.slug", array("class" => "form-control"));?>
			</div>
		</div>
	<?php } ?>
	<div class="form-group">
		<label class="col-lg-3 control-label">Mode</label>
		<div class="col-lg-7">
			<?= $this->Form->select("Competition.score_mode", Competition::gameModes(), array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Players per team</label>
		<div class="col-lg-7">
			<?= $this->Form->input("Competition.players_per_team", array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Teams per match</label>
		<div class="col-lg-7">
			<?= $this->Form->input("Competition.teams_per_match", array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Description NL</label>
		<div class="col-lg-7">
			<?= $this->Form->textarea("Competition.info.description.nl", array("class" => "tinymce", "style" => "height:400px;"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">Description EN</label>
		<div class="col-lg-7">
			<?= $this->Form->textarea("Competition.info.description.en", array("class" => "tinymce", "style" => "height:400px;"));?>
		</div>
	</div>

</div>
<div class="widget-foot clearfix">
	<!-- Footer goes here -->
	<?php echo $this->Form->submit("Save", array("class" => "btn btn-sm btn-success pull-right"));?>
	<?php echo $this->Html->link("Cancel", array("controller" => "competitions", "action" => "index", "admin" => true), array("class" => "btn btn-sm btn-default pull-right", "style" => "margin-right: 10px;"));?>
</div>
<?php echo $this->Form->end();?>

