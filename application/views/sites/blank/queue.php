<div class="<?php echo $slug; ?>_parent">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-push-2">

                <hr>

                <a class="btn btn-primary" href="<?=base_url()?>site/<?php echo $slug; ?>">
                    <strong><?php echo deslug($current_site['name']); ?></strong>
                </a>

                <hr>

                <?php if (!$post) { ?>

                <div class="post_parent alert alert-info">
                    <p>Queue Empty.</p>
                </div>

                <h4>Great job! <a class="" href="<?=base_url()?>site/<?php echo $slug; ?>">Consider creating some posts on this site</a>.</h4>

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
                        <div class="post_image_parent">
                            <?php if ($post['image'] && file_exists('./uploads' . $post['image'])) { ?>
                            <img class="post_image img-responsive" src="<?php echo $post['image']; ?>" alt=""/>
                            <?php } ?>
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

</div>