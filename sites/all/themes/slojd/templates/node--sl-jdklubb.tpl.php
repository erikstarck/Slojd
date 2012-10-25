<!-- NODE SLÖJDKLUBB HEADER -->
<style>
    article#node-article-211 header {
        display:none;
    }
</style>
    <?php
    //Node 211 must be "Slöjdklubbar" with blue text.
    print drupal_render(node_view(node_load(211)));
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
            <div class="grid-24">&nbsp;</div>
            <div class="grid-16">
                <?php
                // We hide the comments and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                print render($title_prefix); ?>
    
            <header>
                <h2<?php print $title_attributes; ?>><?php print $title ?></h2>
            </header>
    
           <?php print render($title_suffix); 
                hide($content['field_phone']);
                hide($content['field_town']);
                hide($content['links']['print_pdf']);
                hide($content['links']['contactlink']);
                hide($content['field_tid_f_r_tr_ff']);
                hide($content['field_kontaktperson']);

                print render($content);
                ?>
            </div>
            
            <div class="grid-7">
                <?php
                show($content['field_phone']);
                show($content['field_town']);
                show($content['links']['contactlink']);
                show($content['field_tid_f_r_tr_ff']);
                show($content['field_kontaktperson']);

                ?>
                <div class="node-links">
                    <?php
                    $content['links']['contactlink']['#links']['contactlink']['title'] = t("Sign up");

                    print render($content['links']['contactlink']);

                    $linktoprint = $content['links']['print_pdf']['#links']['print_pdf']['href'];?>
                    <a href="<?php echo $base_url."/".$linktoprint;?>" ><img src="<?php echo $base_url;?>/sites/all/themes/slojd/images/print_button.png"></a>
                </div>
                <br/>
                <div style="padding-top: 14px;">
                <?php
                print render($content['field_phone']);
                print render($content['field_town']);
                print render($content['field_tid_f_r_tr_ff']);
                print render($content['field_kontaktperson']);
                
               ?>
                    </div>
            </div>
        </div>

    <div class="clearfix">
        <?php if (!empty($content['links'])): ?>
            <nav class="links node-links clearfix">
    
    <?php 
    print render($content['links']); ?></nav>
        <?php endif; ?>
        <div class="grid-22 prepend-1">
            <?php print render($content['comments']); ?>
        </div>
    </div>
</article>
            </div>
