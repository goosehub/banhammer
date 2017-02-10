<div class="<?php echo $slug; ?>_parent">

    <a href="<?=base_url()?>site/<?php echo $slug; ?>">
        Back to <?php echo $current_site['name']; ?>
    </a>

    <div class="post_parent">
        <div class="post_username">
            <?php echo html_escape($post['username']); ?>
        </div>
        <div class="post_content">
            <?php echo html_escape($post['content']); ?>
        </div>
    </div>

    <hr>

    <form id="queue_form" action="<?=base_url()?>site/<?php echo $slug; ?>/queue" method="post">
        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>

        <div id="offence_parent">
            <input type="hidden" id="offence_input" name="offence"/>
            <?php foreach ($offences as $offence) { ?>
                <?php $style = $offence['slug'] === 'none' ? 'primary' : 'danger'; ?>
                <div class="offence_button btn btn-<?php echo $style; ?>" offence="<?php echo $offence['id']; ?>">
                    <?php echo deslug($offence['slug']); ?>
                </div>
            <?php } ?>
        </div>

        <hr>

        <div id="action_parent" style="display: none;">
            <input type="hidden" id="action_input" name="action"/>
            <?php foreach ($actions as $action) { ?>
                <?php $style = $action['slug'] === 'none' ? 'primary' : 'danger'; ?>
                <div class="action_button btn btn-<?php echo $style; ?>" action="<?php echo $action['id']; ?>">
                    <?php echo deslug($action['slug']); ?>
                </div>
            <?php } ?>
        </div>

    </form>

</div>