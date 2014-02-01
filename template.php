<?php
/*
//function crazybird_preprocess_html(&$variables) {
//  $options = array(
//    'group' => JS_THEME,
//  );
//  //drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/jquery.js', $options);
//  //drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/jquery.jcarousel.js', $options);
//  //drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/index.js', $options);
//  //drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/jcarousel.responsive.js', $options);
//  drupal_add_js('http://code.jquery.com/jquery-1.10.1.min.js', $options);
//  drupal_add_js('http://code.jquery.com/jquery-migrate-1.2.1.min.js', $options);
//  drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/jquery.easing.1.3.js', $options);
//  drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/jquery.jcarousel.min.js', $options);
//  //drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/jquery.jcarousel.pack.js', $options);
//  //drupal_add_js(drupal_get_path('theme', 'crazybird') . '/js/index.js', $options);
//}
 */

function cmotheme_process_html(&$variables) {
  $variables['head'] = '<meta charshet="utf-8" />';
  $variables['head'] .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
  $variables['head'] .= '<meta name="viewport" content="width=device-width, initial-scale=1" />';
  //$variables['head'] .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">';
  //$variables['head'] .= '<link href="http://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">';
  //$variables['head'] .= '<link href="http://fonts.googleapis.com/css?family=Purple+Purse" rel="stylesheet">';
  //$variables['head'] .= '<link href="http://fonts.googleapis.com/css?family=Purple+Purse" rel="stylesheet">';
  $variables['head'] .= '<link href="http://fonts.googleapis.com/css?family=Exo+2:400,600,900" rel="stylesheet" type="text/css">';
  $variables['head'] .= '<link href="http://fonts.googleapis.com/css?family=Open%20Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic" rel="stylesheet" type="text/css">';

}
 
//function crazybird_preprocess_node(&$variables) {
//  if ($variables['submitted']) {
//    $variables['submitted'] = t('Submitted by !username', array('!username' => $variables['name']));
//  }
//
//  $node = $variables['node'];
//  if ($variables['type'] == 'evento') {
//    $fecha = $node->field_date['und'][0]['value'];
//    $variables['evento_dia'] = format_date(intval($fecha), 'custom', 'd');
//    $variables['evento_mes'] = format_date(intval($fecha), 'custom', 'M');
//    $variables['evento_ano'] = format_date(intval($fecha), 'custom', 'Y');
//  } else {
//    $fecha = $node->created;
//    $variables['evento_dia'] = format_date(intval($fecha), 'custom', 'd');
//    $variables['evento_mes'] = format_date(intval($fecha), 'custom', 'M');
//    $variables['evento_ano'] = format_date(intval($fecha), 'custom', 'Y');
//  }
//}

//function crazybird_preprocess_block(&$variables) {
//  /**
//   * Bloque: user-menu
//   * Cambia el texto del enlace a la cuenta de usuario
//   * por el nombre del usuario.
//   */
//  $block = $variables['block'];
//  if ($block->bid == 'system-user-menu' && $block->region == 'header') {
//    foreach($variables['elements'] as &$item) {
//      if (is_array($item) && array_key_exists('#title', $item)) {
//        $variables['content'] = ($item['#href'] == 'user') ? str_replace($item['#title'], theme('username', array('account'=>$variables['user'])), $variables['content']) : $variables['content'];
//      }
//    }
//  }
//}

