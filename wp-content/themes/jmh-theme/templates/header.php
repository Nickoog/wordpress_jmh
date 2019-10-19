<header class="banner">
    <div class="container-fluid">
        <a class="brand" href="<?= esc_url(home_url('/')); ?>">
            <img src="<?= get_field('initial', 'option')['url']; ?>" alt="jean marc photographie"/>
        </a>
        <div class="desktop-menu">
            <nav class="nav-primary">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
            endif;
            ?>
            </nav>
        </div>
        <div class="burger-container">
            <div id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div class="mobil-menu">
        <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-mobil container-fluid']);
        endif;
        ?>
        </nav>
    </div>
</header>
