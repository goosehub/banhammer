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

    <!-- offence button -->

    <!-- action buttons -->

</div>