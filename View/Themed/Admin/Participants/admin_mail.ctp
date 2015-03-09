<?php
/**
 * @var View $this
 * @var array $participants
 */
echo $this->Form->create(null, array("class" => "form-horizontal", 'inputDefaults' => array('label' => false, 'div' => false)));?>
<div class="padd">
		<div class="form-group">
			<label class="col-lg-2 control-label">Participants</label>
			<div class="col-lg-5" style="max-height: 400px;overflow: auto;">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><input type="checkbox" onchange="console.log($(this).is(':checked'));if($(this).is(':checked')){$(this).closest('table').find('tbody input[type=checkbox]').prop('checked', true);}else{$(this).closest('table').find('tbody input[type=checkbox]').prop('checked', false);}"/> </th>
							<th>ID</th>
							<th>Relatie</th>
							<th>Naam</th>
							<th>Laptop/PC</th>
							<th>Slaapplek</th>
							<th>Betaald</th>
							<th>Opmerking</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($participants as $p){ ?>
							<tr>
								<td><?= $this->Form->checkbox("Email.participant.".$p['Participant']['id']);?></td>
								<td style="text-align: right;"><?= $p['Participant']['id'] ?></td>
								<td style="text-align: center;">
									<?php if($p['Participant']['info']['relation'] != "Overig" && !empty($p['Participant']['info']['relation'])){?>
										<img title="<?=$p['Participant']['info']['relation']?>" src="/img/rel/<?=strtolower(str_replace(".", "", $p['Participant']['info']['relation']))?>.png">
									<?php } ?>
								</td>
								<td><?= $p['Participant']['name']; ?></td>
								<td><?= Hash::get($p, 'Participant.info.laptop', true) ? "Laptop" : "PC"; ?></td>
								<td><?= Hash::get($p, 'Participant.info.bed', true) ? "Ja" : "Nee"; ?></td>
								<td><?= Hash::get($p, 'Participant.info.payed', true) ? "Ja" : "Nee"; ?></td>
								<td><p style="max-width: 75px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= Hash::get($p, 'Participant.info.note') ?></p></td>
							</tr>
						<? } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Subject</label>
			<div class="col-lg-5">
				<?= $this->Form->input( "Email.Subject", array("class" => "form-control")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Content</label>
			<small>[name] will be replaced</small>
			<div class="col-lg-5">
				<?= $this->Form->textarea( "Email.Content", array( "class" => "form-control", "style" => "height: 400px;" ) ); ?>
			</div>
		</div>
	</div>
	<div class="widget-foot clearfix">
		<!-- Footer goes here -->
		<?php echo $this->Form->submit( "Mail", array( "class" => "btn btn-sm btn-success pull-right" ) ); ?>
		<?php echo $this->Html->link( "Cancel", array( "controller" => "participants", "action" => "index", "admin" => true ), array( "class" => "btn btn-sm btn-default pull-right", "style" => "margin-right: 10px;" ) ); ?>
	</div>
<?php echo $this->Form->end(); ?>