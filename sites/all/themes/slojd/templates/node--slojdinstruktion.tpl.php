<!-- node--slojdinstruktion -->
<div class=""> 
<article<?php print $attributes; ?>>
    <div<?php print $content_attributes; ?>>
        <div class="">
            <div class="slojdinstruktionimage">
                <?php print render($content['field_instructionimage']); ?>
            </div>
            <div >
                <h2 class="slojdtitle"><?php print $title; ?></h2>
                <?php print render($content['body']); ?>
                <?php if (!empty($content['links'])): ?>
                    <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
                <?php endif; ?>
            </div>
        </div>
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
            hide($content['comments']);
            print render($content['book_navigation']);
            ?>
        </div>
        <div class="">
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
