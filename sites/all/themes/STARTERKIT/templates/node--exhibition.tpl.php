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
     class="<?php print $classes; ?> clearfix node-company node-company-news"<?php print $attributes; ?>>

    <div class="content"<?php print $content_attributes; ?>>
        <a href="/tovary" class="return">< Вернуться на главную</a>
    </div>
    <div class="news-content">
        <h3> <?= $node->title; ?></h3>
        <p class="date"><?= date('d.m.Y / H:i', $node->created); ?></p>

        <div class="left-block">


            <div class="body" style="margin-top:20px;">
              <?= (isset($node->field_description['und'][0]['value'])) ? $node->field_description['und'][0]['value'] : ''; ?>
            </div>
            <div class="clearfix"></div>

            <div class="socials">
                    <!--<a href="<?/*= (isset($node->field_facebook['und'][0]['value'])) ? $node->field_facebook['und'][0]['value'] : ''; */?>"
                       class="facebook"></a>
                    <a href="<?/*= (isset($node->field_gmail['und'][0]['value'])) ? $node->field_gmail['und'][0]['value'] : ''; */?>"
                       class="gmail"></a>
                    <a href="<?/*= (isset($node->field_vk['und'][0]['value'])) ? $node->field_vk['und'][0]['value'] : ''; */?>"
                       class="vk"></a>
                    <a href="<?/*= (isset($node->field_ok['und'][0]['value'])) ? $node->field_ok['und'][0]['value'] : ''; */?>"
                       class="ok"></a>
                    <a href="<?/*= (isset($node->field_twitter['und'][0]['value'])) ? $node->field_twitter['und'][0]['value'] : ''; */?>"
                       class="twitter"></a>
                    <a href="<?/*= (isset($node->field_linkedin['und'][0]['value'])) ? $node->field_linkedin['und'][0]['value'] : ''; */?>"
                       class="linkedin"></a>-->

            </div>
            <div class="comments-block page-company">
                <?php
                $viewComs = comment_node_page_additions($node);
                print drupal_render($viewComs);

                ?>
            </div>
        </div>
            <div class="right-block">
                <div class=" view-popular">
                    <?php
                    $block = block_load('views', 'view_industry-block_2');
                    $blocks = _block_render_blocks(array($block));
                    $blocks_build = _block_get_renderable_array($blocks);
                    echo drupal_render($blocks_build);
                    ?>
                </div>
                <div class="industry-baner">
                    <?php
                    $block = block_load('views', 'view_industry-block_3');
                    $blocks = _block_render_blocks(array($block));
                    $blocks_build = _block_get_renderable_array($blocks);
                    echo drupal_render($blocks_build);
                    ?>

                </div>
                <div class="company_news_block">
                    <?php
                    $block = block_load('views', 'economic_news-block_4');
                    $blocks = _block_render_blocks(array($block));
                    $blocks_build = _block_get_renderable_array($blocks);
                    echo drupal_render($blocks_build);
                    ?>
                </div>
            </div>

        </div>

        <div>

        </div>


    </div><!-- /.node -->
