<section class="page-content">
	<div class="wrap">
		<div class="content text-left text-white">
            <h1 class="text-left mb-20p"><?php echo get_the_title($post->ID);?></h1>
			<?php echo apply_filters( 'the_content', get_post_field('post_content', $post->ID) );?>
		</div>
	</div>
</section>
