<?
/**
 * @var View $this
 */
$edit = $this->request->param('action') == "admin_edit";
$add = $this->request->param('action') == "admin_add";
?>
<?php echo $this->Form->create("Participant", array("class" => "form-horizontal", 'inputDefaults' => array('label' => false, 'div' => false)));?>
<?php
if($edit){
	echo $this->Form->input("id", array("type" => "hidden"));
}
?>
<div class="padd">
	<div class="form-group">
		<label class="col-lg-2 control-label">Name</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Participant.name", array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">E-mail</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Participant.email", array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Relatie</label>
		<div class="col-lg-5">
			<?= $this->Form->select("Participant.info.relation", $relations, array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Laptop</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Participant.info.laptop", array("type" => "checkbox", "style" => "margin-top: 11px;"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Slaapplek</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Participant.info.bed", array("type" => "checkbox", "style" => "margin-top: 11px;"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Betaald</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Participant.info.payed", array("type" => "checkbox", "style" => "margin-top: 11px;"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Opmerking</label>
		<div class="col-lg-5">
			<?= $this->Form->textarea("Participant.info.note", array("class" => "form-control"));?>
		</div>
	</div>
</div>
<div class="widget-foot clearfix">
	<!-- Footer goes here -->
	<?php echo $this->Form->submit("Save", array("class" => "btn btn-sm btn-success pull-right"));?>
	<?php echo $this->Html->link("Cancel", array("controller" => "participants", "action" => "index", "admin" => true), array("class" => "btn btn-sm btn-default pull-right", "style" => "margin-right: 10px;"));?>
</div>
<?php echo $this->Form->end();?>

