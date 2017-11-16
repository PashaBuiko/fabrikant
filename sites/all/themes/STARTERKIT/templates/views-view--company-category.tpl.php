<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="category_company_list left">
    <h2> Каталог IT-компаний</h2>
    <div class="category">
        <?php print  get_company_categories(arg(2)); ?>

    </div>
    <div class="filters">
        <?php $params = drupal_get_query_parameters(); ?>
        <div class="view-swap">
            <div class="table table-view active filter-elem">

            </div>
            <div class="map-view  filter-elem">

            </div>
        </div>
        <div class="view-filters">
            <div class="up <?php  if( isset($params['sort_order']) && $params['sort_order'] == 'ASC'){ ?> active <?}?>"></div>
            <div class="down <?php  if( isset($params['sort_order'] ) && $params['sort_order'] == 'DESC'){ ?> active <?}?>"></div>
            <div class="select-wrapper">
                <select id="fake-edit-sort-by" name="sort_by" class="form-select">
                    <option value="title" <?php  if( isset($params['sort_by']) && $params['sort_by'] == 'title'){ ?> selected="selected" <?}?> >  Заголовок          </option>
                    <option value="changed" <?php  if(isset($params['sort_by']) && $params['sort_by'] == 'changed'){ ?> selected="selected" <?}?> >Дата  обновления          </option>
                    <option value="random" <?php  if(isset($params['sort_by']) && $params['sort_by'] == 'random'){ ?> selected="selected" <?}?> >По     популярности     </option>
                </select>
            </div>

        </div>
    </div>
    <div class="map-view">
        <div id="map"  style="height: 400px;">

        </div>
    </div>




    <div class="<?php print $classes; ?> table-view active">
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
            <?php print $title; ?>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($header): ?>
            <div class="view-header">
                <?php print $header; ?>
            </div>
        <?php endif; ?>

        <?php if ($exposed): ?>
            <div class="view-filters">
                <?php print $exposed; ?>
            </div>
        <?php endif; ?>

        <?php if ($attachment_before): ?>
            <div class="attachment attachment-before">
                <?php print $attachment_before; ?>
            </div>
        <?php endif; ?>

        <?php if ($rows): ?>
            <div class="view-content">
                <?php print $rows; ?>
            </div>
        <?php elseif ($empty): ?>
            <div class="view-empty">
                <?php print $empty; ?>
            </div>
        <?php endif; ?>

        <?php if ($pager): ?>
            <?php print $pager; ?>
        <?php endif; ?>

        <?php if ($attachment_after): ?>
            <div class="attachment attachment-after">
                <?php print $attachment_after; ?>
            </div>
        <?php endif; ?>

        <?php if ($more): ?>
            <?php print $more; ?>
        <?php endif; ?>

        <?php if ($footer): ?>
            <div class="view-footer">
                <?php print $footer; ?>
            </div>
        <?php endif; ?>

        <?php if ($feed_icon): ?>
            <div class="feed-icon">
                <?php print $feed_icon; ?>
            </div>
        <?php endif; ?>

    </div><?php /* class view */ ?>

</div>
<div class="right leader_block_wrapper">
    <div class="leader_block">
    <div class="leader view-company-category">
        <h3>Лидер отрасли</h3>

    <?php  print  views_embed_view('company_leader', 'block')  ?>

    </div>
    </div>
    <div class="company-baner">
        <?php  print  views_embed_view('company_leader', 'block_1')  ?>
    </div>
</div>

