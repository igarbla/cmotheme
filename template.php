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

function cmotheme_css_alter(&$css) {
    unset($css[drupal_get_path('module','system').'/system.theme.css']);
    //unset($css[drupal_get_path('module','system').'/system.menus.css']);
    //unset($css[drupal_get_path('module','system').'/system.base.css']);
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

function cmotheme_item_list($variables) {
  $items = $variables['items'];
  $title = $variables['title'];
  $type = $variables['type'];
  $attributes = $variables['attributes'];

  // Only output the list container and title, if there are any list items.
  // Check to see whether the block title exists before adding a header.
  // Empty headers are not semantic and present accessibility challenges.
  $output = '';
  if (isset($title) && $title !== '') {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    $i = 0;
    foreach ($items as $item) {
      $attributes = array();
      $children = array();
      $data = '';
      $i++;
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 1) {
        $attributes['class'][] = 'first';
      }
      if ($i == $num_items) {
        $attributes['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  $output .= '';
  return $output;
}

function cmotheme_links__locale_block(&$variables) {
  // the global $language variable tells you what the current language is
  global $language;
  // an array of list items
  $items = array();
  foreach($variables['links'] as $lang => $info) {
      $name     = $info['language']->native;
      $href     = isset($info['href']) ? $info['href'] : '';
      $li_classes   = array('list-item-class');
      // if the global language is that of this item's language, add the active class
      if($lang === $language->language){
            $li_classes[] = 'active';
      }
      $link_classes = array();
      $options = array('attributes' => array('class'    => $link_classes),
                                             'language' => $info['language'],
                                             'html'     => true
                                             );
      $link = l($name, $href, $options);
      // display only translated links
      if ($href) $items[] = array('data' => $link, 'class' => $li_classes);
   }
  // output
  $attributes = array('class' => array(''));
  $output = theme_item_list(array('items' => $items,
                                  'title' => '',
                                  'type'  => 'ul',
                                  'attributes' => $attributes
  			  ));
  return $output;
}

/*
 * Menu principal con un solo nivel
 */

function cmotheme_links($variables) {
  if (array_key_exists('id', $variables['attributes']) && $variables['attributes']['id'] == 'main-menu') {
    $pid = variable_get('menu_main_links_source', 'main-menu');
    $tree = menu_tree_output(menu_build_tree($pid, array('max_depth' => 2)));
    //dsm($tree);
    return drupal_render($tree);
  }
  return theme_links($variables);
}

/*
 * Catálogo View Theme Functions
 */

//function cmotheme_views_view_list__catalogo__page($variables) {
	//kpr($variables);
//}

function cmotheme_views_view_fields__catalogo__page($variables) {
	//kpr($variables);
	$enlace = $variables['fields']['name_field']->content;
	$nombre = $variables['fields']['name_field_1']->content;
	$foto   = $variables['fields']['field_catalogo_foto']->content;

	$output  = '<div class="box">';
	//$output .= $variables['fields']['name_field']->content;
	//$output .= substr($variables['fields']['name_field']->content, 0, -4);
	$output .= str_replace($nombre .'</a>', '', $enlace);
	$output .= '<div class="slide">';
	$output .= $foto;
	$output .= '<div class="scontent">';
	$output .= '<h2>'. $nombre . '</h2>';
	$output .= '</div></div>';
	$output .= '</a>';
	$output .= '</div>';
	return $output;
}

/*
 * Producto theme functions
 */
function cmotheme_field__field_fichero_man_instalacion__producto($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}

/*
 * Navegación entre productos
 *
 * Visto en: https://drupal.org/comment/4238936#comment-4238936
 */
function producto_sibling($dir = 'next', $node, $next_node_text=NULL, $prepend_text=NULL, $append_text=NULL, $tid = FALSE){
  if($tid){
    $query = 'SELECT n.nid, n.title FROM {node} n INNER JOIN {term_node} tn ON n.nid=tn.nid WHERE '
           . 'n.nid ' . ($dir == 'previous' ? '<' : '>') . ' :nid AND n.type = :type AND n.status=1 '
           . 'AND tn.tid = :tid ORDER BY n.nid ' . ($dir == 'previous' ? 'DESC' : 'ASC');
    //use fetchObject to fetch a single row
    $row = db_query($query, array(':nid' => $node->nid, ':type' => $node->type, ':tid' => $tid))->fetchObject();
  }else{
    $query = 'SELECT n.nid, n.title FROM {node} n WHERE '
           . 'n.nid ' . ($dir == 'previous' ? '<' : '>') . ' :nid AND n.type = :type AND n.status=1 '
           . 'ORDER BY n.nid ' . ($dir == 'previous' ? 'DESC' : 'ASC');
    //use fetchObject to fetch a single row
    $row = db_query($query, array(':nid' => $node->nid, ':type' => $node->type))->fetchObject();
  }
  if($row) {
    $text = $next_node_text ? $next_node_text : $row->title;
    return $prepend_text . l($text, 'node/'.$row->nid, array('rel' => $dir)) . $append_text;
  } else {
      return FALSE;
  }
}

