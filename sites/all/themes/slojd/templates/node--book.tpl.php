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
            <div >
                <h2 class="slojdtitle"><?php print $title; ?></h2>
                <?php print render($parentBook['body']); ?>
                <?php if (!empty($parentBook['links'])): ?>
                    <nav class="links node-links clearfix"><?php print render($parentBook['links']); ?></nav>
                <?php endif; ?>
            </div>
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
    print render($parentBook['book_navigation']);
  ?>
         </div>   
  <?php print render($content['comments']); ?>

</div>