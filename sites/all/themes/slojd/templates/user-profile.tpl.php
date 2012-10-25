<div class="profile">

    <?php //debug($user_profile['flags' ]); ?>
    <?php global $user; ?>
    <?php global $base_url;  ?>
    <?php $user_profile['flags']['#title'] = null; ?>
    <?php $user_profile['flags']['intesnall_anvandare']['#title'] = null; ?>
    <?php $user_profile['flags']['kompis']['#title'] = null; ?>

    <?php hide($user_profile['field_friendrelation']); ?>

    <div class="grid-24">
        <h3><?php echo t("Profile"); ?></h3>
    </div>

    <div class="grid-24">
        <div class="grid-6">
            <?php print render($user_profile['user_picture']); ?>

            <?php print render($user_profile['field_profilename']); ?>
            <?php print render($user_profile['field_surname']); ?>
            <?php print render($user_profile['field_gender']); ?>
        </div>
        <div class="grid-17">
            <div class="grid-16 silverline">
                <?php //The numberofmessages-session variabel is set in the messages block, at the top in the header.?>
                <h3 class="numberofmessagestitle">
                    <img src="<?php echo $base_url; ?>/sites/all/themes/slojd/images/messages_icon.png"></img> <span><?php echo t("My messages");?></span></h3>
                <div class="numberofmessages">
                    <?php echo "".(isset($_SESSION["numberofmessages"])?($_SESSION["numberofmessages"]):"0" ).t(" new messages. "); ?>
                </div>

            </div>
            <div class="grid-16 silverline">
                <h3><img src="<?php echo $base_url; ?>/sites/all/themes/slojd/images/myfriends_icon.png"></img> <span><?php echo t("Friends"); ?></span></h3>
                <?php
                //only render if not currently logged in user
                if ($user_profile['field_profilename']['#object']->uid != $user->uid) {
                    ?>
                    <div class="grid-16">
                        <?php
                        //Prevent flagging of admins
                         if (in_array('administrator', array_values($user_profile['field_profilename']['#object']->roles))==false) {
                            print render($user_profile['flags']);
                          }                        
                        ?>
                    </div>
                <?php
                }
                else
                    hide($user_profile['flags']);
                ?>                
                <?php
                $user_profile['field_friendrelation']['#title'] = null;
                print render($user_profile['field_friendrelation']);
                ?>
            </div>

            <div class="grid-16 silverline">
                <h3> <img src="<?php echo $base_url; ?>/sites/all/themes/slojd/images/minaprojekt.png"><span><?php echo t("My interests"); ?></span></h3>
                <?php
                $user_profile['field_teknikintresse']['#title'] = null;
                print render($user_profile['field_teknikintresse']); ?>
                <?php 
                 $user_profile['field_materialintresse']['#title'] = null;
                 print render($user_profile['field_materialintresse']); ?>
                <?php 
                 $user_profile['field_verktygsintresse']['#title'] = null;
                 print render($user_profile['field_verktygsintresse']); ?>
            </div>
        </div>
    </div>

    <div class="grid-24">&nbsp;</div>

</div>