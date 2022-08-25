<!-- Header -->
<header>
    <nav class="navbar navbar-xl navbar-dark navbar-expand-sm wa-navbar">
        <div class="container-lg">
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/wiryawan-adipa-logo.png" alt="Wiryawan Adipa Logo"><span>Wiryawan Adipa</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-1 mt-sm-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-sm-0 me-sm-2 mt-3 mt-sm-0">
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link py-3 py-sm-2 px-3 px-sm-2" href="<?php bloginfo('url'); ?>">Home</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link py-3 py-sm-2 px-3 px-sm-2" href="<?php bloginfo('url'); ?>">Blog</a>
                    </li>
                    <li class="nav-item mx-lg-2 dropdown">
                        <a class="nav-link dropdown-toggle py-3 py-sm-2 px-3 px-sm-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                        </a>
                        <ul class="dropdown-menu">
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </li>
                    <li class="nav-item mx-lg-2 dropdown">
                        <a class="nav-link dropdown-toggle py-3 py-sm-2 px-3 px-sm-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Page
                        </a>
                        <ul class="dropdown-menu">
                            <?php wp_list_pages('&title_li='); ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
