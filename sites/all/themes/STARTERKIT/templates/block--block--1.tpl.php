<?php

$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'slideshow')
    ->propertyCondition('status', NODE_PUBLISHED);
$result = $query->execute();


$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'news')
    ->propertyOrderBy('changed', 'ASC')
    ->propertyCondition('status', NODE_PUBLISHED);
$popular_news = $query->execute();






?>


<div class="industry-block-wrapper">
    <h2><?php print $block->subject; ?></h2>

    <div class="industry-block">


        <div class="slider-block">
            <?php
            $i = 1;
            foreach ($result['node'] as $key => $slide) {
                $node = node_load($slide->nid);
                $file = file_create_url($node->field_image_['und'][0]['uri']);
                ?>
                <div class="item"
                     style="background: url(<?= $file ?>)no-repeat; background-size:cover; width:700px; max-height: 609px;"></div>
                <?php $i++;
            } ?>
        </div>

        <div class="popular-news ">
            <div class="right">
                <?php
                $block = block_load('views', 'view_industry-block_4');
                $blocks = _block_render_blocks(array($block));
                $blocks_build = _block_get_renderable_array($blocks);
                echo drupal_render($blocks_build);
                ?>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="views-wrapper">
        <div class="left-block">
            <?php
            $view = views_get_view('view_industry');
            $view->set_display('1');
            print $view->preview('block_1');
            ?>
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
        </div>

    </div>
</div>