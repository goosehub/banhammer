<div class="container text-center">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <?php if ($this->input->method() === 'post') { ?>
            <?php $result_class = $review_result ? 'success' : 'danger'; ?>
            <?php $result_message = $review_result ? 'Pass' : 'Fail'; ?>
            <!-- <div class="alert alert-<?php echo $result_class; ?>">Last Result: <?php echo $result_message; ?></div> -->
            <?php } ?>
            <?php echo flash('reivew_result'); ?>
        </div>
    </div>
</div>