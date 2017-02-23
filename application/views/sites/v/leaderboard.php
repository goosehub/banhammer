<span class="boardList">
    [<a href="<?=base_url()?>site/v/" title="Video Games"><strong>video games</strong></a>]
    [<a href="<?=base_url()?>site/<?php echo $slug; ?>/queue" title="Video Games"><strong>Moderator Queue</strong></a>]
    [<a href="<?=base_url()?>site/<?php echo $slug; ?>/leaderboard" title="Video Games"><strong>Moderator Leaderboard</strong></a>]
</span>

<div class="boardBanner">
    <div id="bannerCnt" class="title desktop" data-src="6.jpg">
        <img alt="4chan" src="<?=base_url()?>resources/4shame/top_image/header_2.png">
    </div>
    <div class="boardTitle">/v/ - Video Games</div>
</div>

<hr>

<div class="<?php echo $slug; ?>_parent container">
    <div class="row">
        <div class="col-md-8 col-md-push-2">

            <div class="leaderboard_parent table-responsive">
                <h3><?php echo $current_site['name']; ?> Leaderboard <small>Minimum of <?php echo $leaderboard_minimum; ?></small></h3>
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