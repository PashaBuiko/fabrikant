<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<header>
    <div class="container">
        <div class="logo">
            <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
        </div>
        <div class="right-block">
            <div class="autorization-block">
                <a href="">Авторизация</a>
            </div>
            <div class="search-filter">
                <div class="view-filters">
                    <form action="/search" method="get" id="views-exposed-form-search-view-page" accept-charset="UTF-8">
                        <div>
                            <div class="views-exposed-form">
                                <div class="views-exposed-widgets clearfix">
                                    <div id="edit-search-api-views-fulltext-wrapper"
                                         class="views-exposed-widget views-widget-filter-search_api_views_fulltext">
                                        <div class="views-widget">
                                            <div
                                                    class="form-item form-type-textfield form-item-search-api-views-fulltext">
                                                <input type="text" id="edit-search-api-views-fulltext"
                                                       name="search_api_views_fulltext" placeholder="ПОИСК" size="30"
                                                       maxlength="128" class="form-text">

                                                <div class="views-exposed-widget views-submit-button">
                                                    <input type="submit" id="edit-submit-search-view" name=""
                                                           class="form-submit"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edit-type-wrapper" class="views-exposed-widget views-widget-filter-type">
                                        <div class="views-widget">
                                            <div id="edit-type" class="form-checkboxes">
                                                <div class="form-item form-type-checkbox form-item-type-1">
                                                    <label class="option" for="edit-type-1">
                                                        <input type="checkbox" id="edit-type-1" name="type[1]" value="1"
                                                               class="form-checkbox checkbox">
                                                        <span class="checkbox-custom"></span>
                                                        <span class="label">Новости</span>
                                                    </label>


                                                </div>
                                                <div class="form-item form-type-checkbox form-item-type-2">
                                                    <label class="option"
                                                           for="edit-type-2">
                                                        <input type="checkbox" id="edit-type-2" name="type[2]" value="2"
                                                               class="form-checkbox checkbox">
                                                        <span class="checkbox-custom"></span>
                                                        <span class="label">Предприятия</span>
                                                    </label>
                                                </div>
                                                <div class="form-item form-type-checkbox form-item-type-3">
                                                    <label class="option" for="edit-type-3">
                                                        <input type="checkbox" id="edit-type-3" name="type[3]" value="3"
                                                               class="form-checkbox checkbox">
                                                        <span class="checkbox-custom"></span>
                                                        <span class="label">Товары</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</header>

<nav>
    <div class="container">
        <?php
        $block = module_invoke('superfish', 'block_view', '1');
        print render($block["content"]);
        ?>
        <div class="clearfix"></div>
    </div>
</nav>


<div id="page-wrapper">
    <?php print $messages; ?>
    <?php if ($tabs = render($tabs)): ?>
        <div class="tabs"><?php print $tabs; ?></div>
    <?php endif; ?>
    <?php print render($page['help']); ?>
    <div id="page">

        <!-- /.section, /#header -->

        <div id="main-wrapper">
            <h1 class="title">Каталог предприятий</h1>

            <div class="goods-list tab2 ">
                <div class="left-side">
                    <div class="term_tree category_company">
                        <?php echo tax_tree_taxonomy_tree('company_category'); ?>
                    </div>
                </div>
                <div class="right-side">
                    <div class="add_company"><a href="/">Добавить предприятие</a></div>
                    <div class="company_tags">
                        <?php echo tax_tree_taxonomy_tree('company_tags'); ?>
                    </div>
                    <div class="news-block category_company">
                        <h2 class="title"> Новости компаний</h2>
                        <?php
                        print views_embed_view('company_news', 'block_3');
                        ?>
                    </div>
                </div>
            </div>
            <div class="new-enterprise type-2">

                <h2 class="title">НОВЫЕ КОМПАНИИ</h2>
                <div class="new-enterprise-wrapp">
                <div class="left-block">
                    <?php print  views_embed_view('new_enterprice', 'block_1') ?>
                </div>
                <div class="right-block">
                    <?php  $node = node_load(259);
                    $file = file_create_url($node->field_image['und'][0]['uri']); 
                    
                    ?>
                    <img src="<?=$file; ?>" alt="">
                </div>
                </div>

            </div>
        </div>
        <!-- /#main, /#main-wrapper -->

        <?php print render($page['footer']); ?>

    </div>
</div><!-- /#page, /#page-wrapper -->

<?php print render($page['bottom']); ?>

