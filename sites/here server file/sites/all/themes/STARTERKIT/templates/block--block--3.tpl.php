<div class="person-block">
    <h2>Персоны</h2>
    <div class="wrapper">
        <div class="left-block">
            <div class="item">
                <div class="image"></div>
                <div class="text">
                    <p class="title">Валентина Филатова                    </p>
                    <p>“Самонаблюдение иллюстрирует закон. Фрустрация
                        понимает методологический гомеостаз. Инсайт
                        притягивает социальный гомеостаз, тем не менее как
                        только ортодоксальность окончательно возобладает
                        даже эта маленькая лазейка будет закрыта”
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="image"></div>
                <div class="text">
                    <p class="title">Александр Новицкий</p>
                    <p>“Сновидение дает бихевиоризм. Самоактуализация,
                        несмотря на внешние воздействия, отталкивает тест.
                        Коллективное бессознательное притягивает
                        гендерный код, хотя этот факт нуждается в
                        дальнейшей проверке наблюдением”
                    </p>

                </div>
            </div>
        </div>
        <div class="right-block">
            <?php
            $block = block_load('views', 'company_news-block_1');
            $blocks = _block_render_blocks(array($block));
            $blocks_build = _block_get_renderable_array($blocks);
            echo drupal_render($blocks_build);
            ?>
        </div>

    </div>
    <div class="baner-2">
        <?php
        $block = block_load('views', 'company_news-block_2');
        $blocks = _block_render_blocks(array($block));
        $blocks_build = _block_get_renderable_array($blocks);
        echo drupal_render($blocks_build);
        ?>

    </div>
</div>