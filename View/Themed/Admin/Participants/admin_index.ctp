<?php
/**
 * @var View $this
 * @var array $pages
 */
?>
<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-head clearfix">
				<div class="pull-right">
					<?= $this->Html->link("Nieuwe deelnemer", array("controller" => "participants", "action" => "add", "admin" => true), array("class" => "btn btn-success"));?>
				</div>
			</div>
			<div class="widget-content">
				<div class="padd">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Relatie</th>
								<th>Naam</th>
								<th>Laptop/PC</th>
								<th>Slaapplek</th>
								<th>Betaald</th>
								<th>Opmerking</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($participants as $p){ ?>
								<tr>
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
									<td>
										<?= $this->Html->link("edit", array("controller" => "participants", "action" => "edit", "admin" => true, $p['Participant']['id']));?>
										<?= $this->Html->link("delete", array("controller" => "participants", "action" => "delete", "admin" => true, $p['Participant']['id']), null, "Weet je zeker dat je ".$p['Participant']['name']." wilt verwijderen?");?>
									</td>
								</tr>
							<? } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>