<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="overall_leaderboard">
                <h3>Overall Leaderboard <small>Minimum of <?php echo $leaderboard_minimum; ?></small></h3>
                <table class="table table-stripped">
                    <thead>
                        <tr class="success">
                            <th>Rank</th>
                            <th>Username</th>
                            <th>Accuracy</th>
                            <th>Pass</th>
                            <th>Fail</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rank = 1; ?>
                        <?php foreach ($leaderboard as $account) { ?>
                        <tr>
                            <td><?php echo $rank; ?></td>
                            <td><?php echo $account['username']; ?></td>
                            <td class="text-primary"><strong><?php echo $account['accuracy']; ?>%</strong></td>
                            <td class="text-success"><?php echo $account['pass']; ?></td>
                            <td class="text-danger"><?php echo $account['fail']; ?></td>
                            <td class="text-default"><?php echo $account['total']; ?></td>
                        </tr>
                        <?php $rank++; ?>
                        <?php if ($rank > 100) { break; } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>