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
            </div>
            <div class="widget-content">
                <div class="padd">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naam</th>
                            <th>Nickname</th>
                            <th>Hostname</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($gamers as $g){ ?>
                            <tr>
                                <td style="text-align: right;"><?= $g['Gamer']['id'] ?></td>
                                <td><?= $g['Gamer']['name']; ?></td>
                                <td><?= $g['Gamer']['nickname']; ?></td>
                                <td><?= $g['Gamer']['hostname']; ?></td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>