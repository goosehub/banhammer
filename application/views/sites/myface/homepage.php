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
                        <input type="text" id="username_input" class="form-control" name="username" value="<?php echo $user['username']; ?>"/>
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
            <div class="_1dwg _1w_m _2ph_">
               <div class="_4r_y">
                  <div class="_6a uiPopover _5pbi _cmw _5v56 _b1e" id="u_ps_0_0_3" data-ft="{&quot;tn&quot;:&quot;V&quot;}"><a class="_4xev _p" aria-label="Story options" href="#" aria-haspopup="true" aria-expanded="false" rel="toggle" role="button" id="u_ps_0_0_4"></a></div>
               </div>
               <div class="_4gns accessible_elem" id="js_8"></div>
               <div>
                  <div class="_5x46">
                     <div class="clearfix _5va3">
                        <a class="_5pb8 _8o _8s lfloat _ohe" href="https://www.facebook.com/debra.s.long.1?fref=nf" aria-hidden="true" tabindex="-1" target="" data-ft="{&quot;tn&quot;:&quot;m&quot;}" data-hovercard="/ajax/hovercard/user.php?id=1614885049" data-hovercard-prefer-more-content-show="1">
                           <div class="_38vo"><img class="_s0 _5xib _5sq7 _44ma _rw img" src="https://scontent-mia1-1.xx.fbcdn.net/v/t1.0-1/p50x50/14708256_10209824216434826_176023844845114434_n.jpg?oh=bfe7cf73b25c5c6388ac5405b8fa2a88&amp;oe=596E8D2A" alt=""></div>
                        </a>
                        <div class="clearfix _42ef">
                           <div class="rfloat _ohf"></div>
                           <div class="_5va4">
                              <div>
                                 <div class="_6a _5u5j">
                                    <div class="_6a _6b" style="height:40px"></div>
                                    <div class="_6a _5u5j _6b">
                                       <h5 class="_5pbw _5vra" data-ft="{&quot;tn&quot;:&quot;C&quot;}" id="js_9"><span class="fwn fcg"><span class="fwb fcg" data-ft="{&quot;tn&quot;:&quot;;&quot;}"><a href="https://www.facebook.com/debra.s.long.1?hc_ref=NEWSFEED&amp;fref=nf" data-hovercard="/ajax/hovercard/user.php?id=1614885049&amp;extragetparams=%7B%22hc_ref%22%3A%22NEWSFEED%22%2C%22fref%22%3A%22nf%22%7D" data-hovercard-prefer-more-content-show="1">Debra Schmalz Long</a></span></span></h5>
                                       <div class="_5pcp _5lel">
                                          <span class="_5paw _14zs" data-ft="{&quot;tn&quot;:&quot;j&quot;}"><a class="_3e_2 _14zr" href="#"></a></span><span role="presentation" aria-hidden="true"> · </span><span><span class="fsm fwn fcg"><a class="_5pcq" href="/debra.s.long.1/posts/10211108621064139" target=""><abbr title="Sunday, March 5, 2017 at 11:13am" data-utime="1488730425" data-shorten="1" class="_5ptz timestamp livetimestamp"><span class="timestampContent" id="js_a">1 hr</span></abbr></a><span role="presentation" aria-hidden="true"> · </span><a class="_5pcq" href="https://www.facebook.com/pages/Jacksonville-Florida/108127182549256" data-hovercard="/ajax/hovercard/page.php?id=108127182549256" data-hovercard-prefer-more-content-show="1">Jacksonville</a></span></span><span role="presentation" aria-hidden="true"> · </span>
                                          <div class="_6a _29ee _4f-9 _43_1" data-hover="tooltip" data-tooltip-content="Shared with: Debra's friends" role="img" aria-label="Shared with: Debra's friends"><span><i class="_1lbg img sp_KBDvVbLuGNE sx_5a17ad"></i></span></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="_5pbx userContent" data-ft="{&quot;tn&quot;:&quot;K&quot;}" id="js_b">
                     <div id="id_58bc4e22e70ea2185486492" class="text_exposed_root">
                        <p>Hello FB friends &amp; family. I would love to request your support. No obligation to repost, I'm not going to unfriend you. I'm Not gonna say bye-bye to some of you.. Now I'm watching the ones who will have the time to read this post until the end. This is a little test, just to see who reads and who shares without reading! If you have read everything, select "like" so i can put a thank u on ur profile! I know that most of you won't do this, but my true friends will be the few t<span class="text_exposed_hide">...</span><span class="text_exposed_show">hat do. Please, in honor of someone who died, or is fighting cancer, or even had cancer, copy and paste. Write "done" in comments when you're finished. I can put a thank u on ur profile! I know that 97% of you won't broadcast this, but my friends will be the 3% that do. Please, in honor of someone who died, or is fighting cancer, or even had cancer, copy and paste. Write "done" in comments when you're finished.<br> Thanks and be blessed <span class="_5mfr _47e3"><img class="img" aria-hidden="1" height="16" src="https://www.facebook.com/images/emoji.php/v7/f6c/1/16/2764.png" width="16" alt=""><span class="_7oe">❤️</span></span>done</span></p>
                        <span class="text_exposed_hide"> <span class="text_exposed_link"><a class="see_more_link" onclick="var func = function(e) { e.preventDefault(); }; var parent = Parent.byClass(this, &quot;text_exposed_root&quot;); if (parent &amp;&amp; parent.getAttribute(&quot;id&quot;) == &quot;id_58bc4e22e70ea2185486492&quot;) { CSS.addClass(parent, &quot;text_exposed&quot;); Arbiter.inform(&quot;reflow&quot;); }; func(event); " href="/debra.s.long.1/posts/10211108621064139" data-ft="{&quot;tn&quot;:&quot;e&quot;}"><span class="see_more_link_inner">See More</span></a></span></span>
                     </div>
                  </div>
                  <div class="_3x-2">
                     <div data-ft="{&quot;tn&quot;:&quot;H&quot;}"></div>
                  </div>
                  <div></div>
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