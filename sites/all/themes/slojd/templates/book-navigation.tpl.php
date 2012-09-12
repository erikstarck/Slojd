<?php
/**
 * @file
 * Default theme implementation to navigate books. Presented under nodes that
 * are a part of book outlines.
 *
 * Available variables:
 * - $tree: The immediate children of the current node rendered as an
 *   unordered list.
 * - $current_depth: Depth of the current node within the book outline.
 *   Provided for context.
 * - $prev_url: URL to the previous node.
 * - $prev_title: Title of the previous node.
 * - $parent_url: URL to the parent node.
 * - $parent_title: Title of the parent node. Not printed by default. Provided
 *   as an option.
 * - $next_url: URL to the next node.
 * - $next_title: Title of the next node.
 * - $has_links: Flags TRUE whenever the previous, parent or next data has a
 *   value.
 * - $book_id: The book ID of the current outline being viewed. Same as the
 *   node ID containing the entire outline. Provided for context.
 * - $book_url: The book/node URL of the current outline being viewed.
 *   Provided as an option. Not used by default.
 * - $book_title: The book/node title of the current outline being viewed.
 *   Provided as an option. Not used by default.
 *
 * @see template_preprocess_book_navigation()
 */
global $base_url;
?>
<!-- book navigation -->
<?php if ($tree || $has_links): ?>
    <div id="book-navigation-<?php print $book_id; ?>" class="book-navigation">
    <?php
    /* Example:
      //Need to do this to get the Simple Dialog (modal) to work. This is what the links look like unmodified:
      <ul class="menu"><li class="first leaf dhtml-menu" id="dhtml_menu-1555"><a href="/drupal7/content/garndocka-steg-1">Garndocka steg 1</a></li>
      <li class="leaf dhtml-menu" id="dhtml_menu-1556"><a href="/drupal7/content/garndocka-steg-2">Garndocka steg 2</a></li>
      <li class="leaf dhtml-menu" id="dhtml_menu-1557"><a href="/drupal7/content/garndocka-steg-3">Garndocka steg 3</a></li>
      <li class="leaf dhtml-menu" id="dhtml_menu-1558"><a href="/drupal7/content/garndocka-steg-4">Garndocka steg 4</a></li>
      <li class="leaf dhtml-menu" id="dhtml_menu-1559"><a href="/drupal7/content/garndocka-steg-5">Garndocka steg 5</a></li>
      <li class="leaf dhtml-menu" id="dhtml_menu-1560"><a href="/drupal7/content/garndocka-steg-6">Garndocka steg 6</a></li>
      <li class="last leaf dhtml-menu" id="dhtml_menu-1561"><a href="/drupal7/content/garndocka-steg-7">Garndocka steg 7</a></li>
      </ul>
     * 
     * Each link must be like:
      <a class="simple-dialog" name="region-content" title=" " href="http://derek.slojdklubben.se/drupal7/content/garndocka-steg-1">Garndocka</a>
     */
    $qp = htmlqp($tree); // Generate a new QueryPath object.
    $qp->find("li.leaf a")->addClass("simple-dialog");
    $qp->top()->find("li.leaf a")->attr("name", "region-content");
    $qp->top()->find("li.leaf a")->attr("title", " ");
    $qp->top()->find("li.leaf a")->attr("rel", "width:960px;  ");


    //Save the first and last links to session
    $bookfirstlink = $qp->top()->find("li.first a")->attr("href");
    $booklastlink = $qp->top()->find("li.last a")->attr("href");
    if (isset($bookfirstlink)) $_SESSION['bookfirstlink'] = $bookfirstlink;
    else $bookfirstlink = $_SESSION['bookfirstlink'];
    if (isset($booklastlink)) $_SESSION['booklastlink'] = $booklastlink;
    else $booklastlink = $_SESSION['booklastlink'];

    //There should always be two buttons so need to set the urls if they don't exist
    if (!$prev_url) {
        $prev_url = $booklastlink;
    }
    if (!$next_url) {
        $next_url = $bookfirstlink;
    }

    //Replace the link text with numbers
    $children = $qp->top()->find("li.leaf");
    $index = 1;
    foreach ($children as $child) {
        $child->find("a")->text("" . $index++);
    }

    //Save the menu in the session so we can use it when browsing the pages.
    $tree = $qp->top()->find("body")->children()->html();
    if (isset($tree)) $_SESSION['booktree'] = $tree;
    else $tree = $_SESSION['booktree'];
    
    //We don't need the link to the parent of the book, it is printed at the top at all times.
    $parent_url = NULL;
    ?>
        <?php if ($has_links): ?>
            <div class="page-links clearfix navigationwrapper">

            <?php if ($prev_url): ?>
            <div class="navigationleft">
                <a href="<?php print $prev_url; ?>" name="region-content" class="page-previous simple-dialog" title=" "><img src="<?php echo $base_url; ?>/sites/all/themes/slojd/images/prev_button.png"></img> <?php //print t('‹ ') . $prev_title;  ?></a>
            </div>
            <?php endif; ?>
            <div class="navigationcentre">
            <?php print $tree; ?>
            <?php if ($parent_url): ?>
                    <a href="<?php print $parent_url; ?>" name="region-content" class="page-up simple-dialog" title=" "><?php print t('up'); ?></a>
                <?php endif; ?>
            </div>
            <?php if ($next_url): ?>
            <div class="navigationright">
                <a href="<?php print $next_url; ?>" name="region-content" class="page-next simple-dialog" title=" "><img src="<?php echo $base_url; ?>/sites/all/themes/slojd/images/next_button.png"></img> <?php // print $next_title . t(' ›'); ?></a>
            </div>
            <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
    <?php endif; ?>
<!-- /book navigation -->

