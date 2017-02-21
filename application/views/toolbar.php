<nav class="global_toolbar">
    <a class="global_link" href="<?=base_url()?>">
        <div class="global_site_parent">
            <img class="global_site_icon" src="<?=base_url()?>resources/img/favicon.ico" alt="Ban Hammer"/>
            <span class="global_site_name">Ban Hammer</span>
        </div>
    </a>
    <?php foreach ($active_sites as $site) { ?>
    <a class="global_link" href="<?=base_url()?>site/<?php echo $site['slug']; ?>/queue">
        <div class="global_site_parent">
            <img class="global_site_icon" src="<?=base_url()?>resources/sites/<?php echo $site['slug']; ?>/icon.png" alt="<?php echo $site['name']; ?>"/>
            <span class="global_site_name"><?php echo $site['name']; ?></span>
        </div>
    </a>
    <?php } ?>
    <span id="score_parent">
        <?php if ($user['logged_in']) { ?>
        <span id="global_username"><?php echo $user['username']; ?>: </span>
        <span class="score_label"><?php echo $current_site['name']; ?></span>
        <?php } ?>
        <span id="accuracy_parent" class="text-default">
            <span id="accuracy_label" class="score_label">Accuracy</span>
            <span id="accuracy_value_parent" class="score_value"><span id="accuracy_value"><?php echo $user['accuracy']; ?>%</span></span>
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