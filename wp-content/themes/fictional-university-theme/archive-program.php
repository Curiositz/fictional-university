<?php get_header(); 
      pageBanner(array(
        'title' => 'All Programs',
        'subtitle' => 'There is something for everyone. Have a look around.'
      ));
?>


<!-- BLOG LISTING -->

    <div class="container container--narrow page-section">
    	<?php 
    	while(have_posts()) {
    		the_post(); ?>
		<ul class="link-list min-list">
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		</ul>
    	<?php }
    	echo paginate_links();
    	?>
      

    </div>

<?php get_footer(); ?>