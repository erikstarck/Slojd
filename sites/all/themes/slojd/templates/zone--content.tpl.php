<!-- Needed to prevent ugly loading of carousel -->
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".karusell").css("position","static");
        jQuery(".simple-dialog").attr("rel","height:400");
         jQuery(".loadmessage").css("display", "none");
    });
</script>

<?php if ($wrapper): ?><div<?php print $attributes; ?>><?php endif; ?>  
  <div<?php print $content_attributes; ?>>    
    <?php if ($messages): ?>
      <div id="messages" class="grid-<?php print $columns; ?>"><?php print $messages; ?></div>
    <?php endif; ?>
    <?php print $content; ?>
  </div>
<?php if ($wrapper): ?></div><?php endif; ?>