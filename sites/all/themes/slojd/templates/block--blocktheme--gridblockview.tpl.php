<div class="silverline">
<?php
$printTitle = $blocktheme_vars['printtitle']==1?true:false;
//print views_embed_view(trim($blocktheme_vars['viewtorender']));
$view = views_get_view(trim($blocktheme_vars['viewtorender']));
$view->set_display('block');
if($printTitle) print "<div style='padding-left:24px'><h2>".$view->get_title()."</h2></div>";
print $view->preview('block');
?>
</div>