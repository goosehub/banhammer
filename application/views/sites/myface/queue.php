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
                                           <h5 class="_5pbw _5vra" id="js_9"><span class="fwn fcg"><span class="fwb fcg"><a href="#" id="queue_post_user"><?php echo html_clean($post['username']); ?></a></span></span></h5>
                                           <div class="_5pcp _5lel">
                                              <span class="_5paw _14zs"><a class="_3e_2 _14zr" href="#"></a></span><span><span class="fsm fwn fcg"><a class="_5pcq" href="#" target=""><abbr class="_5ptz timestamp livetimestamp"><span class="timestampContent" id="queue_post_time_ago"><?php echo get_time_ago(strtotime($post['created'])); ?></span></abbr></a>
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
                            <p><span id="queue_post_content" class="post_content embedica_this">
                                <?php echo html_clean($post['content']); ?>
                            </span></p>
                         </div>
                      </div>
                   </div>
                </div>
            </div>

            <hr>

        </div>
    </div>
</div>