<div class="new-enterprise">
    <h2><?php print $block->subject; ?></h2>

    <?php

    $block = block_load('views', 'new_enterprice-block_1');
    $blocks = _block_render_blocks(array($block));
    $blocks_build = _block_get_renderable_array($blocks);
    echo drupal_render($blocks_build);

    ?>
    <div class="add-enterprice">
        <a href="/my_custom_url" > Добавить предприятие</a>
    </div>

</div>