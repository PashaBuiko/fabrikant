<div class="container news-page">
    <div class="left">
        <?php
        $block = block_load('views', 'economic_news-block_2');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>

        <?php
        $block = block_load('views', 'economic_news-block_5');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>
    </div>
    <div class="right">
        <div class=" view-popular">
            <?php
            $block = block_load('views', 'view_industry-block_2');
            $blocks = _block_render_blocks(array($block));
            $blocks_build = _block_get_renderable_array($blocks);
            echo drupal_render($blocks_build);
            ?>
        </div>
        <?php
        $block = block_load('views', 'economic_news-block_3');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>


        <?php
        $block = block_load('views', 'economic_news-block_4');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>
        <?php
        $block = block_load('views', 'economic_news-block_6');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>
    </div>


</div>
<div class="related-news">
<?php
$block = block_load('views', 'economic_news-block_7');
$blocks = _block_render_blocks(array($block));
$blocks_build = _block_get_renderable_array($blocks);
echo drupal_render($blocks_build);
?>

</div>