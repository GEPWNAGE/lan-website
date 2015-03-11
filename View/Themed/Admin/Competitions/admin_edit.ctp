<?php
/**
 * @var View $this
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-head clearfix">
                <div class="pull-left">Edit competitie - <?= $competition['Competition']['name'] ?></div>
            </div>
            <div class="widget-content">
                <?= $this->element("Competitions/form");?>
            </div>
        </div>

    </div>
</div>