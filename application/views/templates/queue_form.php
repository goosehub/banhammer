<div class="container text-center">
    <div class="row">
        <div class="col-md-6 col-md-push-3">

            <form id="queue_form" action="<?=base_url()?>site/<?php echo $slug; ?>/queue" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>
                <input id="real_report" type="hidden" name="real_report"/>

                <div id="offence_parent">
                    <h2>Offence</h2>
                    <input type="hidden" id="offence_input" name="offence"/>
                    <?php foreach ($offences as $offence) { ?>
                        <?php $style = $offence['slug'] === 'none' ? 'primary' : 'danger'; ?>
                        <div class="offence_button btn btn-<?php echo $style; ?>" offence="<?php echo $offence['id']; ?>">
                            <?php echo deslug($offence['slug']); ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="action_parent" style="display: none;">
                    <h2>Action</h2>
                    <input type="hidden" id="action_input" name="action" value="1"/>
                    <?php foreach ($actions as $action) { ?>
                        <?php $style = $action['slug'] === 'none' ? 'primary' : 'danger'; ?>
                        <div class="action_button btn btn-<?php echo $style; ?>" action="<?php echo $action['id']; ?>">
                            <?php echo deslug($action['slug']); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="offence_button btn btn-default btn-sm" offence="1" real_report="true" title="Use this to report content that should actually be removed from the site">
                    <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
                </div>

            </form>

        </div>
    </div>
</div>