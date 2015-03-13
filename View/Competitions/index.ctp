<?php
/**
 * @var View $this
 */
?>
<div class="small-12">
	<?= $competition['Competition']['info']['description']['nl'] ?>
</div>
<?php $flash = $this->Session->flash('flash');
if(!empty($flash)){ ?>
	<div class="alert alert-info">
		<?= $flash;?>
	</div>
<?php } ?>
<?php if($competition['Competition']['players_per_team'] > 1){?>
	<h1 class="text-warning">Het is nog niet mogelijk om je in te schrijven voor deze competitie</h1>
<?php } else { ?>
	<div class="col-md-6 col-sm-12">
		<?php if(isset($currentGamer) && !in_array($competition['Competition']['id'], Hash::extract($currentGamer, "CompetitionRegistration.{n}.id"))){ ?>
			<?= $this->Form->create("CompetitionRegistration", array("class" => "form-horizontal", "action" => "add", 'inputDefaults' => array('label' => false, 'div' => false))); ?>
			<div class="padd">
				<?= $this->Form->hidden("CompetitionRegistration.competition_id", array("value" => $competition['Competition']['id'])); ?>
				<div class="form-group">
					<label class="col-lg-2 control-label"></label>
					<div class="col-lg-10">
						<h2 class="text-info">Je bent op dit moment nog niet ingeschreven!</h2>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Nickname</label>
					<div class="col-lg-8">
						<p class="form-control" style="border:none;box-shadow:none;"><?= $currentGamer['Gamer']['nickname']?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label"></label>
					<div class="col-lg-10">
						<?php echo $this->Form->submit("Inschrijven", array("class" => "btn btn-sm btn-success"));?>
					</div>
				</div>
			</div>
			<?= $this->Form->end(); ?>
		<?php } else if(isset($currentGamer)){ ?>
			<?= $this->Form->create("CompetitionRegistration", array("class" => "form-horizontal", "action" => "delete", 'inputDefaults' => array('label' => false, 'div' => false))); ?>
			<div class="padd">
				<?= $this->Form->hidden("CompetitionRegistration.competition_id", array("value" => $competition['Competition']['id'])); ?>
				<div class="form-group">
					<label class="col-lg-2 control-label"></label>
					<div class="col-lg-10">
						<h2 class="text-info">Je bent op dit moment ingeschreven</h2>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Nickname</label>
					<div class="col-lg-8">
						<p class="form-control" style="border:none;box-shadow:none;"><?= $currentGamer['Gamer']['nickname']?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label"></label>
					<div class="col-lg-10">
						<?php echo $this->Form->submit("Uitschrijven", array("class" => "btn btn-sm btn-danger"));?>
					</div>
				</div>
			</div>
			<?= $this->Form->end(); ?>
		<?php } ?>
	</div>
	<div class="col-md-6 col-sm-12">
		<h2>Ingeschreven deelnemers</h2>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Gamer</th>
						<?php if($competition['Competition']['players_per_team'] > 1){?>
							<th>Team</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
				<?php foreach ( $competition['CompetitionRegistration'] as $registration ) { ?>
					<tr>
						<td><?= $registration['Gamer']['nickname']?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
<?php } ?>