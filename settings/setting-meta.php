<?php include "style.php"; ?>
<div class="wrap">
    <h2 style="padding: 10px; background: #4d7592; color: #fff; border-radius: 5px;">Page Settings</h2>
    <?php if(isset( $_GET['settings-updated'])) { ?>
        <div style="margin: 10px 0" class="updated">
            <p>Settings updated successfully</p>
        </div>
    <?php } ?>
    <div class="tabs">
        <ul class="tab-links">
            <li class="active"><a href="#tab1"><div style="display: inline-block; font-size: 20px; margin-right: 5px;" class="dashicons-before dashicons-welcome-widgets-menus"></div>Homepage</a></li>
            <li><a href="#tab2"><div style="display: inline-block; font-size: 20px; margin-right: 5px;" class="dashicons-before dashicons-align-left"></div>Post</a></li>
            <li><a href="#tab3"><div style="display: inline-block; font-size: 20px; margin-right: 5px;" class="dashicons-before dashicons-media-text"></div>Page</a></li>
            <li><a href="#tab4"><div style="display: inline-block; font-size: 20px; margin-right: 5px;" class="dashicons-before dashicons-list-view"></div>Category</a></li>
            <li><a href="#tab5"><div style="display: inline-block; font-size: 20px; margin-right: 5px;" class="dashicons-before dashicons-tag"></div>Tag</a></li>
        </ul>
        <div class="tab-content">
            <!-- Homepage -->
            <div id="tab1" class="tab active">
                <form method="post" action="options.php">
                    <table class="form-table">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input style="width: 30em;" name="home_title" type="text" value="<?php echo get_option('home_title', '[sitename] - [tagline]'); ?>">
                                <br>
                                <p class="description">[sitename] [tagline]</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>
                                <textarea name="home_meta_desc" cols="120" rows="5"><?php echo get_option('home_meta_desc', '[tagline]'); ?></textarea>
                                <br>
                                <p class="description">[tagline]</p>
                            </td>
                        </tr>
                    </table>
                    <?php settings_fields( 'home-settings' ); ?>
                    <?php do_settings_sections( 'home-settings' ); ?>
                    <?php submit_button('Save Homepage Settings'); ?>
                </form>
            </div>
            <!-- Post -->
            <div id="tab2" class="tab">
                <form method="post" action="options.php">
                    <table class="form-table" id="table">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input style="width: 30em;" name="post_title" type="text" value="<?php echo get_option('post_title', '[title] - [sitename]'); ?>">
                                <br>
                                <p class="description">[title] [sitename]</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>
                                <textarea name="post_meta_desc" cols="120" rows="5"><?php echo get_option('post_meta_desc', '[words]'); ?></textarea>
                                <br>
                                <p class="description">[words]</p>
                            </td>
                        </tr>
                    </table>
                    <?php settings_fields( 'post-settings' ); ?>
                    <?php do_settings_sections( 'post-settings' ); ?>
                    <?php submit_button('Save Post Settings'); ?>
                </form>
            </div>
            <!-- Page -->
            <div id="tab3" class="tab">
                <form method="post" action="options.php">
                    <table class="form-table" id="table">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input style="width: 30em;" name="page_title" type="text" value="<?php echo get_option('page_title', '[title] - [sitename]'); ?>">
                                <br>
                                <p class="description">[title] [sitename]</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>
                                <textarea name="page_meta_desc" cols="120" rows="5"><?php echo get_option('page_meta_desc', '[words]'); ?></textarea>
                                <br>
                                <p class="description">[words]</p>
                            </td>
                        </tr>
                    </table>
                    <?php settings_fields( 'page-settings' ); ?>
                    <?php do_settings_sections( 'page-settings' ); ?>
                    <?php submit_button('Save Page Settings'); ?>
                </form>
            </div>
            <!-- Category -->
            <div id="tab4" class="tab">
                <form method="post" action="options.php">
                    <table class="form-table" id="table">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input style="width: 30em;" name="cat_title" type="text" value="<?php echo get_option('cat_title', '[catname] - [sitename]'); ?>">
                                <br>
                                <p class="description">[catname] [sitename]</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>
                                <textarea name="cat_meta_desc" cols="120" rows="5"><?php echo get_option('cat_meta_desc', '[words]'); ?></textarea>
                                <br>
                                <p class="description">[words]</p>
                            </td>
                        </tr>
                    </table>
                    <?php settings_fields( 'cat-settings' ); ?>
                    <?php do_settings_sections( 'cat-settings' ); ?>
                    <?php submit_button('Save Category Settings'); ?>
                </form>
            </div>
            <!-- Tag -->
            <div id="tab5" class="tab">
                <form method="post" action="options.php">
                    <table class="form-table" id="table">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input style="width: 30em;" name="tag_title" type="text" value="<?php echo get_option('tag_title', '[tagname] - [domain]'); ?>">
                                <br>
                                <p class="description">[tagname] [sitename]</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>
                                <textarea name="tag_meta_desc" cols="120" rows="5"><?php echo get_option('tag_meta_desc', '[words]'); ?></textarea>
                                <br>
                                <p class="description">[words]</p>
                            </td>
                        </tr>
                    </table>
                    <?php settings_fields( 'tag-settings' ); ?>
                    <?php do_settings_sections( 'tag-settings' ); ?>
                    <?php submit_button('Save Tag Settings'); ?>
                </form>
            </div>
        </div>
    </div>
</div>