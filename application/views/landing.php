<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <h1 class="main_site_name text-center"><?php echo $page_title; ?></h1>
            <?php if (!$user['logged_in'] && $ab_test === 'show_subheader') { ?>
            <h2 class="main_site_description text-center">Live the exciting life of an online moderator</h2>
            <?php } ?>
            <hr>
        </div>
    </div>
    <div class="row">

        <div class="moderator_queue_list_parent col-md-8">
            <h2 class="moderator_queue_title">
                Moderator Queues
                <?php if (!$user['logged_in']) { ?>
                <small>Pick one to begin</small>
                <?php } ?></h2>
            <?php foreach ($active_sites as $site) { ?>
            <a class="global_link" href="<?=base_url()?>site/<?php echo $site['slug']; ?>/queue">
                <div class="global_site_parent">
                    <img class="global_site_icon" src="<?=base_url()?>resources/sites/<?php echo $site['slug']; ?>/icon.png" alt="<?php echo $site['name']; ?>"/>
                    <span class="global_site_name"><?php echo $site['name']; ?></span>
                </div>
            </a>
            <br>
            <?php } ?>

        </div>

        <div class="col-md-4">
            <div class="login_register_parent">
                <?php if ($user['logged_in']) { ?>
                <h2>Welcome back <?php echo $user['username']; ?></h2>
                <a class="text-danger" href="<?=base_url()?>logout">Logout</a>
                <?php } else { ?>
                <h3>Create an account to save your progress</h3>
                <strong class="text-primary">Not required to play</strong>
                <br>
                <br>
                <?php echo $validation_errors; ?>
                <div id="new_user_parent">
                    <form action="<?=base_url()?>new_user" method="post">
                        <input type="hidden" name="ab_test" value="<?php echo $ab_test; ?>"/>
                        <input type="hidden" name="bee_movie" value=""/>
                        <div class="form-group">
                            <input type="username" class="form-control" id="new_user_input_username" name="username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="new_user_input_password" name="password" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="new_user_input_password_confirm" name="confirm" placeholder="Confirm"/>
                        </div>
                        <button type="submit" class="custom_btn btn btn-action form-control">New User</button>
                    </form>
                </div>
                <br>
                <div id="show_login" class="custom_btn btn btn-primary form-control">Or Login</div>

                <div id="login_parent" style="display: none;">
                    <form action="<?=base_url()?>login" method="post">
                        <div class="form-group">
                            <input type="username" class="form-control" id="login_input_username" name="username" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="login_input_password" name="password" placeholder="Password"/>
                        </div>
                        <button type="submit" class="custom_btn btn btn-action form-control">Login</button>
                    </form>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="leaderboard_parent table-responsive">
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

    <hr>

    <?php $show_news = false; ?>
    <?php if ($show_news) { ?>
    <div class="row">
        <div class="update_news_parent col-md-6 col-md-push-3">
            <h3>Updates</h3>
            <div class="update_news_item">
                <blockquote>
                    <h4>Beta</h4>
                    <small>February 21th, 2017</small>
                    <p>Ban Hammer has entered Open Beta. Please report bugs to goosepostbox@gmail.com.</p>
                </blockquote>
            </div>
            <div class="update_news_item">
                <blockquote>
                    <h4>Alpha</h4>
                    <small>February 16th, 2017</small>
                    <p>Ban Hammer has entered Alpha</p>
                </blockquote>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-6 col-md-push-3 text-center">
            <footer class="landing_footer">
                <hr>
                <strong class="text-center">Please report bugs to goosepostbox@gmail.com</strong>
                <br>
                <br>
                <a href="https://www.reddit.com/r/ban_hammer" target="_blank"/>/r/ban_hammer</a>
                <strong>~</strong>
                <a href="<?=base_url()?>about">About <?php echo site_name(); ?></a>
            </footer>
        </div>
    </div>
</div>