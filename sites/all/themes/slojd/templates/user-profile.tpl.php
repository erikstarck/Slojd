<div class="profile">
    <?php //debug($user_profile['flags' ]); ?>
    <?php global $user; ?>
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
        <div class="grid-16">
            <div class="grid-14 silverline">
                <?php //The numberofmessages-session variabel is set in the messages block, at the top in the header.?>
                <h3><?php echo t("My messages");?></h3>
                  <?php echo t("Number of messages: ".$_SESSION["numberofmessages"] ); ?>

            </div>
            <div class="grid-14 silverline">
                <h3><?php echo t("Friends"); ?></h3>
                <?php
                //only render if not currently logged in user
                if ($user_profile['field_profilename']['#object']->uid != $user->uid) {
                    ?>
                    <div class="grid-16">
                        <?php
                        print render($user_profile['flags']);
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

            <div class="grid-14 silverline">
                <h3><?php echo t("My interests"); ?></h3>
                <?php print render($user_profile['field_teknikintresse']); ?>
                <?php print render($user_profile['field_materialintresse']); ?>
                <?php print render($user_profile['field_verktygsintresse']); ?>
            </div>

        </div>
    </div>

    <div class="grid-24">&nbsp;</div>

</div>