
<?php get_header(); ?>
<main>
    <!--banner section starts here-->
    <section id="banner-section"
        style="
            <?php
            $banner_bg = get_theme_mod('restaurant_banner_bg');
            $banner_bg_color = get_theme_mod('restaurant_banner_bg_color', '#ffffff');
            if ($banner_bg) {
                echo 'background-image:url(' . esc_url($banner_bg) . ');background-size:cover;background-position:center;';
            } else {
                echo 'background-color:' . esc_attr($banner_bg_color) . ';';
            }
            ?>
        ">
        <div class="banner-contents">
            <h1><?php echo esc_html(get_theme_mod('restaurant_banner_title', 'Where the World Comes to Sip')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('restaurant_banner_subtitle', '20% discount for take away')); ?></p>
            <button class="btn">
                <?php echo esc_html(get_theme_mod('restaurant_banner_button', 'Order Now')); ?>
            </button>
        </div>
    </section>
    <!--banner section ends here-->

    <!--about section starts-->
    <section id="about-us">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-us-content">
                    <h3><?php echo esc_html(get_theme_mod('restaurant_about_title', 'About Us')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('restaurant_about_desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ab, tempora, sunt, dolor rem ullam corporis odit debitis nisi distinctio soluta laudantium! Laudantium, possimus quo. Possimus repellat excepturi voluptates molestiae architecto et fuga earum maiores quidem delectus beatae, repudiandae facilis! Ea, veniam illo? Amet ipsum dolor iure architecto, unde obcaecati maiores numquam in illo libero!')); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!--about section ends-->

    <!--food menu starts-->
    <section id="menu-section">
        <div class="row">
            <?php
            $food_menu = get_theme_mod('restaurant_food_menu');
            if ( ! empty( $food_menu ) ) :
                foreach ( $food_menu as $item ) :
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo esc_url( $item['food_img'] ); ?>" alt="">
                    </div>
                    <div class="card-desc">
                        <h3 class="item-name"><?php echo esc_html( $item['food_title'] ); ?></h3>
                        <p><?php echo esc_html( $item['food_desc'] ); ?></p>
                        <p>Price: <?php echo esc_html( $item['food_price'] ); ?></p>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </section>
    <!--food menu ends-->

    <!--contact section starts-->
    <div id="contact">
        <div class="row">
            <div class="col-lg-8">
                <iframe class="map"
                    src="<?php echo esc_url(get_theme_mod('restaurant_contact_map', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7298.960161236021!2d90.37016089999997!3d23.837080450000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c14a3366b005%3A0x901b07016468944c!2sMirpur%20DOHS%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1745491041100!5m2!1sen!2sbd')); ?>"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4">
                <div class="contact-details">
                    <h3><?php echo esc_html(get_theme_mod('restaurant_contact_title', 'Contact Details')); ?></h3>
                    <div><br><br>
                        <h5><?php echo esc_html(get_theme_mod('restaurant_contact_business', 'BarrelWorld')); ?></h5>
                        <address>
                            <?php echo esc_html(get_theme_mod('restaurant_contact_address', 'Your Address')); ?>
                        </address><br>
                    </div>
                    <div>
                        <h5>Phone:</h5>
                        <p><?php echo esc_html(get_theme_mod('restaurant_contact_phone', '+880123456789')); ?></p>
                    </div><br>
                    <div>
                        <h5>Opening Hours:</h5>
                        <p>
                            <?php echo esc_html(get_theme_mod('restaurant_contact_hours', 'Thus-Wed: 9px to 3am')); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact ends here-->
</main>
<?php get_footer(); ?>