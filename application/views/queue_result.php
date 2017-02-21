<div class="container text-center">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div id="review_result_alert" class="alert alert-info">Let's begin</div>

            <?php if (!$user['logged_in'] && $user['current_account']['total'] === $login_reminder_point) { ?>
            <strong>You're progress isn't being saved.</strong>
            <a href="<?=base_url()?>">Create an account?</a>
            <?php } ?>
        </div>
    </div>
</div>