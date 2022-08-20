<aside class="col-xl-3 d-none d-xl-block ps-xl-3 pe-xl-4">
    <div class="mb-3 text-center">
        <div class="p-2 rounded-top text-white bg-info">Categories</div>
        <ul class="border-start border-end bg-light bg-gradient list-unstyled sidebar-list">
            <?php
                $categories = get_categories();
                foreach($categories as $category) {
                    echo '<li class="p-2 border-bottom position-relative"><a class="py-2 stretched-link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                }
            ?>
        </ul>
    </div>
</aside>