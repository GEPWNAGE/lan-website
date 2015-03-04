<?php
/**
 * @var View $this
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-head clearfix">
                <div class="pull-left">Edit deelnemer - <?= $participant['Participant']['name'] ?></div>
            </div>
            <div class="widget-content">
                <?= $this->element("Participants/form");?>
            </div>
        </div>

    </div>
</div>