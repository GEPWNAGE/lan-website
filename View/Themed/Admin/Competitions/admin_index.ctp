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
					<?= $this->Html->link("Nieuwe competitie", array("controller" => "competitions", "action" => "add", "admin" => true), array("class" => "btn btn-success"));?>
				</div>
			</div>
			<div class="widget-content">
				<div class="padd">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Naam</th>
								<th>Mode</th>
								<th>Deelnemers per team</th>
								<th>Deelnemers ingeschreven</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($competitions as $c){ ?>
								<tr>
									<td style="text-align: right;"><?= $c['Competition']['id'] ?></td>
									<td><?= $c['Competition']['name']; ?></td>
									<td><?= Competition::gameModes($c['Competition']['score_mode']); ?></td>
									<td><?= $c['Competition']['players_per_team']; ?></td>
									<td><?= count($c['CompetitionRegistration']); ?></td>
									<td>
										<?= $this->Html->link("edit", array("controller" => "competitions", "action" => "edit", "admin" => true, $c['Competition']['id']));?>
										<?= $this->Html->link("delete", array("controller" => "competitions", "action" => "delete", "admin" => true, $c['Competition']['id']), null, "Weet je zeker dat je ".$c['Competition']['name']." wilt verwijderen?");?>
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