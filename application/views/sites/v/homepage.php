<span class="boardList">
    [<a href="<?=base_url()?>site/v/" title="Video Games"><strong>video games</strong></a>]
    [<a href="<?=base_url()?>site/<?php echo $slug; ?>/queue" title="Video Games"><strong>Moderator Queue</strong></a>]
    [<a href="<?=base_url()?>site/<?php echo $slug; ?>/leaderboard" title="Video Games"><strong>Moderator Leaderboard</strong></a>]
</span>

<div class="boardBanner">
    <div id="bannerCnt" class="title desktop" data-src="6.jpg">
        <img alt="4chan" src="//s.4cdn.org/image/title/6.jpg">
    </div>
    <div class="boardTitle">/v/ - Video Games</div>
</div>

<hr>

<div class="row">
    <div class="col-md-6 col-md-push-3">

        <h3>New Post</h3>
        <strong>Following are not allowed</strong>
        <ul>
        <?php foreach ($offences as $offence) { ?>
        <?php if ($offence['slug'] === 'none') { continue; } ?>
        <li><?php echo deslug($offence['slug']); ?></li>
        <?php } ?>
        </ul>

        <?php if ($validation_errors) { ?>
        <div class="new_post_validation_errors alert alert-danger"><?php echo $validation_errors; ?></div>
        <?php } ?>

        <form id="new_post_form" action="<?=base_url()?>site/<?php echo $slug; ?>/new_post" method="post" enctype="multipart/form-data">
            <table class="postForm hideMobile" id="postForm" style="display: table;">
               <input type="hidden" class="form-control" name="username" value="Anonymous"/>
               <tbody>
                  <tr data-type="Name">
                     <td>Name</td>
                     <td><input name="name" type="text" tabindex="1" value="Anonymous" disabled></td>
                  </tr>
                  <tr data-type="Comment">
                     <td>Comment</td>
                     <td><textarea name="content" cols="48" rows="4" wrap="soft" tabindex="4"></textarea></td>
                  </tr>
                  <tr data-type="Subject">
                     <td>Post</td>
                     <td><input type="submit" value="Post" tabindex="6"></td>
                  </tr>
               </tbody>
            </table>
        </form>

    </div>
</div>

<br>

<?php foreach ($posts as $post) { ?>
<?php $post_id = html_clean($post['id']); ?>
<div class="postContainer replyContainer" id="pc<?php echo $post_id; ?>">
   <div class="sideArrows" id="sa<?php echo $post_id; ?>">&gt;&gt;</div>
   <div id="p<?php echo $post_id; ?>" class="post reply">
      <div class="postInfoM mobile" id="pim<?php echo $post_id; ?>"><span class="nameBlock"><span class="name"><?php echo html_clean($post['username']); ?></span><br></span><span class="dateTime postNum" data-utc="5678"><?php echo date('m-d-y H:i:s', strtotime($post['created'])); ?> 02/22/17(Wed)19:01:54 <a href="thread/1234#p<?php echo $post_id; ?>" title="Link to this post">No.</a><a href="thread/1234#q<?php echo $post_id; ?>" title="Reply to this post"><?php echo $post_id; ?></a></span></div>
      <div class="postInfo desktop" id="pi<?php echo $post_id; ?>"><input type="checkbox" name="<?php echo $post_id; ?>" value="delete"> <span class="nameBlock"><span class="name">Anonymous</span> </span> <span class="dateTime" data-utc="5678">02/22/17(Wed)19:01:54</span> <span class="postNum desktop"><a href="thread/1234#p<?php echo $post_id; ?>" title="Link to this post">No.</a><a href="thread/1234#q<?php echo $post_id; ?>" title="Reply to this post"><?php echo $post_id; ?></a></span></div>
      <blockquote class="postMessage embedica_this" id="m<?php echo $post_id; ?>"><?php echo html_clean($post['content']); ?></blockquote>
   </div>
</div>
<?php } ?>

<div class="pagelist desktop">
   <div class="pagination">
       <a class="pages cataloglink" href="<?=base_url()?>site/<?php echo $slug; ?>">
           [First]
       </a>
       <?php if ($offset >= 1) { ?>
       <a class="pages cataloglink" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo max($offset - $limit, 0); ?>">
           [Previous]
       </a>
       <?php } ?>
       <?php if ($offset + $limit < $post_count) { ?>
       <a class="pages cataloglink" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo $offset + $limit; ?>">
           [Next]
       </a>
       <?php } ?>
       <a class="pages cataloglink" href="<?=base_url()?>site/<?php echo $slug; ?>/<?php echo $post_count - $limit; ?>">
           [Last]
       </a>
   </div>
</div>

<br>