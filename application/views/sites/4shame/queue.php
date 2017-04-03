<span class="boardList">
    [<a href="<?=base_url()?>site/4shame/" title="/4shame/"><strong>/4shame/</strong></a>]
    [<a href="<?=base_url()?>site/<?php echo $slug; ?>/queue" title="/4shame/"><strong>Moderator Queue</strong></a>]
    [<a href="<?=base_url()?>site/<?php echo $slug; ?>/leaderboard" title="/4shame/"><strong>Moderator Leaderboard</strong></a>]
</span>

<div class="boardBanner">
    <div id="bannerCnt" class="title desktop" data-src="6.jpg">
        <img alt="4chan" src="<?=base_url()?>resources/4shame/top_image/header_4.png">
    </div>
    <div class="boardTitle">/4shame/</div>
</div>

<hr>

<div id="queue_empty_parent" <?php if ($post) { echo 'style="display: none;"'; } ?>>
    <div class="post_parent alert alert-info">
        <p>Queue Empty.</p>
    </div>
    <hr>
    <h4>Great job! <a class="" href="<?=base_url()?>site/<?php echo $slug; ?>"><strong>Consider creating some posts</strong></a>.</h4>
</div>

<div id="queue_post_parent" class="post_parent" <?php if (!$post) { echo 'style="display: none;"'; } ?>>
<?php $post_id = html_clean($post['id']); ?>
<div class="postContainer replyContainer" id="pc<?php echo $post_id; ?>">
   <div class="sideArrows" id="sa<?php echo $post_id; ?>">&gt;&gt;</div>
   <div id="p<?php echo $post_id; ?>" class="post reply">
      <div class="postInfoM mobile" id="pim<?php echo $post_id; ?>"><span class="nameBlock"><span id="queue_post_username" class="name"><?php echo html_clean($post['username']); ?></span><br></span><span id="queue_post_time_ago" class="dateTime postNum"><?php echo $post['time_ago']; ?><a href="thread/1234#p<?php echo $post_id; ?>" title="Link to this post">No.</a><a id="queue_post_id_label" href="thread/1234#q<?php echo $post_id; ?>" title="Reply to this post"><?php echo $post_id; ?></a></span></div>
      <div class="postInfo desktop" id="pi<?php echo $post_id; ?>"><input type="checkbox" name="<?php echo $post_id; ?>" value="delete"> <span class="nameBlock"><span class="name">Anonymous</span> </span> <span class="dateTime">02/22/17(Wed)19:01:54</span> <span class="postNum desktop"><a href="thread/1234#p<?php echo $post_id; ?>" title="Link to this post">No.</a><a href="thread/1234#q<?php echo $post_id; ?>" title="Reply to this post"><?php echo $post_id; ?></a></span></div>
      <blockquote class="postMessage greentext_this embedica_this" id="queue_post_content" class="post_content embedica_this"><?php echo html_clean($post['content']); ?></blockquote>
   </div>
</div>
</div>

<hr>