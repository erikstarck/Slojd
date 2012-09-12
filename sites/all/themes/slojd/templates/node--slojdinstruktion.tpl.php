<!-- node--slojdinstruktion -->
<div class=""> 
<?php
/*Example:
 * 
body (Array, 1 element)
field_material (Array, 1 element)
field_verktyg (Array, 1 element)
field_teknik (Array, 1 element)
field_instructionimage (Array, 1 element)
field_inspiration (Array, 1 element)
book (Array, 29 elements)
*/
global $base_url;
?>
<article<?php print $attributes; ?>>
    <div<?php print $content_attributes; ?>>

        <div class="slojdinstruktionwrapper">
            <div class="slojdinstruktionimage">
                <?php print render($content['field_instructionimage']); ?>
            </div>
            <div class="slojdinstruktionbody">
                <h2 class="slojdtitle"><?php print $title; ?></h2>
                <?php print render($content['body']); ?>
                <?php if (!empty($content['links'])): ?>
               
                
                <?php
                //Hide all buttons
                hide($content['links']);
                global $user;

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
            </div>
            <div class="slojdinstruktionfooter">&nbsp;</div>
        </div>
        <div style="clear:both;">
            <?php
            hide($content['comments']);
            print render($content['book_navigation']);
            ?>
        </div>
        <div class="slojdinstruktiontaxonomylinks">
            <?php
            //Only taxomomy terms left
            //Not a very good solution to this but need to add a parameter to the taxonomy links in the modal window
            //to get the back button working.
            //Example:
            //'<a href="/drupal7/taxonomisida/Grenklyka" class="simple-dialog" rel="width:900;position:[center,60];height:600" name="region-content" title=" ">Grenklyka</a>, <a href="/drupal7/taxonomisida/Fj%C3%A4drar" class="simple-dialog" rel="width:900;position:[center,60];height:600" name="region-content" title=" ">Fjädrar</a>, <a href="/drupal7/taxonomisida/Vattenf%C3%A4rg" class="simple-dialog" rel="width:900;position:[center,60];height:600" name="region-content" title=" ">Vattenfärg</a>, <a href="/drupal7/taxonomisida/Garn" class="simple-dialog" rel="width:900;position:[center,60];height:600" name="region-content" title=" ">Garn</a>, <a href="/drupal7/taxonomisida/J%C3%A4rntr%C3%A5d" class="simple-dialog" rel="width:900;position:[center,60];height:600" name="region-content" title=" ">Järntråd</a>, <a href="/drupal7/taxonomisida/Tr%C3%A4" class="simple-dialog" rel="width:900;position:[center,60];height:600" name="region-content" title=" ">Trä</a>
            function modifytaxomonylinks(&$content, $fieldtomodify, $node) {
                $qp = htmlqp($content[$fieldtomodify][0]['#markup'], 'a'); // Generate a new QueryPath object.
                foreach ($qp as $item) {
                    $theurl = $item->attr("href");
                    // $item is a QueryPath object
                    $item->attr("href", $theurl."?camefrom=".$node->nid);
                }
                $content[$fieldtomodify][0]['#markup'] = $qp->parent()->html();
            }
            modifytaxomonylinks($content,'field_material', $node);
            modifytaxomonylinks($content,'field_teknik', $node);
            modifytaxomonylinks($content,'field_verktyg', $node);
            
            print render($content);
            ?>
        </div>
    </div>

    <div class="clearfix">
        <?php print render($content['comments']); ?>
    </div>
</article>
</div>
<!-- /node--slojdinstruktion  -->
