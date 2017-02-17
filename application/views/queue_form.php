<div class="container text-center">
    <div class="row">
        <div class="col-md-6 col-md-push-3">

            <form id="real_report_form" action="<?=base_url()?>site/<?php echo $slug; ?>/real_report" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>

            </form>

            <form id="queue_form" action="<?=base_url()?>site/<?php echo $slug; ?>/new_review" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>"/>

                <div id="offence_parent">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <h2>Offence</h2>
                        </div>
                        <div class="col-md-3">
                            <span class="real_report_button glyphicon glyphicon-flag btn pull-right" real_report="true" aria-hidden="true" title="Report illegal content. Not a game button."></span>
                            <span class="how_to_play_button glyphicon glyphicon-question-sign btn pull-right" type="button" data-toggle="modal" data-target="#how_to_play_modal" title="How To Play"></span>
                        </div>
                    </div>
                    <input type="hidden" id="offence_input" name="offence"/>
                    <?php foreach ($offences as $offence) { ?>
                        <?php $style = $offence['slug'] === 'none' ? 'btn-primary offence_none' : 'btn-danger'; ?>
                        <div class="offence_button btn <?php echo $style; ?>" offence="<?php echo $offence['id']; ?>">
                            <?php echo deslug($offence['slug']); ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="action_parent" style="display: none;">
                    <h2>Action</h2>
                    <input type="hidden" id="action_input" name="action" value="1"/>
                    <?php foreach ($actions as $action) { ?>
                        <?php $style = '';
                        if ($action['slug'] === 'none') {
                            $style = 'btn-primary';
                        }
                        else if ($action['slug'] === 'warning' || $action['slug'] === 'edit') {
                            $style = 'btn-warning';
                        }
                        else {
                            $style = 'btn-danger';
                        }
                        ?>
                        <div class="action_button btn <?php echo $style; ?>" action="<?php echo $action['id']; ?>">
                            <?php echo deslug($action['slug']); ?>
                        </div>
                    <?php } ?>
                </div>

            </form>

            <div class="modal fade" id="how_to_play_modal" tabindex="-1" role="dialog" aria-labelledby="how_to_play_modal_label">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-primary" id="how_to_play_modal_label">How To Play?</h4>
                        </div>
                        <div class="modal-body">
                            You are presented with a post. You must decide which rule if any that is being broken. If you deviate from the consensus, or if the action you take is too strong or soft, you fail. Keep your accuracy high and top the leaderboard.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>