<?php
/**
 * @var View $this
 * @var $participants
 */
$i = 0;
?>
<div class="table-responsive">
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tbody>
        <?php foreach($participants as $p){
            if($i % 20 == 0){ ?>
                <tr class="heading">
                    <th style="width: 20px;">&nbsp;</th>
                    <th style="width: 28px;">&nbsp;</th>
                    <th style="width: 180px;">Naam</th>
                    <th style="width: 90px;">Laptop / PC</th>
                    <th style="width: 100px;">Slaapplek nodig</th>
                    <th style="width: 70px;">Betaald</th>
                </tr>
            <?php } ?>
            <tr class="one">
                <td style="text-align: right;"><?= $i + 1 ?></td>
                <td style="text-align: center;">
                    <?php if($p['Participant']['info']['relation'] != "Overig" && !empty($p['Participant']['info']['relation'])){?>
                        <img title="<?=$p['Participant']['info']['relation']?>" src="/img/rel/<?=strtolower(str_replace(".", "", $p['Participant']['info']['relation']))?>.png">
                    <?php } ?>
                </td>
                <td><?= $p['Participant']['name']; ?></td>
                <td><?= Hash::get($p, 'Participant.info.laptop', true) ? "Laptop" : "PC"; ?></td>
                <td><?= Hash::get($p, 'Participant.info.bed', true) ? "Ja" : "Nee"; ?></td>
                <td><?= Hash::get($p, 'Participant.info.payed', true) ? "Ja" : "Nee"; ?></td>
            </tr>
        <?php $i++;} ?>
        </tbody>
    </table>
</div>