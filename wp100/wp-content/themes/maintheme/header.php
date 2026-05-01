<?php 
if (!wp_is_mobile()) get_template_part('template-parts/header/main','headerdesktop');
//if (!wp_is_mobile()) get_template_part('template-parts/header/main','headerdesktopshort');  // aυτα τα βάλαμε εδς για να κάνουμε γρήγορα dedbug
if (wp_is_mobile()) get_template_part('template-parts/header/main','headermobile');
if (wp_is_mobile()) get_template_part('template-parts/header/main','navmobile');

?>

<?php
// header

if ( is_404() ) {
	//return;
}
?>



