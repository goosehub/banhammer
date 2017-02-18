<div class="container text-center">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <?php if ($this->input->method() === 'post') { ?>
            <?php $result_class = $review_result ? 'success' : 'danger'; ?>
            <?php $result_message = $review_result ? 'Pass' : 'Fail'; ?>
            <!-- <div class="alert alert-<?php echo $result_class; ?>">Last Result: <?php echo $result_message; ?></div> -->
            <?php } ?>
            <?php echo flash('review_result'); ?>

            <?php if (!$user['logged_in'] && $user['current_account']['total'] === $login_reminder_point) { ?>
            <strong>You're progress isn't being saved.</strong>
            <a href="<?=base_url()?>">Create an account?</a>
            <?php } ?>
        </div>
    </div>
</div>