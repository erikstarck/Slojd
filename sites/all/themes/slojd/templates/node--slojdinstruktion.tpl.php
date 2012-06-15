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
<!-- javascript h -->
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
