<?php


$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'news')
    ->propertyOrderBy('changed', 'ASC')
    ->propertyCondition('status', NODE_PUBLISHED);
$result = $query->execute();


?>


<div class="economic-block-wrapper">
    <h2><?php print $block->subject; ?></h2>
    <?php
    $count = 1;
        foreach ($result['node'] as $key => $new) {
            $node = node_load($new->nid);
            $file = file_create_url($node->field_image['und'][0]['uri']);
                if ( $node->field_tags && $node->field_tags['und'][0]['tid'] == '2') {
                    if ($node->field_fixed_news && $node->field_fixed_news['und'][0]['value'] == '1') {
                      if ($count == 1) { ?>
                        <div class="news_wrapp">
                         <div class="big-news">
                           <div class=" image"> <a href="/node/<?php print $node->nid; ?>"> <div  style="background: url(<?= $file ?>)no-repeat; background-size:cover; width:480px; height: 480px;"></div> </a></div>
                             <div class="text"> <a href="/node/<?php print $node->nid; ?> " class="title">   <?php print $node->title; ?></a>

                             <div class="description"><?= $node->field_news_description['und'][0]['value'] ;?></div>
                             <div class="date"><?=date('d.m.Y H:i', $node->changed);?></div></div>

                        </div>
                        <div class="right-block-news">
                        <? $count++;
                      }
                      else {  ?>
                          <div class=" image"> <a href="/node/<?php print $node->nid; ?>"> <div  style="background: url(<?= $file ?>)no-repeat; background-size:cover; width:260px; height: 171px;"></div> </a></div>
                          <div class="text"> <a href="/node/<?php print $node->nid; ?> " class="title">   <?php print $node->title; ?></a>

                              <div class="description"><?= $node->field_news_description['und'][0]['value'] ;?></div>
                              <div class="date"><?=date('d.m.Y H:i', $node->changed);?></div></div>
                        <?php $count++;
                      }
                    }
                }
        } ?>
    </div></div>

    <div class="economic_news">
        <?php
        $block = block_load('views', 'economic_news-block_1');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>


    </div>
    <div class="views-wrapper">
        <div class="left-block">
            <?php
            $view = views_get_view('view_industry');
            $view->set_display('1');
            //  print $view->preview('block_1');
            ?>
        </div>
        <div class="right-block">
            <div class=" view-popular">
                <?php
                $block = block_load('views', 'view_industry-block_2');
                $blocks = _block_render_blocks(array($block));
                $blocks_build = _block_get_renderable_array($blocks);
                //  echo drupal_render($blocks_build);
                ?>
            </div>
            <div class="industry-baner">
                <?php
                $block = block_load('views', 'view_industry-block_3');
                $blocks = _block_render_blocks(array($block));
                $blocks_build = _block_get_renderable_array($blocks);
                //  echo drupal_render($blocks_build);
                ?>

            </div>
        </div>

    </div>
</div>