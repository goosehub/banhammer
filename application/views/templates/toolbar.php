<nav id="toolbar">
    <?php foreach ($active_sites as $site) { ?>
    <a href="<?=base_url()?>site/<?php echo $site['slug']; ?>">
        <img src="<?=base_url()?>/resources/img/site_icons/<?php echo $site['slug']; ?>.png" alt="<?php echo $site['name']; ?>" width="20px" height="20px"/>
        <?php echo $site['name']; ?>
    </a>
    <?php } ?>
</nav>