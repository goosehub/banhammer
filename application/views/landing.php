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
    <div class="footer row">
        <div class="col-md-6 col-md-push-3 text-center">
            <hr>
            <a href="<?=base_url()?>about">About <?php echo site_name(); ?></a>
        </div>
    </div>
</div>