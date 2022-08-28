<!-- Header -->
<header>
    <nav class="navbar navbar-xl navbar-dark navbar-expand-md wa-navbar">
        <div class="container-lg">
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/wiryawan-adipa-logo.png" alt="Wiryawan Adipa Logo"><span>Wiryawan Adipa</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-1 mt-md-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0 me-md-2 mt-3 mt-md-0">
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link py-3 py-sm-2 px-2" href="<?php bloginfo('url'); ?>">
                            <i class="fa-solid fa-house"></i>Home
                        </a>
                    </li>
                    <li class="nav-item mx-lg-1 dropdown">
                        <a class="nav-link dropdown-toggle py-3 py-sm-2 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-tag"></i>Category
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </li>
                    <li class="nav-item mx-lg-1 dropdown">
                        <a class="nav-link dropdown-toggle py-3 py-sm-2 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-file"></i>Page
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php wp_list_pages('&title_li='); ?>
                        </ul>
                    </li>
                    <li class="nav-item mx-lg-1 dropdown">
                        <a class="nav-link dropdown-toggle py-3 py-sm-2 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-magnifying-glass"></i>Search
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <form action="<?php bloginfo('url'); ?>" role="search" method="get">
                                <input type="search" name="s" autocomplete="off" placeholder="Search here..." title="Search" required>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
