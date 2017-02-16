<nav class="toolbar">
    <a class="toolbar_link" href="<?=base_url()?>">
        <div class="toolbar_site_parent">
            <img class="toolbar_site_icon" src="<?=base_url()?>resources/img/favicon.ico" alt="Moderator"/>
            <span class="toolbar_site_name">Mod</span>
        </div>
    </a>
    <?php foreach ($active_sites as $site) { ?>
    <a class="toolbar_link" href="<?=base_url()?>site/<?php echo $site['slug']; ?>/queue">
        <div class="toolbar_site_parent">
            <img class="toolbar_site_icon" src="<?=base_url()?>resources/sites/<?php echo $site['slug']; ?>/icon.png" alt="<?php echo $site['name']; ?>"/>
            <span class="toolbar_site_name"><?php echo $site['name']; ?></span>
        </div>
    </a>
    <?php } ?>
    <span id="score_parent" class="pull-right">
        <?php if ($user['logged_in']) { ?>
        <span id="toolbar_username"><?php echo $user['username']; ?>: </span>
        <?php } ?>
        <span id="site_name"><?php echo $current_site['name']; ?></span>
        <span id="reputation_parent" class="text-default">
            <span id="reputation_label" class="score_label">Accuracy</span>
            <span id="reputation_value" class="score_value"><?php echo accuracy_calculator($user['current_account']['pass'], $user['current_account']['fail']); ?>%</span>
        </span>
        <span id="streak_parent" class="text-primary">
            <span id="streak_label" class="score_label">Streak</span>
            <span id="streak_value" class="score_value"><?php echo $user['current_account']['streak']; ?></span>
        </span>
        <span id="pass_parent" class="text-success">
            <span id="pass_label" class="score_label">Pass</span>
            <span id="pass_value" class="score_value"><?php echo $user['current_account']['pass']; ?></span>
        </span>
        <span id="fail_parent" class="text-danger">
            <span id="fail_label" class="score_label">Fail</span>
            <span id="fail_value" class="score_value"><?php echo $user['current_account']['fail']; ?></span>
        </span>
    </span>
</nav>