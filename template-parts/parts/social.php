<div class="col-12 col-md-6 fs-5 d-flex mb-5 mb-md-0 align-content-center justify-content-center justify-content-md-end flex-wrap social">
    <?php
    $facebook = trim( get_option( 'wa_facebook' ) );
    $twitter = trim( get_option( 'wa_twitter' ) );
    $instagram = trim( get_option( 'wa_instagram' ) );
    $linkedin = trim( get_option( 'wa_linkedin' ) );
    $github = trim( get_option( 'wa_github' ) );
    $youtube = trim( get_option( 'wa_youtube' ) );
    $medium = trim( get_option( 'wa_medium' ) );
    
    echo '<a rel="nofollow" title="' . get_bloginfo( 'name' ) . ' Facebook" class="mx-sm-1 p-1" href="https://www.facebook.com/' . get_option( 'wa_facebook', 'wiryawanadipa' ) . '/" target="_blank"><i class="fa-brands fa-square-facebook fa-2x"></i></a>' . "\n";
    echo '<a rel="nofollow" title="' . get_bloginfo( 'name' ) . ' Twitter" class="mx-sm-1 p-1" href="https://twitter.com/' . get_option( 'wa_twitter', 'wiryawanadipa' ) . '" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>' . "\n";
    echo '<a rel="nofollow" title="' . get_bloginfo( 'name' ) . ' Instagram" class="mx-sm-1 p-1" href="https://www.instagram.com/' . get_option( 'wa_instagram', 'wiryawanadipa' ) . '/" target="_blank"><i class="fa-brands fa-square-instagram fa-2x"></i></a>' . "\n";
    echo '<a rel="nofollow" title="' . get_bloginfo( 'name' ) . ' LinkedIn" class="mx-sm-1 p-1" href="https://www.linkedin.com/in/' . get_option( 'wa_linkedin', 'wiryawanadipa' ) . '/" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>' . "\n";
    echo '<a rel="nofollow" title="' . get_bloginfo( 'name' ) . ' GitHub" class="mx-sm-1 p-1" href="https://github.com/' . get_option( 'wa_github', 'wiryawanadipa' ) . '" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>' . "\n";
    echo '<a rel="nofollow" title="' . get_bloginfo( 'name' ) . ' Youtube Channel" class="mx-sm-1 p-1" href="https://www.youtube.com/channel/' . get_option( 'wa_youtube', 'UCpP1g9Vcl33ucu5mO2vr-5Q' ) . '" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></a>' . "\n";
    echo '<a rel="nofollow" title="' . get_bloginfo( 'name' ) . ' Medium" class="mx-sm-1 p-1" href="https://medium.com/@' . get_option( 'wa_medium', 'wiryawanadipa' ) . '" target="_blank"><i class="fa-brands fa-medium fa-2x"></i></a>' . "\n";
    ?>
</div>