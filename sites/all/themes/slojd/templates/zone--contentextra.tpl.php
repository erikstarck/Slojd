<!-- Needed to prevent ugly loading of carousel -->
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".karusell").css("position","static");
       
    });
</script>

<?php //Removed the breadcrumb, this is now in region--content.tpl.php ?>
<?php if ($wrapper): ?><div<?php print $attributes; ?>><?php endif; ?>  
  <div<?php print $content_attributes; ?>>    
    <?php if ($messages): ?>
      <div  class="grid-<?php print $columns; ?>"><?php print $messages; ?></div>
    <?php endif; ?>
    <?php print $content; ?>
  </div>
<?php if ($wrapper): ?></div><?php endif; ?>
