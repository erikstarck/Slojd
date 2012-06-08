<?php
global $user;
//Only show this block if a user is logged in
if ($user->uid) {

?>
<!-- <div class="grid-<?php echo (isset($blocktheme_vars['gridsize']) ? $blocktheme_vars['gridsize'] : "18");?> silverline"> -->
<div class="silverline">

<?php
$block = array();
if (isset($blocktheme_vars['blocktorender'])) {
  $block = module_invoke($blocktheme_vars['blocktorender'], 'block_view', $blocktheme_vars['blocktorender']);
  echo "<!-- Rendering ".$blocktheme_vars['blocktorender']. " -->";
}

$content = $block['content'];
$tag = $block['subject'] ? 'section' : 'div'; ?>
<<?php print $tag; ?><?php print $attributes; ?>>
  <div class="block-inner clearfix">
    <?php print render($title_prefix); ?>
    <?php if ($block['subject']): ?>
      <h2<?php print $title_attributes; ?>><?php print $block['subject']; ?></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    
    <div<?php print $content_attributes; ?>>
      <?php print render($content) ?>
    </div>
  </div>
</<?php print $tag; ?>>
</div>

<?php
  echo "<!-- Rendering ".$blocktheme_vars['blocktorender']. " done! -->";

} ?>