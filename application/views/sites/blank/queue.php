<div class="<?php echo $slug; ?>_parent">

    <a href="<?=base_url()?>site/<?php echo $slug; ?>">
        Homepage
    </a>

    <hr>

    <div class="post_parent">
        <div class="post_username">
            <strong>
                <?php echo html_clean($post['username']); ?>
            </strong>
        </div>
        <div class="post_content">
            <?php echo html_clean($post['content']); ?>
        </div>
    </div>

    <hr>

</div>