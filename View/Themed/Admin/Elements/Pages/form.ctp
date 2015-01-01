<?
/**
 * @var View $this
 */
$edit = $this->request->param('action') == "admin_edit";
$add = $this->request->param('action') == "admin_add";
?>
<?php echo $this->Form->create("Page", array("class" => "form-horizontal", 'inputDefaults' => array('label' => false, 'div' => false)));?>
    <?php
    if($edit){
        echo $this->Form->input("id", array("type" => "hidden"));
    }
    ?>
    <div class="padd">
        <!-- Content goes here -->
        <div class="form-group">
            <label class="col-lg-2 control-label">Title</label>
            <div class="col-lg-5">
                <?= $this->Form->input("Page.title", array("class" => "form-control"));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Slug</label>
            <div class="col-lg-5">
                <?= $this->Form->input("Page.slug", array("class" => "form-control"));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Content</label>
            <div class="col-lg-5">
                <?= $this->Form->textarea("Page.content", array("class" => "cleditor"));?>
            </div>
        </div>
    </div>
    <div class="widget-foot clearfix">
        <!-- Footer goes here -->
        <?php echo $this->Form->submit("Save", array("class" => "btn btn-sm btn-success pull-right"));?>
        <?php echo $this->Html->link("Cancel", array("controller" => "pages", "action" => "index", "admin" => true), array("class" => "btn btn-sm btn-default pull-right", "style" => "margin-right: 10px;"));?>
    </div>
<?php echo $this->Form->end();?>