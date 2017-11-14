<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   STARTERKIT_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: STARTERKIT_field()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  if (strpos($variables['region'], 'sidebar_') === 0) {
    $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  }
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  $variables['classes_array'][] = 'count-' . $variables['block_id'];
}
// */





function switch_month($month){




      switch ($month) {
          case '01':
              $month = "Января";
              break;
          case '02':
              $month = "Февраля";
              break;
          case '03':
              $month = "Марта";
              break;
          case '04':
              $month = "Апреля";
              break;
          case '05':
              $month = "Мая";
              break;
          case '06':
              $month = "Июня";
              break;
          case '07':
              $month = "Июля";
              break;
          case '08':
              $month = "Августа";
              break;
          case '09':
              $month = "Сентября";
              break;
          case '10':
              $month = "Октября";
              break;
          case '11':
              $month = "Ноября";
              break;
          case '12':
              $month = "Девабря";
              break;
      }


  return  $month;
}

function switch_slide_month($month){

      switch($month)
        {
            case '1': $month = "Январь"; break;
            case '2': $month = "Февраль"; break;
            case '3': $month = "Март"; break;
            case '4': $month = "Апрель"; break;
            case '5': $month = "Май"; break;
            case '6': $month = "Июнь"; break;
            case '7': $month = "Июль"; break;
            case '8': $month = "Август"; break;
            case '9': $month = "Сентябрь"; break;
            case '10': $month = "Октябрь"; break;
            case '11': $month = "Ноябрь"; break;
            case '12': $month = "Девабрь"; break;
        }



    return  $month;
}
function STARTERKIT_preprocess_page(&$variables, $hook)
{
    if (isset($variables['node'])) {
        $variables['theme_hook_suggestions'][] = 'page__type__' . $variables['node']->type;
        $variables['theme_hook_suggestions'][] = "page__node__" . $variables['node']->nid;
    }
    drupal_add_js('https://maps.googleapis.com/maps/api/js?key=AIzaSyB_9Ia3_kIy7_UAxGz2ts4sQ_Lq8FTTL2M&callback=initMap', 'header');

}

function company_custom_menu(){
    $menu_array = menu_navigation_links('menu-company-menu');
    $index = 0 ;
    $current_path =explode('/', drupal_get_path_alias($_GET['q']));
    $company_base_path = $current_path[0].'/'.$current_path[1];

    foreach($menu_array as $key=> $item){
        switch ($index){
            case '0' : $menu_array[$key]['href'] = $company_base_path;   break;
            case '1' : $menu_array[$key]['href'] = $company_base_path.'/products'; break;
            case '2' : $menu_array[$key]['href'] = $company_base_path.'/news'; break;
            case '3' : $menu_array[$key]['href'] = $company_base_path.'/gallery'; break;
            case '4' : $menu_array[$key]['href'] = $company_base_path.'/contacts'; break;
            case '5' : $menu_array[$key]['href'] = $company_base_path.'/reviews'; break;
        }
        $index++;
    }

    return theme('links__company-menu', array('links' => $menu_array));
}

function taxonomy_get_nested_tree($terms = array(), $max_depth = NULL, $parent = 0, $parents_index = array(), $depth = 0) {
    if (is_int($terms)) {
        $terms = taxonomy_get_tree($terms);
    }
    foreach($terms as $term) {
        foreach($term->parents as $term_parent) {
            if ($term_parent == $parent) {
                $return[$term->tid] = $term;
            }
            else {
                $parents_index[$term_parent][$term->tid] = $term;
            }
        }
    }
    foreach($return as &$term) {
        if (isset($parents_index[$term->tid]) && (is_null($max_depth) || $depth < $max_depth)) {
            $term->children = taxonomy_get_nested_tree($parents_index[$term->tid], $max_depth, $term->tid, $parents_index, $depth + 1);
        }
    }
    return $return;
}

function theme_taxonomy_nested_tree($tree) {
    if (count($tree)) {
        $output = '<ul class="taxonomy-tree">';
        foreach ($tree as $term) {
            $output .= '<li class="taxonomy-term">';
            $output .= l($term->name, taxonomy_term_path($term));
            if ($term->children) {
                $output .= theme('illogica_category_tree', $term->children);
            }
            $output .= '</li>';
        }
        $output .= '</ul>';
    }
    return $output;
}


function STARTERKIT_pager_last($variables) {
    $text = $variables['text'];
    $element = $variables['element'];
    $parameters = $variables['parameters'];

    global $pager_page_array, $pager_total;
    $output = '';
    if ($text == 'последняя »'){
        $text ="...";
    }
    // If we are anywhere but the last page
    if ($pager_page_array[$element] < ($pager_total[$element] - 1)) {
        $output = theme('pager_link', array('text' => $text, 'page_new' => pager_load_array($pager_total[$element] - 1, $element, $pager_page_array), 'element' => $element, 'parameters' => $parameters));
    }

    return $output;
}

function STARTERKIT_form_comment_form_alter(&$form, &$form_state) {
    // Wrap the intro in a div for themeing.
    $form['author']['_author']['#title'] = t('Отображаемое имя');
    $form['actions']['submit']['#value'] = t('Отправить');
    $form['actions']['preview'] = NULL;

}

function get_company_by_goods($id_good){


}





















