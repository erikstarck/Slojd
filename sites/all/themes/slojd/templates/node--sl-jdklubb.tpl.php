<!-- NODE SLÖJDKLUBB HEADER -->
<style>
    article#node-page-215 header {
        display:none;
    }
</style>
    <?php
    print drupal_render(node_view(node_load(215)));
    ?>
<!-- NODE SLÖJDKLUBB -->
    <div class="slojdklubbinramning">
<article<?php print $attributes; ?>>
    <?php if ($display_submitted): ?>
        <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?></footer>
    <?php endif; ?>  

        <div<?php print $content_attributes; ?>>
            <div class="grid-6">
                <?php
                $block = module_invoke("views", 'block_view', "-exp-slojdklubbar-page_1");
                //debug($block);
                print render($block['content'])
                ?>
            </div>
            <div class="grid-16">
                <?php print render($content['field_geo']); ?>
            </div>
            <div class="grid-12">
                <?php
                // We hide the comments and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                print render($title_prefix); ?>
    
            <header>
                <h2<?php print $title_attributes; ?>><?php print $title ?></h2>
            </header>
    
        <?php print render($title_suffix); 
                 
                print render($content);
                ?>
            </div>
        </div>

    <div class="clearfix">
        <?php if (!empty($content['links'])): ?>
            <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
        <?php endif; ?>
        <div class="grid-22 prepend-1">
            <?php print render($content['comments']); ?>
        </div>
    </div>
</article>
            </div>
