<footer>

    <div class="content">
        <div class="copyright">
        <?php print $content;?>
        </div>
        <div class="footer-menu">
            <?php
            print theme('links', array('links' => menu_navigation_links('menu-footer-menu'),
                'attributes' => array('class'=> array('links', 'menu-footer-menu')) ));
            ?>

        </div>
    </div>

</footer>