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
                    <?= $this->Html->link("new page", array("controller" => "pages", "action" => "add", "admin" => true), array("class" => "btn btn-success"));?>
                </div>
            </div>
            <div class="widget-content">
                <div class="padd">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pages as $p){ ?>
                            <tr>
                                <td><?= $p['Page']['title'] ?></td>
                                <td><?= $p['Page']['slug'] ?></td>
                                <td><?= $this->Html->link("edit", array("controller" => "pages", "action" => "edit", "admin" => true, $p['Page']['id']));?></td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>