<!-- Slöjdkorgen template, node 173 -->
<article<?php print $attributes; ?>>
<style type="text/css">
h1.title {
  display:none;
}
</style>
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>
<!-- /Slöjdkorgen template, node 173 -->
