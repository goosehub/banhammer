<div class="<?php echo $slug; ?>_parent">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-push-2">

                <a class="btn btn-primary" href="<?=base_url()?>site/<?php echo $slug; ?>">
                    <strong>Back to <?php echo deslug($slug); ?> Homepage</strong>
                </a>

                <hr>

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
                        <div class="post_content">
                            <?php echo html_clean($post['content']); ?>
                        </div>
                        <div class="post_time">
                            <?php echo get_time_ago(strtotime($post['created'])); ?>
                        </div>
                    </blockquote>
                </div>

                <hr>

            </div>
        </div>
    </div>

</div>