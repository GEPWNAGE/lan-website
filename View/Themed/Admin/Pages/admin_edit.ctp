<?
/**
 * @var View $this
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-head clearfix">
                <div class="pull-left">Edit page - <?= $page['Page']['title'] ?></div>
            </div>
            <div class="widget-content">
                <?= $this->element("Pages/form");?>
            </div>
        </div>

    </div>
</div>