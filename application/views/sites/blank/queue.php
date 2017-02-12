<div class="<?php echo $slug; ?>_parent">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-push-2">

                <a class="btn btn-primary" href="<?=base_url()?>site/<?php echo $slug; ?>">
                    Homepage
                </a>

                <hr>

                <div class="post_parent">
                    <div class="post_username">
                        <strong>
                            <?php echo html_clean($post['username']); ?>
                        </strong>
                    </div>
                    <div class="post_content">
                        <?php echo html_clean($post['content']); ?>
                    </div>
                </div>

                <hr>

            </div>
        </div>
    </div>

</div>