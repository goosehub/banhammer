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

                    <h3>Create a Post</h3>
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
                        <input type="text" id="username_input" class="form-control" name="username" value="<?php echo $user['username']; ?>"/>
                        <label>Message</label>
                        <textarea id="content_input" class="form-control" name="content" placeholder="What's on your mind?"></textarea>
                        <br>
                        <input type="submit" class="form-control custom_btn btn btn-success"/>
                    </form>

                </div>
            </div>

            <br>

            <?php foreach ($posts as $post) { ?>
            <span class="hidden"><?php echo html_clean($post['id']); ?></span>
            <div class="_1dwg _1w_m _2ph_">
               <div>
                  <div class="_5x46">
                     <div class="clearfix _5va3">
                        <a class="_5pb8 _8o _8s lfloat _ohe" href="#" aria-hidden="true" tabindex="-1" target="">
                           <div class="_38vo"><img class="_s0 _5xib _5sq7 _44ma _rw img" src="<?=base_url()?>resources/img/anon_portrait.png" alt=""></div>
                        </a>
                        <div class="clearfix _42ef">
                           <div class="rfloat _ohf"></div>
                           <div class="_5va4">
                              <div>
                                 <div class="_6a _5u5j">
                                    <div class="_6a _5u5j _6b">
                                       <h5 class="_5pbw _5vra" id="js_9"><span class="fwn fcg"><span class="fwb fcg"><a href="#"><?php echo html_clean($post['username']); ?></a></span></span></h5>
                                       <div class="_5pcp _5lel">
                                          <span class="_5paw _14zs"><a class="_3e_2 _14zr" href="#"></a></span><span><span class="fsm fwn fcg"><a class="_5pcq" href="#" target=""><abbr class="_5ptz timestamp livetimestamp"><span class="timestampContent"><?php echo get_time_ago(strtotime($post['created'])); ?></span></abbr></a>
                                              <?php /* <span role="presentation" aria-hidden="true"> · </span> */ ?>
                                          </span></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="_5pbx userContent">
                     <div id="id_58bc4e22e70ea2185486492" class="text_exposed_root">
                        <p><span class="post_content embedica_this">
                            <?php echo html_clean($post['content']); ?>
                        </span></p>
                     </div>
                  </div>
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