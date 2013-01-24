<?php

/**
 * Override of theme_breadcrumb().
 */
function covidien_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function covidien_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // covidien_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  covidien_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function covidien_preprocess_html(&$vars) {
  // Toggle fixed or fluid width.
  if (theme_get_setting('covidien_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the html template.
 */
function covidien_process_html(&$vars) {
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $template_filename = 'html';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '__' . $path_part;
        $vars['theme_hook_suggestions'][] = $template_filename;
      }
    }
  }
}

/**
 * Override or insert variables into the page template.
 */
function covidien_preprocess_page(&$vars) {
  // Move secondary tabs into a separate variable.
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);

  if (isset($vars['main_menu'])) {
    $vars['primary_nav'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'main-menu'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['primary_nav'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'secondary-menu'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_nav'] = FALSE;
  }

  // Prepare header.
  $site_fields = array();
  if (!empty($vars['site_name'])) {
    $site_fields[] = $vars['site_name'];
  }
  if (!empty($vars['site_slogan'])) {
    $site_fields[] = $vars['site_slogan'];
  }
  $vars['site_title'] = implode(' ', $site_fields);
  if (!empty($site_fields)) {
    $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
  }
  $vars['site_html'] = implode(' ', $site_fields);

  // Set a variable for the site name title and logo alt attributes text.
  $slogan_text = $vars['site_slogan'];
  $site_name_text = $vars['site_name'];
  $vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;
   if (!empty($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__node_' . $vars['node']->type;
  }
}

function getAllJobs() {
	$file = drupal_get_path('module', 'covidien_careers') .'/xml/CV_AMS_JOB_OPENING_OUTPUT-254607.xml';
	
	$xml = simplexml_load_file($file, 'SimpleXMLElement',LIBXML_NOCDATA);

	$xml->registerXPathNamespace("n", "http://java.sun.com/xml/ns/jdbc");
  $names = $xml->xpath('/n:webRowSet/n:data/n:currentRow/n:columnValue[10]');
	$arr = array();
    foreach($names as $name) {
		$arr[] = trim($name);
    }
	$arr = array_unique($arr);
	return $arr;
}

/**
 * Override or insert variables into the node template.
 */
function covidien_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
}

/**
 * Override or insert variables into the comment template.
 */
function covidien_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function covidien_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';
}

/**
 * Override or insert variables into the page template.
 */
function covidien_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the region template.
 */
function covidien_preprocess_region(&$vars) {
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}

function covidien_css_alter(&$css) {
   //unset($css[drupal_get_path('module','system').'/system.theme.css']);
   //unset($css[drupal_get_path('module','system').'/system.base.css']);
   //unset($css[drupal_get_path('module','system').'/system.menus.css']);
}

function covidien_feeds_presave(FeedsSource $source, $entity) {
  watchdog('It works', array(), WATCHDOG_NOTICE);
}

function covidien_views_pre_render(&$view) {
  //dsm($view);
}


function covidien_preprocess_views_exposed_form(&$vars) {
  //$vars['theme_hook_suggestions'][] = $vars['form']['#id'] . '-form';
}