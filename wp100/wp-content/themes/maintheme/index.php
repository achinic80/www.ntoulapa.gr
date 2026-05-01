<?php 
get_header();
?>

<?php 
$pageid = get_queried_object()->ID;
//echo apply_filters( 'the_content', get_post_field( 'post_content', $post->ID ) );
?>

<?php 

$content = apply_filters( 'the_content', get_post_field( 'post_content', $post->ID ) ); 
//$content = substr($content, 0, 300);
echo $content; 
?>

<br><br>

<?php get_template_part('template-parts/header/main','faq'); ?>
<?php 
 get_footer();
?>