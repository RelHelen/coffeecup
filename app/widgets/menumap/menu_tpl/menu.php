<li>  
    <a href="?id=<?=$id;?>"> <?=$mappoint['name'];?></a>
    <?php if(isset($mappoint['childs'])): ?>
        <ul> 
            <?= $this->getMenuHtml($mappoint['childs']);?>
        </ul>
    <?php endif; ?>
</li>