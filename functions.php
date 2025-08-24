<?php
function restaurant_theme_setup() {
    // Add support for various WordPress features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'menus' );
    add_theme_support('backgrounds');

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'restaurant' ),
        'footer'  => __( 'Footer Menu', 'restaurant' ),
    ) );

}
add_action( 'after_setup_theme', 'restaurant_theme_setup' );

function restaurant_enqueue_scripts() {
    // Enqueue styles and scripts
    wp_enqueue_style( 'restaurant-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'restaurant_enqueue_scripts' );

function restaurant_customize_register( $wp_customize ) {
    // --- Social Section ---
    $wp_customize->add_section('restaurant_social_section', array(
        'title'    => __('Social Links', 'restaurant'),
        'priority' => 40,
    ));
    $socials = array(
        'facebook'  => array('label' => 'Facebook',  'icon' => 'fab fa-facebook-f'),
        'youtube'   => array('label' => 'YouTube',   'icon' => 'fab fa-youtube'),
        'twitter'   => array('label' => 'Twitter',   'icon' => 'fab fa-twitter'),
        'instagram' => array('label' => 'Instagram', 'icon' => 'fab fa-instagram'),
    );
    foreach ( $socials as $key => $data ) {
        // URL field
        $wp_customize->add_setting( "restaurant_{$key}_link", array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "restaurant_{$key}_link", array(
            'label'   => $data['label'] . ' URL',
            'section' => 'restaurant_social_section',
            'type'    => 'url',
        ) );
        // Icon dropdown
        $wp_customize->add_setting( "restaurant_{$key}_icon", array(
            'default'   => $data['icon'],
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "restaurant_{$key}_icon", array(
            'label'   => $data['label'] . ' Icon',
            'section' => 'restaurant_social_section',
            'type'    => 'select',
            'choices' => array(
                'fab fa-facebook-f' => 'Facebook',
                'fab fa-youtube'    => 'YouTube',
                'fab fa-twitter'    => 'Twitter',
                'fab fa-instagram'  => 'Instagram',
                'fab fa-linkedin-in'=> 'LinkedIn',
                'fab fa-github'     => 'GitHub',
                'fas fa-link'       => 'Link',
                ''                  => 'None (Remove Icon)',
            ),
        ) );
    }
}
add_action( 'customize_register', 'restaurant_customize_register' );

// --- Banner Section ---
function restaurant_customize_banner_section( $wp_customize ) {
    $wp_customize->add_section('restaurant_banner_section', array(
        'title'    => __('Banner Section', 'restaurant'),
        'priority' => 10,
    ));

    // Banner Title
    $wp_customize->add_setting('restaurant_banner_title', array(
        'default'   => 'Where the World Comes to Sip',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_banner_title', array(
        'label'   => 'Banner Title',
        'section' => 'restaurant_banner_section',
        'type'    => 'text',
    ));

    // Banner Subtitle
    $wp_customize->add_setting('restaurant_banner_subtitle', array(
        'default'   => '20% discount for take away',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_banner_subtitle', array(
        'label'   => 'Banner Subtitle',
        'section' => 'restaurant_banner_section',
        'type'    => 'text',
    ));

    // Banner Button Text
    $wp_customize->add_setting('restaurant_banner_button', array(
        'default'   => 'Order Now',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_banner_button', array(
        'label'   => 'Banner Button Text',
        'section' => 'restaurant_banner_section',
        'type'    => 'text',
    ));

    // Banner Background Image
    $wp_customize->add_setting('restaurant_banner_bg', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'restaurant_banner_bg', array(
        'label'    => 'Banner Background Image',
        'section'  => 'restaurant_banner_section',
        'settings' => 'restaurant_banner_bg',
    )));

    // Banner Background Color
    $wp_customize->add_setting('restaurant_banner_bg_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'restaurant_banner_bg_color', array(
        'label'    => 'Banner Background Color',
        'section'  => 'restaurant_banner_section',
        'settings' => 'restaurant_banner_bg_color',
    )));
}
add_action('customize_register', 'restaurant_customize_banner_section');

// --- About Section ---
function restaurant_customize_about_section( $wp_customize ) {
    $wp_customize->add_section('restaurant_about_section', array(
        'title'    => __('About Section', 'restaurant'),
        'priority' => 20,
    ));

    // About Us Title
    $wp_customize->add_setting('restaurant_about_title', array(
        'default'   => 'About Us',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_about_title', array(
        'label'   => 'About Section Title',
        'section' => 'restaurant_about_section',
        'type'    => 'text',
    ));

    // About Us Description
    $wp_customize->add_setting('restaurant_about_desc', array(
        'default'   => 'Your about text...',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_about_desc', array(
        'label'   => 'About Section Description',
        'section' => 'restaurant_about_section',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'restaurant_customize_about_section');

// --- Contact Section ---
function restaurant_customize_contact_section( $wp_customize ) {
    $wp_customize->add_section('restaurant_contact_section', array(
        'title'    => __('Contact Section', 'restaurant'),
        'priority' => 30,
    ));

    // Contact Title
    $wp_customize->add_setting('restaurant_contact_title', array(
        'default'   => 'Contact Details',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_contact_title', array(
        'label'   => 'Contact Section Title',
        'section' => 'restaurant_contact_section',
        'type'    => 'text',
    ));

    // Business Name
    $wp_customize->add_setting('restaurant_contact_business', array(
        'default'   => 'BarrelWorld',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_contact_business', array(
        'label'   => 'Business Name',
        'section' => 'restaurant_contact_section',
        'type'    => 'text',
    ));

    // Address
    $wp_customize->add_setting('restaurant_contact_address', array(
        'default'   => 'Your Address',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_contact_address', array(
        'label'   => 'Address',
        'section' => 'restaurant_contact_section',
        'type'    => 'textarea',
    ));

    // Phone
    $wp_customize->add_setting('restaurant_contact_phone', array(
        'default'   => '+880123456789',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_contact_phone', array(
        'label'   => 'Phone',
        'section' => 'restaurant_contact_section',
        'type'    => 'text',
    ));

    // Opening Hours
    $wp_customize->add_setting('restaurant_contact_hours', array(
        'default'   => 'Thus-Wed: 9px to 3am',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_contact_hours', array(
        'label'   => 'Opening Hours',
        'section' => 'restaurant_contact_section',
        'type'    => 'text',
    ));

    // Google Map Embed URL
    $wp_customize->add_setting('restaurant_contact_map', array(
        'default'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7298.960161236021!2d90.37016089999997!3d23.837080450000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c14a3366b005%3A0x901b07016468944c!2sMirpur%20DOHS%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1745491041100!5m2!1sen!2sbd',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('restaurant_contact_map', array(
        'label'   => 'Google Map Embed URL',
        'section' => 'restaurant_contact_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'restaurant_customize_contact_section');

function restaurant_register_food_menu_cpt() {
    register_post_type('food_menu', array(
        'labels' => array(
            'name' => __('Food Menu'),
            'singular_name' => __('Food Item')
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-carrot',
    ));
}
add_action('init', 'restaurant_register_food_menu_cpt');

function restaurant_insert_default_food_items() {
    // Only run if no food_menu posts exist
    if ( !get_posts( array('post_type'=>'food_menu', 'posts_per_page'=>1) ) ) {
        $defaults = array(
            array(
                'title'   => 'Whisky',
                'content' => 'Item No: 101<br>Rating: 4/5<br>Price: 2502 $.',
                'image'   => get_template_directory_uri() . '/images/sangria-senorial-7o-7Nnr7Xvo-unsplash.jpg',
            ),
            array(
                'title'   => 'Vodka',
                'content' => 'Item No: 102<br>Rating: 4.5/5<br>Price: 2621 $.',
                'image'   => get_template_directory_uri() . '/images/ourwhisky-foundation-xz6aXA7EbBY-unsplash.jpg',
            ),
            array(
                'title'   => 'Wine',
                'content' => 'Item No: 103<br>Rating: 4/5<br>Price: 5575 $.',
                'image'   => get_template_directory_uri() . '/images/yesmore-content-5h5ZrVolToE-unsplash.jpg',
            ),
            array(
                'title'   => 'Anae',
                'content' => 'Item No: 104<br>Rating: 4/5<br>Price: 5782 $.',
                'image'   => get_template_directory_uri() . '/images/timothe-durand-_l7RSpkzK5Y-unsplash.jpg',
            ),
        );
        foreach ( $defaults as $item ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $item['title'],
                'post_content' => $item['content'],
                'post_type'    => 'food_menu',
                'post_status'  => 'publish',
            ) );
            // Set featured image if possible
            if ( $post_id && !is_wp_error($post_id) ) {
                // Download image and set as featured image
                $image_url = $item['image'];
                $image_id = restaurant_attach_image_from_url( $image_url, $post_id );
                if ( $image_id ) {
                    set_post_thumbnail( $post_id, $image_id );
                }
            }
        }
    }
}
add_action('after_setup_theme', 'restaurant_insert_default_food_items');

function restaurant_attach_image_from_url( $image_url, $post_id ) {
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $tmp = download_url( $image_url );
    if ( is_wp_error( $tmp ) ) return false;
    $file_array = array(
        'name'     => basename( $image_url ),
        'tmp_name' => $tmp
    );
    $id = media_handle_sideload( $file_array, $post_id );
    if ( is_wp_error( $id ) ) {
        @unlink( $file_array['tmp_name'] );
        return false;
    }
    return $id;
}

if ( class_exists( 'Kirki' ) ) {
    Kirki::add_config( 'restaurant_theme_config', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );

    Kirki::add_section( 'restaurant_food_section', array(
        'title'    => esc_html__( 'Food Menu Section', 'restaurant' ),
        'priority' => 25,
    ) );

    Kirki::add_field( 'restaurant_theme_config', [
        'type'        => 'repeater',
        'settings'    => 'restaurant_food_menu',
        'label'       => esc_html__( 'Food Menu Items', 'restaurant' ),
        'section'     => 'restaurant_food_section',
        'priority'    => 10,
        'default'     => [
            [
                'food_img'   => get_template_directory_uri() . '/images/food1.jpg',
                'food_title' => 'Whisky',
                'food_desc'  => 'Item No: 101 | Rating: 4/5',
                'food_price' => '2502 $',
            ],
            [
                'food_img'   => get_template_directory_uri() . '/images/food2.jpg',
                'food_title' => 'Vodka',
                'food_desc'  => 'Item No: 102 | Rating: 4.5/5',
                'food_price' => '2621 $',
            ],
            [
                'food_img'   => get_template_directory_uri() . '/images/food3.jpg',
                'food_title' => 'Wine',
                'food_desc'  => 'Item No: 103 | Rating: 4/5',
                'food_price' => '5575 $',
            ],
            [
                'food_img'   => get_template_directory_uri() . '/images/food4.jpg',
                'food_title' => 'Anae',
                'food_desc'  => 'Item No: 104 | Rating: 4/5',
                'food_price' => '5782 $',
            ],
        ],
        'fields' => [
            'food_img' => [
                'type'        => 'image',
                'label'       => esc_html__( 'Food Image', 'restaurant' ),
                'default'     => '',
            ],
            'food_title' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Food Title', 'restaurant' ),
                'default'     => '',
            ],
            'food_desc' => [
                'type'        => 'textarea',
                'label'       => esc_html__( 'Description', 'restaurant' ),
                'default'     => '',
            ],
            'food_price' => [
                'type'        => 'text',
                'label'       => esc_html__( 'Price', 'restaurant' ),
                'default'     => '',
            ],
        ],
    ] );
}
