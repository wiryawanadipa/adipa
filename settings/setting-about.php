<div class="wrap custom-theme-section">
    <h1>About</h1>
    <div class="tabs">
        <ul class="tab-links">
            <li class="active"><a href="#tab1"><div class="wa-custom-tab-icon"><i class="fa-solid fa-note-sticky"></i></div>Notes</a></li>
            <li><a href="#tab2"><div class="wa-custom-tab-icon"><i class="fa-solid fa-list-ul"></i></div>Changelog</a></li>
            <li><a href="#tab3"><div class="wa-custom-tab-icon"><i class="fa-solid fa-address-book"></i></div>About</a></li>
        </ul>
        <div class="custom-theme-container">
            <div id="tab1" class="tab active">
                <table class="form-table">
                    <tr>
                        <th>
                            <label>Notes</label>
                        </th>
                        <td>
                            <p>This Wordpress theme has built-in function to disable auto generate image function from wordpress every time you upload an image (thumbnail, medium, medium large, large, 1536x1536 and 2048x2048). This feature is on by default.</p>
                            <p>So, if you want to re-enable auto generate image function you need to remove this lines from <code>function.php</code> file</p>
                            <br>
                            <code>function disable_media($sizes) {</code><br>
                            &emsp;<code>    unset($sizes['thumbnail']);</code><br>
                            &emsp;<code>    unset($sizes['medium']);</code><br>
                            &emsp;<code>    unset($sizes['medium_large']);</code><br>
                            &emsp;<code>    unset($sizes['large']);</code><br>
                            &emsp;<code>    unset( $sizes['1536x1536'] );</code><br>
                            &emsp;<code>    unset( $sizes['2048x2048'] );</code><br>
                            &emsp;<code>    return $sizes;</code><br>
                            <code>}</code><br>
                            <code>add_filter('intermediate_image_sizes_advanced', 'disable_media');</code><br>
                            <code>add_filter( 'big_image_size_threshold', '__return_false' );</code><br>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="tab2" class="tab">
                <table class="form-table">
                <tr>
                    <th>
                        <label>v1.0.6 (6 September 2022)</label>
                    </th>
                    <td>
                        <p>- Add custom ::selection style</p>
                        <p>- Change copy icon from Highlighting Code Block plugin</p>
                        <p>- Change input and textarea outline color</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>v1.0.5 (5 September 2022)</label>
                    </th>
                    <td>
                        <p>- Add breadcrumbs on post</p>
                        <p>- Add sitelink search box</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>v1.0.4 (4 September 2022)</label>
                    </th>
                    <td>
                        <p>- Update Font Awesome from 6.1.2 to 6.2.0</p>
                        <p>- Add attachment.php</p>
                        <p>- Add redirection 301 pagination on homepage</p>
                        <p>- Add link rel="cannonical" on homepage, post and page</p>
                        <p>- Add about page template</p>
                        <p>- Add search form on 404 page and not found search result</p>
                        <p>- Change stop guessing 404 function with strict redirect guessing</p>
                        <p>- Change logo, design gallery and project images structure</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>v1.0.3 (4 September 2022)</label>
                    </th>
                    <td>
                        <p>- Add condition if contact form failed to send the message</p>
                        <p>- Add .tld count for email in contact page from 4 to 6</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>v1.0.2 (3 September 2022)</label>
                    </th>
                    <td>
                        <p>- Add page link calling function</p>
                        <p>- Change how category link called</p>
                        <p>- Auto create Blog, Design Gallery and Project category upon theme activation</p>
                        <p>- Fix reCAPTCHA validation in contact page</p>
                        <p>- Remove reCAPTCHA API key and now using two key (site key and secret key)</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>v1.0.1 (2 September 2022)</label>
                    </th>
                    <td>
                        <p>- Fix logo on login page not showing</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>v1.0.0 (2 September 2022)</label>
                    </th>
                    <td>
                        <p>- Initial release</p>
                    </td>
                </tr>
                </table>
            </div>
            <div id="tab3" class="tab">
                <div class="wa-theme-logo"><img style="border-radius:3px;" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo/wiryawan-adipa-logo-big.png"></div>
                <div class="theme-github-link">
                    <a href="https://github.com/wiryawanadipa/adipa" target="_blank">Wiryawan Adipa Wordpress v<?php $theme_version = wp_get_theme(); echo $theme_version->Version; ?></a>
                </div>
                <div class="wa-theme-social">
                    <a href="https://wiryawanadipa.com" target="_blank"><i class="fa-solid fa-globe fa-2x"></i></i></a>
                    <a href="https://www.facebook.com/wiryawanadipa/" target="_blank"><i class="fa-brands fa-square-facebook fa-2x"></i></a>
                    <a href="https://twitter.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>
                    <a href="https://www.instagram.com/wiryawanadipa/" target="_blank"><i class="fa-brands fa-square-instagram fa-2x"></i></a>
                    <a href="https://www.linkedin.com/in/wiryawanadipa/" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>
                    <a href="https://github.com/wiryawanadipa" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>