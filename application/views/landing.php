<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <h1 class="main_site_name text-center"><?php echo $page_title; ?></h1>
            <!-- <h2 class="main_site_description">Live the exciting life of a website moderator</h2> -->
            <hr>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8">
            <h2 class="moderator_queue_title">
                Moderator Queues
                <?php if (!$user['logged_in']) { ?>
                <small>Pick one to begin</small>
                <?php } ?></h2>
            <?php foreach ($active_sites as $site) { ?>
            <a class="toolbar_link" href="<?=base_url()?>site/<?php echo $site['slug']; ?>/queue">
                <div class="toolbar_site_parent">
                    <img class="toolbar_site_icon" src="<?=base_url()?>resources/sites/<?php echo $site['slug']; ?>/icon.png" alt="<?php echo $site['name']; ?>"/>
                    <span class="toolbar_site_name"><?php echo $site['name']; ?></span>
                </div>
            </a>
            <?php } ?>

        </div>

        <div class="col-md-4">
            <div class="login_register_parent">
                <?php if ($user['logged_in']) { ?>
                <h2>Welcome back <?php echo $user['username']; ?></h2>
                <a class="btn btn-danger" href="<?=base_url()?>logout">Logout</a>
                <?php } else { ?>
                <h3>Create an account to save your progress</h3>
                <strong class="text-primary">Not required to play</strong>
                <br>
                <br>
                <div id="new_user_parent">
                    <form action="<?=base_url()?>new_user" method="post">
                        <div class="form-group">
                            <input type="username" class="form-control" id="new_user_input_username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="new_user_input_password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="new_user_input_password_confirm" name="confirm" placeholder="Confirm">
                        </div>
                        <button type="submit" class="btn btn-action form-control">New User</button>
                    </form>
                </div>
                <br>
                <div id="show_login" class="btn btn-primary form-control">Or Login</div>

                <div id="login_parent" style="display: none;">
                    <form action="<?=base_url()?>login" method="post">
                        <div class="form-group">
                            <input type="username" class="form-control" id="login_input_username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="login_input_password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-action form-control">Login</button>
                    </form>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <hr>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#how_to_play_modal">
        How To Play
        <span class="glyphicon glyphicon-question-sign"></span>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="how_to_play_modal" tabindex="-1" role="dialog" aria-labelledby="how_to_play_modal_label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="how_to_play_modal_label">How To Play?</h4>
                </div>
                <div class="modal-body">
                    You are presented with a post. You must decide which rule if any that post is breaking. If you deviate from the consensus, or if the action you take is too strong or soft, you fail.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="overall_leaderboard">
                <h3>Overall Leaderboard <small>Minimum of 100</small></h3>
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
                        <tr>
                            <td>1</td>
                            <td>goose</td>
                            <td class="text-primary"><strong>75%</strong></td>
                            <td class="text-success">75</td>
                            <td class="text-danger">25</td>
                            <td class="text-default">100</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>jack</td>
                            <td class="text-primary"><strong>70%</strong></td>
                            <td class="text-success">70</td>
                            <td class="text-danger">30</td>
                            <td class="text-default">100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="update_news_parent col-md-6 col-md-push-3">
            <h3>Updates</h3>
            <div class="update_news_item">
                <blockquote>
                    <h4>Alpha</h4>
                    <small>February 16th, 2017</small>
                    <p>Moderator has entered Alpha</p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-push-3 text-center">
            <footer class="landing_footer">
                <hr>
                <strong class="text-center">Please report bugs to goosepostbox@gmail.com</strong>
                <br>
                <br>
                <!-- <a href="https://www.reddit.com/r/banhammer"/>/r/banhammer</a> -->
                <!-- <strong>~</strong> -->
                <a href="<?=base_url()?>about">About <?php echo site_name(); ?></a>
            </footer>
        </div>
    </div>
</div>