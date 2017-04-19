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

            <div id="queue_empty_parent" <?php if ($post) { echo 'style="display: none;"'; } ?>>
                <div class="post_parent alert alert-info">
                    <p>Queue Empty.</p>
                </div>
                <hr>
                <h4>Great job! <a class="" href="<?=base_url()?>site/<?php echo $slug; ?>"><strong>Consider creating some posts</strong></a>.</h4>
            </div>

            <div id="queue_post_parent" class="post_parent" <?php if (!$post) { echo 'style="display: none;"'; } ?>>
                <span id="queue_post_id_label" class="hidden"><?php echo html_clean($post['id']); ?></span>
                <div class=" thing id-t1_dfs6j4y noncollapsed comment score-hidden">
                   <div class="midcol unvoted">
                      <div class="arrow up login-required access-required" role="button" aria-label="upvote" tabindex="0"></div>
                      <div class="arrow down login-required access-required" role="button" aria-label="downvote" tabindex="0"></div>
                   </div>
                   <div class="entry unvoted">
                      <p class="tagline"><a href="#" class="expand">[–]</a><a href="#" class="author may-blank" id="queue_post_user"><?php echo html_clean($post['username']); ?></a><span class="userattrs"></span> <span class="score-hidden">[score hidden]</span> <time id="queue_post_time_ago" class="live-timestamp"><?php echo get_time_ago(strtotime($post['created'])); ?></time></p>
                      <form action="#" class="usertext warn-on-unload">
                         <div class="usertext-body may-blank-within md-container ">
                            <div class="md">
                               <p><span id="queue_post_content" class="post_content embedica_this"><?php echo html_clean($post['content']); ?></span></p>
                            </div>
                         </div>
                      </form>
                   </div>
                   <div class="clearleft"></div>
                </div>
            </div>

            <hr>

        </div>
    </div>
</div>