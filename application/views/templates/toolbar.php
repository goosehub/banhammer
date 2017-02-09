<nav id="toolbar">
    <?php foreach ($active_sites as $site) { ?>
    <a href="<?=base_url()?>site/<?php echo $site['slug']; ?>">
        <img class="toolbar_site_icon" src="<?=base_url()?>/resources/img/site_icons/<?php echo $site['slug']; ?>.png" alt="<?php echo $site['name']; ?>"/>
        <span class="toolbar_site_name"><?php echo $site['name']; ?></span>
    </a>
    <?php } ?>
</nav>