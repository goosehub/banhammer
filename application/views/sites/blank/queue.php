<div class="<?php echo $slug; ?>_parent container">
    <div class="row">
        <div class="col-md-8 col-md-push-2">

            <hr>

            <a class="custom_btn btn btn-primary" href="<?=base_url()?>site/<?php echo $slug; ?>">
                <strong><?php echo deslug($current_site['name']); ?></strong>
            </a>

            <a class="custom_btn btn btn-action" href="<?=base_url()?>site/<?php echo $slug; ?>/queue">
                <strong>Moderator Queue</strong>
            </a>

            <a class="custom_btn btn btn-success" href="<?=base_url()?>site/<?php echo $slug; ?>/leaderboard">
                <strong>Moderator Leaderboard</strong>
            </a>

            <hr>

            <?php if (!$post) { ?>

            <div class="post_parent alert alert-info">
                <p>Queue Empty.</p>
            </div>

            <hr>

            <h4>Great job! <a class="" href="<?=base_url()?>site/<?php echo $slug; ?>"><strong>Consider creating some posts</strong></a>.</h4>

            <?php } else { ?>

            <div class="post_parent">
                <blockquote>
                    <div class="post_user">
                        <small>
                            #<span id="queue_post_id_label"><?php echo html_clean($post['id']); ?></span>
                        </small>
                        <strong id="queue_post_user">
                            <?php echo html_clean($post['username']); ?>
                        </strong>
                    </div>
                    <div id="queue_post_content" class="post_content embedica_this">
                        <?php echo html_clean($post['content']); ?>
                    </div>
                    <div class="post_time">
                        <small id="queue_post_time_ago">
                        <?php echo $post['time_ago']; ?>
                        </small>
                    </div>
                </blockquote>
            </div>

            <?php } ?>

            <hr>

        </div>
    </div>
</div>