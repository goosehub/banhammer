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

            <div class="row">
                <div class="col-md-6 col-md-push-3">

                    <h3>New Post</h3>
                    <strong>Following are not allowed</strong>
                    <ul>
                    <?php foreach ($offences as $offence) { ?>
                    <?php if ($offence['slug'] === 'none') { continue; } ?>
                    <li><?php echo deslug($offence['slug']); ?></li>
                    <?php } ?>
                    </ul>

                    <?php if ($validation_errors) { ?>
                    <div class="new_post_validation_errors alert alert-danger"><?php echo $validation_errors; ?></div>
                    <?php } ?>

                    <form id="new_post_form" action="<?=base_url()?>site/<?php echo $slug; ?>/new_post" method="post" enctype="multipart/form-data">
                        <label>Username</label>
                        <?php if ($current_site['anonymous_flag']) { ?>
                        <input type="hidden" class="form-control" name="username" value="Anonymous"/>
                        <input disabled type="text" id="username_input" class="form-control" name="anonymous_username" value="Anonymous"/>
                        <?php } else { ?>
                        <input type="text" id="username_input" class="form-control" name="username" value="<?php echo $user['username']; ?>"/>
                        <?php } ?>
                        <label>Message</label>
                        <textarea id="content_input" class="form-control" name="content"></textarea>
                        <br>
                        <input type="submit" class="form-control custom_btn btn btn-success"/>
                    </form>

                </div>
            </div>

            <br>

            <?php foreach ($posts as $post) { ?>
            <div class="post_parent">
                <span id="queue_post_id_label" class="hidden"><?php echo html_clean($post['id']); ?></span>
                <div class=" thing id-t1_dfs6j4y noncollapsed comment score-hidden">
                   <div class="midcol unvoted">
                      <div class="arrow up login-required access-required" role="button" aria-label="upvote" tabindex="0"></div>
                      <div class="arrow down login-required access-required" role="button" aria-label="downvote" tabindex="0"></div>
                   </div>
                   <div class="entry unvoted">
                      <p class="tagline"><a href="#" class="expand">[–]</a><a href="#" class="author may-blank" id="queue_post_user"><?php echo html_clean($post['username']); ?></a><span class="userattrs"></span> <span class="score-hidden">[score hidden]</span> <time id="queue_post_time_ago" class="live-timestamp"><?php echo get_time_ago(strtotime($post['created'])); ?>></time></p>
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
            <?php } ?>

            <div class="pagination">
                <a class="custom_btn btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>">
                    First
                </a>
                <?php if ($offset >= 1) { ?>
                <a class="custom_btn btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo max($offset - $limit, 0); ?>">
                    Previous
                </a>
                <?php } ?>
                <?php if ($offset + $limit < $post_count) { ?>
                <a class="custom_btn btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo $offset + $limit; ?>">
                    Next
                </a>
                <?php } ?>
                <a class="custom_btn btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo $post_count - $limit; ?>">
                    Last
                </a>
            </div>

            <br>

        </div>
    </div>
</div>