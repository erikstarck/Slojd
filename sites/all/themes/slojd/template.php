<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

function slojd_theme($existing, $type, $theme, $path) {
  //Change the template used for message sending. The template will be
  // privat-meddelande-node-form.tpl in the templates-folder of this theme.
  $result = array(
    'privat_meddelande_node_form' => array(
      'arguments' => array('form' => NULL),
      'render element' => 'form',
      'template' => 'privat-meddelande-node-form',
      // this will set to module/theme path by default:
      'path' => drupal_get_path('theme', 'slojd')."/templates",
    )
  );
return $result;
}


/**
 * Hook to do minor changes to forms.
 */
function slojd_form_alter(&$form, &$form_state, $form_id) {
  if($form_id == "user_register_form") {
    drupal_set_title( t('Register a new user'));
  }
  else if ($form_id == 'privat_meddelande_node_form') {
    drupal_set_title( t('Send a private message'));
  }
  else if ($form_id == 'comment_node_privat_meddelande_form') {
		$form['actions']['submit']['#value'] = t('Send reply');
  }
}

/**
 * Trying to modify how the Slรถjdkorgen menu is rendered.
 */
function slojd_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  if(isset($element['#localized_options']['attributes']) == false)
    $element['#localized_options']['attributes']=array();
/*  $element['#localized_options']['attributes']['name'] = "region-content";
  $element['#localized_options']['attributes']['class'] = "simple-dialog";
 debug($element['#localized_options']);
*/   $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Change the previous link to work even at pager page 0, it then links to the last page.
 */
function slojd_pager_previous($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $interval = $variables['interval'];
  $parameters = $variables['parameters'];
  global $pager_page_array, $pager_total;
  $output = '';

  // If we are anywhere but the first page
  if ($pager_page_array[$element] >= 0) {
    $page_new = pager_load_array($pager_page_array[$element] == 0 ? $pager_total[$element] - $interval : $pager_page_array[$element] - $interval,
                                 $element, $pager_page_array);

    // If the previous page is the first page, mark the link as such.
    if ($page_new[$element] == 0) {
      $output = theme('pager_first', array('text' => $text, 'element' => $element, 'parameters' => $parameters));
    }
    // The previous page is not the first page.
    else {
      $output = theme('pager_link', array('text' => $text, 'page_new' => $page_new, 'element' => $element, 'parameters' => $parameters));
    }
  }

  return $output;
}

/**
 * Change the next link to work even at last page, it then links to the first page.
 */
function slojd_pager_next($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $interval = $variables['interval'];
  $parameters = $variables['parameters'];
  global $pager_page_array, $pager_total;
  $output = '';

  // If we are anywhere but the last page
  if ($pager_page_array[$element] < ($pager_total[$element] )) {
    $page_new = pager_load_array($pager_page_array[$element] == ($pager_total[$element] - $interval) ?
                                 0 : 
                                 $pager_page_array[$element] + $interval, $element, $pager_page_array);
    // If the next page is the last page, mark the link as such.
    if ($page_new[$element] == ($pager_total[$element] - 1)) {
      $output = theme('pager_last', array('text' => $text, 'element' => $element, 'parameters' => $parameters));
    }
    // The next page is not the last page.
    else {
      $output = theme('pager_link', array('text' => $text, 'page_new' => $page_new, 'element' => $element, 'parameters' => $parameters));
    }
  }

  return $output;
}

?>