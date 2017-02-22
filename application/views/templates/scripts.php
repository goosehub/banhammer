<!-- jQuery -->
<script src="<?=base_url()?>resources/jquery/jquery-3.1.1.min.js"></script>

<!-- Bootstrap -->
<script src="<?=base_url()?>resources/bootstrap/js/bootstrap.min.js"></script>

<!-- Embedica -->
<script src="<?=base_url()?>resources/embedica/embedica.min.js"></script>

<script>
// Pass server variables to global javascript scope
var user = <?php echo json_encode($user); ?>;
var suggest_account_at = <?php echo json_encode($suggest_account_at); ?>;
</script>

<!-- Primary Script -->
<script src="<?=base_url()?>resources/script.js?<?php echo time(); ?>"></script>