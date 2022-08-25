<div class="col-12 col-md-6 fs-5 d-flex mb-5 mb-md-0 align-content-center justify-content-center justify-content-md-end flex-wrap social">
    <?php
    $facebook = trim( get_option( 'wa_facebook' ) );
    $twitter = trim( get_option( 'wa_twitter' ) );
    $instagram = trim( get_option( 'wa_instagram' ) );
    $linkedin = trim( get_option( 'wa_linkedin' ) );
    $github = trim( get_option( 'wa_github' ) );
    $youtube = trim( get_option( 'wa_youtube' ) );
    $medium = trim( get_option( 'wa_medium' ) );

    if ( null != get_option( 'wa_facebook' ) && !empty ( $facebook ) ) {
        echo '<a rel="nofollow" class="mx-sm-1 p-1" href="https://www.facebook.com/' . get_option( 'wa_facebook' ) . '/" target="_blank"><i class="fa-brands fa-square-facebook fa-2x"></i></a>' . "\n";
    }
    if ( null != get_option( 'wa_twitter' ) && !empty ( $twitter ) ) {
        echo '<a rel="nofollow" class="mx-sm-1 p-1" href="https://twitter.com/' . get_option( 'wa_twitter' ) . '" target="_blank"><i class="fa-brands fa-square-twitter fa-2x"></i></a>' . "\n";
    }
    if ( null != get_option( 'wa_instagram' ) && !empty ( $instagram ) ) {
        echo '<a rel="nofollow" class="mx-sm-1 p-1" href="https://www.instagram.com/' . get_option( 'wa_instagram' ) . '/" target="_blank"><i class="fa-brands fa-square-instagram fa-2x"></i></a>' . "\n";
    }
    if ( null != get_option( 'wa_linkedin' ) && !empty ( $linkedin ) ) {
        echo '<a rel="nofollow" class="mx-sm-1 p-1" href="https://www.linkedin.com/in/' . get_option( 'wa_linkedin' ) . '/" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>' . "\n";
    }
    if ( null != get_option( 'wa_github' ) && !empty ( $github ) ) {
        echo '<a rel="nofollow" class="mx-sm-1 p-1" href="https://github.com/' . get_option( 'wa_github' ) . '" target="_blank"><i class="fa-brands fa-square-github fa-2x"></i></a>' . "\n";
    }
    if ( null != get_option( 'wa_youtube' ) && !empty ( $youtube ) ) {
        echo '<a rel="nofollow" class="mx-sm-1 p-1" href="https://www.youtube.com/channel/' . get_option( 'wa_youtube' ) . '" target="_blank"><i class="fa-brands fa-youtube fa-2x"></i></a>' . "\n";
    }
    if ( null != get_option( 'wa_medium' ) && !empty ( $medium ) ) {
        echo '<a rel="nofollow" class="mx-sm-1 p-1" href="https://medium.com/@' . get_option( 'wa_medium' ) . '" target="_blank"><i class="fa-brands fa-medium fa-2x"></i></a>' . "\n";
    }
    ?>
</div>
