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
            <label class="col-lg-3 control-label">Title</label>
            <div class="col-lg-7">
                <?= $this->Form->input("Page.title", array("class" => "form-control"));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Slug</label>
            <div class="col-lg-7">
                <?= $this->Form->input("Page.slug", array("class" => "form-control"));?>
            </div>
        </div>
	    <div class="form-group">
		    <label class="col-lg-3 control-label">Facebook image (empty is default)</label>
		    <div class="col-lg-7">
			    <?= $this->Form->input("Page.info.facebook_og", array("class" => "form-control"));?>
		    </div>
	    </div>
	    <div class="form-group">
		    <label class="col-lg-3 control-label">Facebook description (empty = facebook algorithm)</label>
		    <div class="col-lg-7">
			    <?= $this->Form->textarea("Page.info.facebook_description", array("class" => "form-control"));?>
		    </div>
	    </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Language</label>
            <div class="col-lg-7">
                <?= $this->Form->input("Page.language", array("class" => "form-control", "options" => Configure::read("Languages.available")));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Translation of</label>
            <div class="col-lg-7">
                <?= $this->Form->input("Translation.id", array("class" => "form-control", "options" => $originals, 'empty' => 'nothing', 'selected' => $this->request->data('Translation.0.id')));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Homepage</label>
            <div class="col-lg-7">
                <?= $this->Form->input("Page.homepage", array("style" => "margin-top: 11px;"));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Content</label>
            <div class="col-lg-7">
                <?= $this->Form->textarea("Page.content", array("class" => "tinymce", "style" => "height:500px"));?>
            </div>
        </div>
    </div>
    <div class="widget-foot clearfix">
        <!-- Footer goes here -->
        <?php echo $this->Form->submit("Save", array("class" => "btn btn-sm btn-success pull-right"));?>
        <?php echo $this->Html->link("Cancel", array("controller" => "pages", "action" => "index", "admin" => true), array("class" => "btn btn-sm btn-default pull-right", "style" => "margin-right: 10px;"));?>
    </div>
<?php echo $this->Form->end();?>

