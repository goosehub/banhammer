<nav class="toolbar">
    <?php foreach ($active_sites as $site) { ?>
    <a class="toolbar_link" href="<?=base_url()?>site/<?php echo $site['slug']; ?>">
        <div class="toolbar_site_parent">
            <img class="toolbar_site_icon" src="<?=base_url()?>resources/img/site_icons/<?php echo $site['slug']; ?>.png" alt="<?php echo $site['name']; ?>"/>
            <span class="toolbar_site_name"><?php echo $site['name']; ?></span>
        </div>
    </a>
    <?php } ?>
</nav>