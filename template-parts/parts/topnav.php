<!-- Header -->
<header>
    <nav class="navbar navbar-xl navbar-dark navbar-expand-md wa-navbar">
        <div class="container-lg">
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>"<?php if ( is_home() ) { echo ' aria-current="page"'; } ?>><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo/wiryawan-adipa-logo.png" width="40px" height="40px" alt="<?php bloginfo( 'name' ); ?> Logo"><span class="fs-4 wa-brand-name">/wiryawan_adipa</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-1 mt-md-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0 me-md-2 mt-4 mt-md-0">
                    <li class="nav-item mx-md-1">
                        <a class="nav-link fs-5 wa-top-menu<?php if ( is_home() ) { echo ' menu-active" aria-current="page'; } ?>" href="<?php bloginfo('url'); ?>">home</a>
                    </li>
                    <li class="nav-item mx-md-1">
                        <a class="nav-link fs-5 wa-top-menu<?php if ( is_category( 'Blog' ) ) { echo ' menu-active" aria-current="page'; } ?>" href="<?php echo esc_url( get_category_link( get_cat_ID( 'Blog' ) ) ); ?>">blog</a>
                    </li>
                    <li class="nav-item mx-md-1">
                        <a class="nav-link fs-5 wa-top-menu<?php if ( is_page( 'About' ) ) { echo ' menu-active" aria-current="page'; } ?>" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'About' ) ) ); ?>">about</a>
                    </li>
                    <li class="nav-item mx-md-1">
                        <a class="nav-link fs-5 wa-top-menu<?php if ( is_page( 'Contact' ) ) { echo ' menu-active" aria-current="page'; } ?>" href="<?php echo esc_url( get_page_link( get_page_id_by_title( 'Contact' ) ) ); ?>">contact</a>
                    </li>
                    <li class="nav-item mx-md-1 dropdown">
                        <a class="nav-link dropdown-toggle p-3 p-md-2" href="#" role="button" data-bs-toggle="dropdown" title="Search Button" aria-expanded="false"><i class="fa-solid fa-magnifying-glass"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end wa-search">
                            <form action="<?php bloginfo('url'); ?>" role="search" method="get">
                                <input type="search" class="check" name="s" autocomplete="off" placeholder="Search here..." title="Search" aria-label="Search" required>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>