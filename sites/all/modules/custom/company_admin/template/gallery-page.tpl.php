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
<div id="node-<?php print $node->nid; ?> "
     class="<?php print $classes; ?> clearfix node-company"<?php print $attributes; ?>>


    <div class="node-title"> <?php print $node->title; ?></div>

    <?php //echo fivestar_widget_form($node); ?>
    <?php print render($node->field_fivestar); ?>
    <div class="main_rating"><?php print views_embed_view('company_goods', 'block_1', $node->nid); //echo theme_fivestar_static($variables); ?>
    </div>

    <?php if (isset($node->field_logo['und'])) {
    $image = file_create_url($node->field_logo['und'][0]['uri']);

    ?>
    <div class="up-block">
        <div class="image"><img src="<?= $image; ?>" class="logo_image"/></div>

        <? } ?>
        <div class="slogan_block">
            <?php print render($node->field_slogan['und'][0]['value']);

            ?>
            <div class="slogan_text"><?php print render($node->field_under_slogan_text['und'][0]['value']);            ?></div>
        </div>


        <div class="pb__contacts_block">
            <div class="left">

            </div>
            <div class="right">
                <div class="field-name-field-address"><?php print render($node->field_address['und'][0]['value']); ?></div>
                <div class="field-name-field-phone"><?php print render($node->field_phone['und'][0]['value']); ?></div>
                <div class="field-name-field-schedule"><?php print render($node->field_schedule['und'][0]['value']); ?></div>
            </div>
        </div>
    </div>

    <nav class="company-navigation">

        <?php
        print company_custom_menu();

        ?>
    </nav>

    <div class="gallery-list tab4 ">
           <div class="company_photogallery_wrapper">

            <div class="custom_filter" style="display: none;">
                <?php
                $object_terms= taxonomy_term_load_multiple(array(21,22,23,24));

                foreach ($object_terms as $term ){
                    $file = file_create_url($term->field_image['und'][0]['uri']);
                    ?>
                    <img src="<?=$file;?>" alt="" class="<?= 'tid-'.$term->tid;?>">
                    <?
                }
                ?>
            </div>
            <h2 class="block-title"> Фотогалерея </h2>
            <?php
            print views_embed_view('company_goods', 'page_2',$node->nid);
            ?>
        </div>
        <div class="right-side">
            <div class="grey-block">

               <div > <?php   print render($node->field_fabriks_type['und'][0]['value']);  ?></div>
               <div > <?php print render($node->field_unp['und'][0]['value']); ?></div>



            </div>
            <div class="news-block">
                <h2 class="title"> Новости компаний</h2>
                <?php
                print views_embed_view('company_goods', 'page_4',$node->nid);
                ?>
            </div>


            <?php   ///// left side




            //    here must popoular news \\
            $file = file_create_url($node->field_baner['und'][0]['uri']);
            print '<img src='.$file.' />';

            ?>
        </div>
    </div>



</div><!-- /.node -->