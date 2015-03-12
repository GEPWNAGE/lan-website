<?
/**
 * @var View $this
 */
$edit = $this->request->param('action') == "admin_edit";
$add = in_array($this->request->param('action'), array("admin_add", "add"));
?>
<?php echo $this->Form->create("Gamer", array("class" => "form-horizontal", 'inputDefaults' => array('label' => false, 'div' => false)));?>
<?php
if($edit){
	echo $this->Form->input("id", array("type" => "hidden"));
}
?>
<p>Welkom op de GEPWNAGE LAN! Nu je hier bent wil je waarschijnlijk direct gamen. Voordat dat kan moet je nog even een naam voor je computer kiezen. De naam die je kiest zal in de DNS-server gezet worden, zodat je in de meeste games kan volstaan met het invullen van die naam in plaats van het hele IP-adres.</p>
<br>
<p>Pas na het kiezen van een naam kom je op het game-netwerk terecht. Je kan hieronder voor &eacute;&eacute;n computer een naam kiezen. Als je nog een extra computer hebt meegenomen kan je aan iemand van GEPWNAGE vragen voor een extra code.</p>
<br>
<div class="padd">
	<div class="form-group">
		<label class="col-lg-2 control-label">Naam</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Gamer.name", array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Nickname</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Gamer.nickname", array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Computer naam</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Gamer.hostname", array("class" => "form-control"));?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Code</label>
		<div class="col-lg-5">
			<?= $this->Form->input("Gamer.key", array("class" => "form-control"));?>
			<p class="text-info" style="padding-top: 10px;">Nog geen code? Spreek iemand van GEPWNAGE aan!</p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label"></label>
		<div class="col-lg-5">
			<?php echo $this->Form->submit("Registreer!", array("class" => "btn btn-sm btn-success pull-right"));?>
		</div>
	</div>
</div>
<?php echo $this->Form->end();?>

