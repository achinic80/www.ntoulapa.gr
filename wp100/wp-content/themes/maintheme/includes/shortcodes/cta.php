<?php
function promo_callback( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'title'          => '',
			'subtitle'          => '',
			'table_label_1'          => 'Ελάχιστη κατάθεση',
			'table_label_2'          => 'Μέγιστο μπόνους',
			'table_label_3'          => 'Δωρεάν Περιστροφές',
			'table_text_1'          => '€20',
			'table_text_2'          => '€100',
			'table_text_3'          => '100',
			'btn_title'      => '',
			'btn_url'        => '',
			'img_left'       => '',
			'img_background' => '',
			'color' => 'rgb(194, 80, 1)',
			'color_background' => 'linear-gradient(rgba(194, 80, 1, 0), rgb(194, 80, 1) 170px)',
		), $atts, 'promo' );

	$title          = $atts['title'] ?: 'Μπόνους πρώτης κατάθεσης';
	$subtitle          = $atts['subtitle'] ?: '100% ΜΕΧΡΙ 100€ + 100 ΔΩΡΕΑΝ ΠΕΡΙΣΤΡΟΦΕΣ';
	$btn_title      = $atts['btn_title'] ?: 'Εγγραφή';
	$btn_url        = $atts['btn_url'] ?: $GLOBALS['aff_link'];
	$img_left       = $atts['img_left'] ?: get_stylesheet_directory_uri() . '/assets/images/extra_images/1640161509_1st_promo.webp';
	$img_background = $atts['img_background'] ?: get_stylesheet_directory_uri() . '/assets/images/extra_images/1640175724_1st_back.webp';

	ob_start();

	?>

    <div class="promo-banner">
        <div class="bg-layer promo-banner__border">
            <svg class="svg-bg" preserveAspectRatio="none" viewBox="0 -1.5 262 390" xmlns="http://www.w3.org/2000/svg">
                <path d="M 9.97 0.76 L 252.02 19.23 C 257.01 19.61 261.88 24.99 261.77 29.99 L 254.22 359 C 254.11 364 249.01 369.36 244.02 369.72 L 14.97 386.27 C 9.98 386.63 4.93 382 4.87 377 L 0.12 9.99 C 0.06 4.99 4.98 0.38 9.97 0.76  Z"
                      class="svg-bg__path" stroke="#C25001"></path>
            </svg>
        </div>
        <a href="<?php echo $btn_url; ?>" class="promo-banner__content"
           data-test="promotionsListContainer">
            <div class="promo-banner__content-shadow"
                 style="background: <?= $atts['color_background'] ?>;"></div>
            <div class="promo-banner__image"><img
                        src="<?= $img_left ?>"
                        alt="Μπόνους πρώτης κατάθεσης" class="tournament-banner__bg-image" loading="lazy"
                        decoding="async" draggable="false" data-test=""></div>
            <div class="promo-banner__bg" data-test=""
                 style="box-shadow: rgba(194, 80, 1, 0.298) 0px 0px 25px 0px; background-image: url(<?= $img_background ?>);"></div>
            <div class="promo-banner__content-inner">
                <div class="promo-banner__title" data-test="promoTile"><?= $title ?></div>
                <div class="promo-block">
                    <div class="promo-block__main"><span
                                class="text-active"><?= $subtitle ?></span></div>
                    <div class="promo-block__secondary"></div>
                    <div class="promo-block__info" style="color: <?= $atts['color'] ?>;">
                        <div class="promo-block__info-list">
                            <div class="promo-block__info-line"><span><?= $atts['table_label_1'] ?></span> <span><?= $atts['table_text_1'] ?></span></div>
                            <div class="promo-block__info-line"><span><?= $atts['table_label_2'] ?></span> <span><?= $atts['table_text_2'] ?></span></div>
                            <div class="promo-block__info-line"><span><?= $atts['table_label_3'] ?></span> <span><?= $atts['table_text_3'] ?></span></div>
                        </div>
                    </div>
                    <div class="promo-block__buttons">
                        <a href="<?php echo $GLOBALS['aff_link']; ?>" type="button"
                                class="app-button app-button--default app-button--secondary app-button--full  ">
                            <div class="" data-test=""><span class="svg-bg-container">
                                    <svg class="svg-bg" preserveAspectRatio="none" viewBox="0 -1.5 1200 379"
                                         xmlns="http://www.w3.org/2000/svg"><path
                                                d="M 9.99 21.81 L 1190 0.18 C 1195 0.09 1199.78 4.99 1199.57 9.99 L 1184.42 366 C 1184.21 371 1179 375.78 1174 375.56 L 36.99 326.43 C 31.99 326.21 26.55 321.01 26.11 316.03 L 0.88 31.96 C 0.44 26.98 4.99 21.9 9.99 21.81  Z"
                                                class="svg-bg__path" stroke="#C25001"></path></svg>
                                </span><span
                                        class="button_buttonInner__CP9Jg"><?= $btn_title ?></span></div>
                        </a>
                    </div>

                </div>
            </div>
        </a></div>

	<?php
	return ob_get_clean();
}

//add_shortcode( 'promo', 'promo_callback' );
