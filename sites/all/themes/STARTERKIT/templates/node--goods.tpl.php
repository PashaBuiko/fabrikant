<?php
/**
 * @file
 * Zen theme's implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   - view-mode-[mode]: The view mode, e.g. 'full', 'teaser'...
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content. Currently broken; see http://drupal.org/node/823380
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess_node()
 * @see template_process()
 */
?>
<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix single-good node-company"<?php print $attributes; ?> >


    <?php $id = $node->field_company['und'][0]['target_id'];
    $node_company = node_load($id);
    ?>

    <div class="node-title"> <?php print $node_company->title; ?></div>


    <?php
    // $field = field_get_items('node', $node_company, 'field_fivestar');
    // $body = field_view_value('node', $node_company, 'field_fivestar', $field[0]);
    //$output = render($body);

    print views_embed_view('company_goods', 'block_1', $node_company->nid);

    ?>


    <?php if (isset($node_company->field_logo['und'])) {
        $image = file_create_url($node_company->field_logo['und'][0]['uri']);

        ?>
        <div class="up-block">
            <div class="image"><img src="<?= $image; ?>" class="logo_image"/></div>


            <div class="slogan_block">
                <?php print  $node_company->field_slogan['und'][0]['value']; ?>
                <div class="slogan_text"><?php  if( isset($node_company->field_under_slogan_text['und']) ) print  $node_company->field_under_slogan_text['und'][0]['value']; ?></div>
            </div>

            <div class="pb__contacts_block">
                <div class="left">

                </div>
                <div class="right">
                    <?php print $node_company->field_address['und'][0]['value']; ?>
                    <?php print $node_company->field_phone['und'][0]['value']; ?>
                    <?php print $node_company->field_schedule['und'][0]['value']; ?>
                </div>
            </div>
        </div>
    <? } ?>
    <nav class="company-navigation">
        <?php
        print company_custom_menu($node_company);

        ?>
    </nav>
    <?php // print render($title_prefix); ?>
    <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php // print render($title_suffix); ?>

    <?php if ($unpublished): ?>
        <div class="unpublished"><?php //print t('Unpublished'); ?></div>
    <?php endif; ?>

    <?php if ($display_submitted): ?>
        <div class="submitted">
            <?php //print $submitted; ?>
        </div>
    <?php endif; ?>

    <div class="content"<?php print $content_attributes; ?>>
        <?php
        // We hide the comments and links now so that we can render them later.
        // hide($content['comments']);
        //hide($content['links']);
        // print render($content);


        ?>
        <a href="/tovary" class="return">< Вернуться в каталог товаров</a>
        <div class="content-wrapper">
            <div class="left-block">
                <div class="sliders-block">
                    <div class="goods-slider-for">

                        <?php
                        if(isset($node->field_slider['und'])) {
                            $slider = $node->field_slider['und'];
                            foreach ($slider as $key => $slide) {
                                $image = file_create_url($slide['uri']);
                                echo "<div><img src=" . $image . " /></div>";
                            }
                        }
                        ?>
                    </div>
                    <div class="goods-slider-nav">
                        <?php
                        if(isset($node->field_slider['und'])) {
                            $slider = $node->field_slider['und'];
                            foreach ($slider as $key => $slide) {

                                $image = file_create_url($slide['uri']);
                                echo "<div><img src=" . $image . " /></div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="right-block">
                <div class="goods-title">
                    <span > <?php print $node->title; ?></span>

                    <a class="ctools-use-modal ctools-modal-modal-popup-small" href="/modal_forms/nojs/webform/264">Заказать</a>
                </div>
                <div class="price">
                     <?= (isset($node->field_price['und'][0]['value'])) ? $node->field_price['und'][0]['value'] : ''; ?>
                </div>
                <div class="goods-description">
                    <?= $node->body['und'][0]['value']; ?>
                </div>
                <div class="goods-params">
                    <?= (isset($node->field_params['und'])) ? $node->field_params['und'][0]['value'] : ''; ?>
                </div>
            </div>
        </div>
    </div>
    <div  class="center-content">
        <div class="characters-wrapper">
            <div class="title"> <p>Характеристики</p></div>
            <div class="table-title">
                <p>Характеристика</p>
                <p>Параметр</p>
            </div>
            <div class="list">
            <?= (isset($node->field_characters['und'])) ? $node->field_characters['und'][0]['value']: ''; ?>
            </div>
        </div>
        <div class="adding-description">
            <?= (isset($node->field_adding_description['und'])) ? $node->field_adding_description['und'][0]['value'] :''; ?>
        </div>

    </div>

    <?php print render($content['links']); ?>
    <div class="tab5">
        <?php print render($content['comments']); ?>

    </div>

</div><!-- /.node -->
