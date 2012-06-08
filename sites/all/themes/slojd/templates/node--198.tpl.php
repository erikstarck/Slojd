<!-- Mina saker template, node 198 -->
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
<!-- /SMina saker template, node 198  -->
