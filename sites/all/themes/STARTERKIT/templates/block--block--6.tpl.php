<div class="new-enterprise">
    <h2><?php print $block->subject; ?></h2>
    <?php
    $block = block_load('views', 'new_enterprice-block_1');
    $blocks = _block_render_blocks(array($block));
    $blocks_build = _block_get_renderable_array($blocks);
    echo drupal_render($blocks_build);
    ?>
    <div class="add-enterprice">
        <a href="/add_company" > Добавить предприятие</a>
    </div>
</div>