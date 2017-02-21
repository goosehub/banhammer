<div class="<?php echo $slug; ?>_parent container">
    <div class="row">
        <div class="col-md-8 col-md-push-2">

            <hr>

            <a class="btn btn-primary" href="<?=base_url()?>site/<?php echo $slug; ?>">
                <strong><?php echo deslug($current_site['name']); ?></strong>
            </a>

            <a class="btn btn-action" href="<?=base_url()?>site/<?php echo $slug; ?>/queue">
                <strong>Moderator Queue</strong>
            </a>

            <a class="btn btn-success" href="<?=base_url()?>site/<?php echo $slug; ?>/leaderboard">
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
                            #<?php echo html_clean($post['id']); ?>
                        </small>
                        <strong>
                            <?php echo html_clean($post['username']); ?>
                        </strong>
                    </div>
                    <div class="post_content embedica_this">
                        <?php echo html_clean($post['content']); ?>
                    </div>
                    <div class="post_time">
                        <small>
                        <?php echo get_time_ago(strtotime($post['created'])); ?>
                        </small>
                    </div>
                </blockquote>
            </div>

            <?php } ?>

            <hr>

        </div>
    </div>
</div>