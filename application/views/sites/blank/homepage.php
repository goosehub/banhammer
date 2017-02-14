<div class="<?php echo $slug; ?>_parent">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-push-2">

                <a class="btn btn-action" href="<?=base_url()?>site/<?php echo $slug; ?>/queue">
                    <strong>Go to your Moderator Queue</strong>
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
                            <label>File</label>
                            <input type="file" id="image_input" class="form-control" name="image"/>
                            <br>
                            <input type="submit" class="form-control btn btn-success"/>
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
                        <div class="post_image_parent">
                            <?php if ($post['image'] && file_exists('uploads/' . $post['image'])) { ?>
                            <?php if (pathinfo($post['image'], PATHINFO_EXTENSION ) === 'webm') { ?>
                            <video class="message_video message_content" muted controls="" loop="" controls src="<?php echo base_url() . 'uploads/' . $post['image']; ?>"></video>
                            <?php } else { ?>
                            <img class="post_image img-responsive" src="<?php echo base_url() . 'uploads/' . $post['image']; ?>" alt=""/>
                            <?php } ?>
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
                <?php } ?>

                <div class="pagination">
                    <a class="btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>">
                        First
                    </a>
                    <?php if ($offset >= 1) { ?>
                    <a class="btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo max($offset - $limit, 0); ?>">
                        Previous
                    </a>
                    <?php } ?>
                    <?php if ($offset + $limit < $post_count) { ?>
                    <a class="btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo $offset + $limit; ?>">
                        Next
                    </a>
                    <?php } ?>
                    <a class="btn btn-default" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo $post_count - $limit; ?>">
                        Last
                    </a>
                </div>

                <br>

            </div>
        </div>
    </div>

</div>