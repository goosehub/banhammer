<div class="<?php echo $slug; ?>_parent">

    <a href="<?=base_url()?>site/<?php echo $slug; ?>/queue">
        Moderator Queue
    </a>

    <?php if ($validation_errors) { ?>
    <div class="new_post_validation_errors"><?php echo $validation_errors; ?></div>
    <?php } ?>

    <form id="new_post_form" action="<?=base_url()?>site/<?php echo $slug; ?>/new_post" method="post" enctype="multipart/form-data">
        <input type="text" id="username_input" name="username"/>
        <input type="file" id="image_input" name="image"/>
        <textarea id="content_input" name="content">
        </textarea>
        <input type="submit"/>
    </form>

    <?php foreach ($posts as $post) { ?>
    <div class="post_parent">
        <div class="post_username">
            <strong>
                <?php echo html_escape($post['username']); ?>
            </strong>
        </div>
        <div class="post_content">
            <?php echo html_escape($post['content']); ?>
        </div>
    </div>
    <?php } ?>

</div>