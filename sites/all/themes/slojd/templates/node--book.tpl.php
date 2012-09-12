
<script type="text/javascript">
//    jQuery(window).load(function(){
//        jQuery('#region-content').dialog({ modal: true, width: 900, minHeight: 600, top: 60 }).position({of: "#maincontent", my: "center top", at: "center top", offset: "0 60"});
//    });
</script>


<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php
//Load the book parent
  $nid = $node->book['bid'];
  $delta = 0;
  $language = 'und';

/*  $entity = entity_load('node', array($nid));
  $teaser = $entity[$nid]->body[$language][$delta]['summary'];
  $html_teaser = $entity[$nid]->body[$language][$delta]['safe_summary'];
*/
  $parentBook = node_view(node_load($nid));
?>  
        <div class="">
  <div class="slojdinstruktionimage">
                <?php print render($parentBook['field_instructionimage']); ?>
            </div>
            <div class="slojdinstruktionbody">
                <h2 class="slojdtitle"><?php print $title; ?></h2>
                <?php print render($parentBook['body']); ?>
                <?php if (!empty($parentBook['links'])): ?>
               
                
                <?php
                //Hide all buttons
                hide($parentBook['links']);
                global $user;
                global $base_url;

                if ( $user->uid ) {
                    /*
                     * Example: 
                     * <span class="flag-wrapper flag-bookmarks flag-bookmarks-189">
                      <a href="/drupal7/flag/unflag/bookmarks/189?destination=node/189&amp;token=0uL6RiY1J9E84gdHin-Y8bwQp5ZpkkAQ5h3qE8XmTPQ" title="Ta bort favorit" class="flag unflag-action flag-link-toggle" rel="nofollow">Ta bort favorit</a><span class="flag-throbber">&nbsp;</span>
                    </span>
                     */
                    $qp = htmlqp($parentBook['links']['flag']['#links']['flag-bookmarks']['title']); // Generate a new QueryPath object.
                    $linktoflag = $qp->find("a")->attr("href");
                    ?>
                    <a href="<?php echo $linktoflag;?>" ><img src="<?php echo $base_url;?>/sites/all/themes/slojd/images/favorite_button.png"></a>
                    <?php
                }
                ?>
                <?php
                $linktoprint = $parentBook['links']['print_pdf']['#links']['book_pdf']['href'];
                ?>
                <a href="<?php echo $base_url."/".$linktoprint;?>" ><img src="<?php echo $base_url;?>/sites/all/themes/slojd/images/print_button.png"></a>
                <!--
                <nav class="links node-links clearfix"><?php //print render($content['links']); ?></nav>
                -->
                <?php endif; ?>
            </div>
            <div class="slojdinstruktionfooter">&nbsp;</div>            
            
            
            
        </div>
    <!--
        <div style="width:100%;" class="">
            <?php
            /*
              body (Array, 1 element)
              field_material (Array, 1 element)
              field_verktyg (Array, 1 element)
              field_teknik (Array, 1 element)
              field_instructionimage (Array, 1 element)
              field_inspiration (Array, 1 element)
              book (Array, 29 elements)
             */

            // We hide the comments and links now so that we can render them later.
            hide($parentBook['comments']);
            ?>
        </div>-->
    
    
    
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
      <div>
          <div style="width: 50%; float:left;">
                <?php
                  // We hide the comments and links now so that we can render them later.
                  hide($content['comments']);
                  hide($content['links']);
                  hide($content['book_navigation']);
                  print render($content['body']);
                ?>
          </div>
          <div style="width: 40%;float:right;">
              <?php print render($content['field_instructionimage']); ?>
          </div>
      </div>
    </div>

    <div style="clear:both;">
  <?php 
    hide($content['links']); 
    print render($content['book_navigation']);
  ?>
         </div>   
        <div style="width:100%;clear:both;">
              <?php
              
                 function modifytaxomonylinks(&$content, $fieldtomodify, $node) {
                    $qp = htmlqp($content[$fieldtomodify][0]['#markup'], 'a'); // Generate a new QueryPath object.
                    foreach ($qp as $item) {
                        $theurl = $item->attr("href");
                        // $item is a QueryPath object
                        $item->attr("href", $theurl."?camefrom=".$node->nid);
                    }
                    $content[$fieldtomodify][0]['#markup'] = $qp->parent()->html();
                }
                modifytaxomonylinks($parentBook,'field_material', $node);
                modifytaxomonylinks($parentBook,'field_teknik', $node);
                modifytaxomonylinks($parentBook,'field_verktyg', $node);
                          
              print render($parentBook['field_material']);
              print render($parentBook['field_teknik']);
              print render($parentBook['field_verktyg']);
              ?>
        </div>


  <?php print render($content['comments']); ?>

</div>