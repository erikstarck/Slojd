<div class="grid-15 node-add-wrapper clear-block">
  <div class="node-column-main">
    <?php 
      global $user;
	  
	  if (isset($_GET['receiver']) ) {
		$form['field_receiver']['und'][0]['uid']['#value'] = $_GET['receiver'];
		?>
		<div>
		  <input type="hidden" name="field_receiver[und][0][uid]" value="<?php echo $_GET['receivername'].' [uid:'.$_GET['receiver'].']';?>"/>
		  <?php echo t("Private message receiver: ").$_GET['receivername'] ;?>
		</div><?php
		hide($form["field_receiver"]);
	  }
	  
      hide($form["field_replyreceiver"]);
      hide($form["field_newreplies"]);
      hide($form["field_read"]);
      hide($form["comment_settings"]);

      if(isset($form["#node"]->nid) ) {
          ///Existing object
		$form['actions']['submit']['#value'] = t('Send reply');
      }
	  else {
	    $form['actions']['submit']['#value'] = t('Send message');
	  }

drupal_add_js('jQuery().ready(function(){jQuery(".filter-wrapper").hide();});', 'inline');

 print drupal_render_children($form); 	  
?>

  </div>
</div>