<!-- comment -->
<article<?php print $attributes; ?>>
  <!--
  <header>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h3<?php print $title_attributes; ?>><?php print $title ?></h3>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($new): ?>
      <em class="new"><?php print $new ?></em>
    <?php endif; ?>
    <?php if (isset($unpublished)): ?>
      <em class="unpublished"><?php print $unpublished; ?></em>
    <?php endif; ?>
  </header>
-->
<div class="grid-22">
  <div class="grid-3">
  <?php print $picture; ?>
  </div>
  <div class="grid-16">
      <div<?php print $content_attributes; ?>>
    <?php
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <div class="grid-20">
  <footer class="comment-submitted">
   <?php
      print t('Submitted by !username on !datetime',
      array('!username' => $author, '!datetime' => '<time datetime="' . $datetime . '">' . $created . '</time>'));
    ?>
  </footer>


  <?php if ($signature): ?>
    <div class="user-signature"><?php print $signature ?></div>
  <?php endif; ?>

  <?php if (!empty($content['links'])): ?>
    <nav class="links comment-links clearfix"><?php print render($content['links']); ?></nav>
  <?php endif; ?>
    
  </div>
</div>

</article>
<!-- /comment -->