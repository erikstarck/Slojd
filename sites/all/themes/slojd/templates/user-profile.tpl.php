<div class="profile">
  	<?php //debug($user_profile['flags' ]); ?>
	<?php global $user;?>
	<?php $user_profile['flags']['#title'] = null; ?>
	<?php $user_profile['flags']['intesnall_anvandare']['#title'] = null; ?>
	<?php $user_profile['flags']['kompis']['#title'] = null; ?>

	

<div class="grid-16">
	<h3><?php echo t("Profile");?></h3>
		<?php
//only render if not currently logged in user
	if ($user_profile['field_profilename']['#object']->uid  != $user->uid) {
		?>
			<div class="grid-16">
		<?php
		print render($user_profile['flags' ]);
		?>
		</div>
<?php }
else hide($user_profile['flags' ]);?>

	<?php //print flag_create_link('intesnall_anvandare', '1'); ?>
	<?php print render($user_profile['user_picture']); ?>

	<?php print render($user_profile['field_profilename']); ?>
	<?php print render($user_profile['field_surname']); ?>
	<?php print render($user_profile['field_gender']); ?>

	<?php print render($user_profile['field_teknikintresse']); ?>
	<?php print render($user_profile['field_materialintresse']); ?>
	<?php print render($user_profile['field_verktygsintresse']); ?>


	<?php  hide($user_profile['field_friendrelation' ]); ?>
	
	<?php //print render($user_profile); ?>
  	<?php //debug($user_profile); ?>
</div>


<div class="grid-7">
	<h3><?php echo t("Friends");?></h3>
	<?php
	$user_profile['field_friendrelation' ]['#title'] = null;
	print render($user_profile['field_friendrelation' ]); ?>
</div>

<div class="grid-24">&nbsp;</div>

</div>