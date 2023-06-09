<?php $parent_id = \fw\App::$app->getProperty('parent_id'); ?>
<option value="<?=$id;?>"<?php if($id == $parent_id) echo ' selected'; ?><?php if(isset($_GET['id']) && $id == $_GET['id']) echo ' disabled'; ?>>
    <?=$tab . $mappoint['name'];?>
</option>
<?php if(isset($mappoint['childs'])): ?>
    <?= $this->getMenuHtml($mappoint['childs'], '&nbsp;' . $tab. '-') ?>
<?php endif; ?>