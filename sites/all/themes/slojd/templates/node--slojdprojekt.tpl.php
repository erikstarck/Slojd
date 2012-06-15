<!-- NODE SLÖJDPROJEKT -->
<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($display_submitted): ?>
  <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?></footer>
  <?php endif; ?>  
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
//      debug($content);
      print render($content);
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <?php
//Hide all buttons
                hide($content['links']);
                global $user;
                global $base_url;
                
                if ( $user->uid ) {
                    /*
                     * Example: 
                     * <span class="flag-wrapper flag-bookmarks flag-bookmarks-189">
                      <a href="/drupal7/flag/unflag/bookmarks/189?destination=node/189&amp;token=0uL6RiY1J9E84gdHin-Y8bwQp5ZpkkAQ5h3qE8XmTPQ" title="Ta bort favorit" class="flag unflag-action flag-link-toggle" rel="nofollow">Ta bort favorit</a><span class="flag-throbber">&nbsp;</span>
                    </span>
                     */
                    $qp = htmlqp($content['links']['flag']['#links']['flag-bookmarks']['title']); // Generate a new QueryPath object.
                    $linktoflag = $qp->find("a")->attr("href");
                    ?>
                    <a href="<?php echo $linktoflag;?>" ><img src="<?php echo $base_url;?>/sites/all/themes/slojd/images/favorite_button.png"></a>
                    <?php
                }
                ?>
                <?php
                $linktoprint = $content['links']['print_pdf']['#links']['book_pdf']['href'];
                ?>
                <a href="<?php echo $base_url."/".$linktoprint;?>" ><img src="<?php echo $base_url;?>/sites/all/themes/slojd/images/print_button.png"></a>
                <!--
                <nav class="links node-links clearfix"><?php //print render($content['links']); ?></nav>
                -->      
    <?php endif; ?>
    <div class="">
      <?php print render($content['comments']); ?>
    </div>
  </div>
</article>
