<?php get_header(); 
      pageBanner(array(
        'title' => 'Past Events',
        'subtitle' => 'A recap of our past events.'
      ));
?>

<!-- BLOG LISTING -->

    <div class="container container--narrow page-section">
    	<?php
      $today = date('Ymd');

        $pastEvents = new WP_Query(array(
          'paged' => get_query_var('paged', 1),
          'post_type' => 'event',
          'meta_key' => 'event_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'event_date',
              'compare' => '<',
              'value' => $today,
              'type' => 'numeric'
            )
          )
        ));

    	while($pastEvents->have_posts()) {
    		$pastEvents->the_post(); 
        get_template_part('template-parts/content-event');
         }
    	echo paginate_links(array(
        'total' => $pastEvents->max_num_pages
      ));
    	?>

    </div>

<?php get_footer(); ?><?php get_header(); ?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>);"></div>
      <div class="page-banner__content container container--narrow">
          <h1 class="page-banner__title"><?php the_archive_title(); ?></h1>
          <div class="page-banner__intro">
            <p><?php the_archive_description(); ?></p>
          </div>
      </div>  
    </div>

<!-- BLOG LISTING -->

    <div class="container container--narrow page-section">
    	<?php 
    	while(have_posts()) {
    		the_post(); ?>

			<div class="post-item">
				<h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="metabox">
					<p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
				</div>
				<div class="generic-content">
					<?php the_excerpt(); ?>
					<p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
				</div>
			</div>

    	<?php }
    	echo paginate_links();
    	?>

    </div>

<?php get_footer(); ?>