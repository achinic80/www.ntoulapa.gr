<?php
$files = glob(get_template_directory() . '/includes/functions/*.php');

foreach ($files as $file) {
	include $file;
}

$files = glob(get_template_directory() . '/includes/shortcodes/*.php');

foreach ($files as $file) {
	include $file;
}

$files = glob(get_template_directory() . '/includes/widgets/*.php');

foreach ($files as $file) {
	include $file;
}


$files = glob(get_template_directory() . '/includes/settings-pages/*.php');

foreach ($files as $file) {
	include $file;
}


$GLOBALS['aff_link'] = get_option('global_settings_name') ? get_option('global_settings_name')['aff_link'] . '" rel="nofollow noopener' : '';
$GLOBALS['footer'] = get_option('global_settings_name') ? get_option('global_settings_name')['footer'] : '';


add_action('admin_enqueue_scripts', 'includeScriptsAdmin');
function includeScriptsAdmin($hook)
{
	wp_enqueue_media();
	wp_register_script('scriptjs', get_template_directory_uri() . '/dist/admin_scripts.js', array('jquery'), '4.4', true);
	wp_enqueue_script('scriptjs');
}

add_action('wp_enqueue_scripts', 'includeScripts');
function includeScripts($hook)
{
	wp_enqueue_script( 'jquery' );
	wp_register_script('main-scripts', get_template_directory_uri() . '/dist/script.js', array('jquery'), false, false);
	wp_enqueue_script('main-scripts');
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/other.css', false, '1.1', 'all');
}

add_theme_support('post-thumbnails');

// 
//  [banner1 text1="ΜΠΕΙΤΕ ΤΩΡΑ ΚΑΙ ΚΕΡΔΙΣΤΕ" text2="Ολοκληρώστε και λάβετε πόντους" button="Εγγραφείτε τώρα"]
//  [banner2 text1="ΜΠΕΙΤΕ ΤΩΡΑ ΚΑΙ ΚΕΡΔΙΣΤΕ" text2="Ολοκληρώστε και λάβετε πόντους" button="Εγγραφείτε τώρα"]
function banner1Response($atts) {
		if (empty($atts)) return;
		if (!isset($atts['text1'])) $atts['text1'] = "Κερδίστε μια Lamborghini";
		if (!isset($atts['text2'])) $atts['text2'] = "Huracán";
		if (!isset($atts['button'])) $atts['button'] = "Εγγραφείτε τώρα";	

		 ob_start();?>

<stb-lambo-banner class="promo-section" _nghost-tkh-c298="">
  <div stbuserdata="" class="container" style="padding:0px;">
    <div class="lamborghini">
      <div class="lamborghini--inner">
        <div class="lamborghini--title"><?php echo htmlspecialchars_decode($atts['text1']);?></div>
        <div class="lamborghini--line"></div>
        <div class="lamborghini--subtitle"><?php echo htmlspecialchars_decode($atts['text2']);?></div>
        <div class="lamborghini--huracan"></div>
        <stb-button palette="primary" size="small" class="_custom lamborghini--button stb-button">
          <div class="custom-button-wrapper">
          <a href="<?php echo $GLOBALS['aff_link'];?>">
            <button class="custom-button custom-button--small custom-button--primary" type="button">
              <span class="custom-button__title"><?php echo htmlspecialchars_decode($atts['button']);?></span>
              <!---->
              <!---->
              <!---->
              <!---->
              <span class="custom-button__icon"></span>
            </button></a>
          </div>
        </stb-button>
      </div>
    </div>
    <!---->
  </div>
</stb-lambo-banner>

		<?php 
    	return ob_get_clean();
}



add_shortcode('banner1', 'banner1Response');




function banner2Response($atts) {
	if (empty($atts)) return;
    if (!isset($atts['text1'])) $atts['text1'] = "Ανακατασκευή του Δία";
    if (!isset($atts['text2'])) $atts['text2'] = "Αποκτήστε έως και €3.000";
    if (!isset($atts['button'])) $atts['button'] = "Παίξτε τώρα";	
	ob_start();?>

<stb-jupiter-banner class="main-section _jupiter-bn" _nghost-tkh-c290=""  style="padding:0px;">
  <stb-banner-list category="banner" place="entrance_page_banner2" stbuserdata="" class="jupiter-banner">
    <div class="jupiter-banner--inner">
      <p class="jupiter-banner--title"><?php echo htmlspecialchars_decode($atts['text1']);?></p>
      <p class="jupiter-banner--subtitle _ls"> <?php echo htmlspecialchars_decode($atts['text2']);?></p>
      <p class="jupiter-banner--subtitle _ls _mob-lg"></p>
      <stb-button palette="primary" routerlink="/jupiter" size="small" class="_custom jupiter-banner--button stb-button" tabindex="0">
        <div class="custom-button-wrapper">
        <a href="<?php echo $GLOBALS['aff_link'];?>">
          <button class="custom-button custom-button--small custom-button--primary" type="button">
            <span class="custom-button__title"><?php echo htmlspecialchars_decode($atts['button']);?></span>
            <span class="custom-button__icon"></span>
          </button>
        </a>
        </div>
      </stb-button>
    </div>
    <img alt="jupiter image" class="jupiter-banner--img" 
    src="/wp-content/themes/maintheme/assets/images/customimages/1633432450751_desklejupiterbannerx2new.png" 
    srcset="/wp-content/themes/maintheme/assets/images/customimages/1633432450751_desklejupiterbannerx2new.png">
  </stb-banner-list>
</stb-jupiter-banner>

<?php 
    return ob_get_clean();
}

add_shortcode('banner2', 'banner2Response'); 





$icons = array();
$icons[] = 'sprite.svg#casino-file';
$icons[] = 'sprite.svg#top-fill';
$icons[] = 'sprite.svg#new-fill';
$icons[] = 'sprite.svg#popular-fill';
$icons[] = 'sprite.svg#exclusive-fill';
$icons[] = 'sprite.svg#bonus-fill';
$icons[] = 'sprite.svg#slots-fill';
$icons[] = 'sprite.svg#live-casino-fill';
$icons[] = 'sprite.svg#table-games-fill';
$icons[] = 'sprite.svg#jackpots-fill';
$icons[] = 'sprite.svg#all-games-fill';
$icons[] = 'sprite.svg#livegames-fill';
$icons[] = 'sprite.svg#clubroyale-fill';
$icons[] = 'sprite.svg#roulette-fill';
$icons[] = 'sprite.svg#blackjack-fill';
$icons[] = 'sprite.svg#gameshows-fill';
$icons[] = 'sprite.svg#dice-fill';
$icons[] = 'sprite.svg#poker-fill';
$icons[] = 'sprite.svg#sportbook-line';
$icons[] = 'sprite.svg#livebetting-line';
$icons[] = 'sprite.svg#horse-line';
$icons[] = 'sprite.svg#virtual-line';
$icons[] = 'sprite.svg#constellation';
$icons[] = 'sprite.svg#present-fill';
$icons[] = 'sprite.svg#tournaments-fill';
$icons[] = 'sprite.svg#weekly-challenges-fill';
$icons[] = 'sprite.svg#shop-fill';
$icons[] = 'sprite.svg#vip-fill';
$icons[] = 'sprite.svg#chat-fill';
$_GLOBALS['icons'] = $icons;