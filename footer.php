
        <footer>
            <div class="row">
                <div class="col-lg-6">
                    <p>&copy; Explore,taste, and enjoy spirits from around good times</p>
                </div>
                <div class="col-lg-6">
                    <div class="social-menus">
                        <a href="#"><i class="icon-style fas fa-arrow-up"></i></a>
                        <?php
                        $socials = array(
                            'facebook'  => 'fab fa-facebook-f',
                            'youtube'   => 'fab fa-youtube',
                            'twitter'   => 'fab fa-twitter',
                            'instagram' => 'fab fa-instagram',
                        );
                        foreach ( $socials as $key => $default_icon ) {
                            $url  = get_theme_mod( "restaurant_{$key}_link" );
                            $icon = get_theme_mod( "restaurant_{$key}_icon", $default_icon );
                            if ( $icon ) {
                                $href = $url ? esc_url( $url ) : '#';
                                echo '<a href="' . $href . '" target="_blank"><i class="icon-style ' . esc_attr( $icon ) . '"></i></a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </footer>
        
    </div>
    <script>
        const navToggle = document.querySelector('.nav-toggle');
        const navMenu = document.querySelector('.nav-menu');
        const navLinks = document.querySelectorAll('.nav-link');

        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
            });
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>