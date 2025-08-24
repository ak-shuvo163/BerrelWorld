
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="container">
        <!--heading starts here-->
        <header>
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo-div">
                        <a href="#">
                            <i class="logo fas fa-utensils fa-3x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav>
                        <button class="nav-toggle" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="nav-menu">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'container'      => false,
                                'items_wrap'     => '%3$s',
                            ) );
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!--heading ends here-->