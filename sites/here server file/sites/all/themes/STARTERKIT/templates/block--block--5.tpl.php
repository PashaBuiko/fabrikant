<div class="season-goods">
    <h2><?php print $block->subject; ?></h2>
    <div class="date-block">


        <?php
        $month = intval(date('m'));                 /// display calendar filter
        $year = intval(date('Y'));
        for ($j = 2017; $j <= 2018; $j++) {
            for ($i = 1; $i <= 12; $i++) { ?>
                <div class="date "  data="<?php echo ($i < 10) ? '0' . $i . '/' . $j : $i . '/' . $j; ?>">  <?php echo switch_slide_month($i, 2) . ' ' . $year ?></div>
            <?
            }
        }

        ?>
    </div>
    <div class="clearfix"></div>

    <div>
        <?php

        $block = block_load('views', 'season_goods-block_1');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);

        ?>
    </div>
</div>