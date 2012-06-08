<?php
$commenttitle = t('Comments');
$addnewcomment = t('Add new comment');
if($content['comment_form']['#node']->type == "privat_meddelande") {
  $commenttitle = t("Private Messages Replies");
  $addnewcomment = t("Write a private message reply");
}
//  debug($content['comment_form']);
  //hide($content['comment_form']['author']); 
?>

<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
    <h2 class="title"><?php print $commenttitle ?></h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

  <?php if ($content['comment_form']): ?>
    <h2 class="title comment-form"><?php print $addnewcomment; ?></h2>
    <?php print render($content['comment_form']); ?>
  <?php endif; ?>
</div>
