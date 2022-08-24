<?php include 'style.php'; ?>
<div class="wrap">
    <h2 style="padding: 10px; background: #4d7592; color: #fff; border-radius: 5px;">About</h2>
    <div class="tabs">
        <ul class="tab-links">
            <li class="active"><a href="#tab1">Notes</a></li>
            <li><a href="#tab2">Changelog</a></li>
            <li><a href="#tab3">About</a></li>
        </ul>
        <div class="tab-content">
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
                        <label>v1.0.0 (1 September 2022)</label>
                    </th>
                    <td>
                        <p>- Initial release</p>
                    </td>
                </tr>
                </table>
            </div>
            <div id="tab3" class="tab">
                <center style="margin:20px auto;"><img style="border-radius:3px;" src="<?php bloginfo('stylesheet_directory'); ?>/assets/wiryawan-adipa-logo-big.png"></center>
                <center style="font-size:24px; margin:14px auto;"><b><a href="https://github.com/wiryawanadipa/adipa" target="_blank">Wiryawan Adipa Wordpress Theme 1.0.0</b></a></center>
                <center style="font-size:14px; margin:10px auto;">by</center>
                <center style="font-size:14px; margin-bottom:10px;"><a href="https://wiryawanadipa.com" target="_blank">Wiryawan Adipa</a></center>
            </div>
        </div>
    </div>
</div>