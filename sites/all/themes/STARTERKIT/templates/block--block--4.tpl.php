<div class="exhibition">
    <h2><?php print $block->subject; ?></h2>
    <div class="exhibition-list">
        <?php
        $block = block_load('views', 'exhibition-block_1');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>
    </div>
    <div class="baner">
        <?php
        $block = block_load('views', 'exhibition-block_2');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>
    </div>
</div>
