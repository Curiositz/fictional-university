<?php 

	// CREATING A POST TYPE
	function university_post_types() {

		// Event Post Type
		register_post_type('event', array(
			'capability_type' => 'event',
			'map_meta_cap' => true,
			'supports' => array('title', 'editor', 'excerpt'),
			'rewrite' => array('slug' => 'events'),
			'has_archive' => true,
			'public' => true,
			'labels' => array(
				'name' => 'Events',
				'add_new_item' => 'Add New Event',
				'edit_item' => 'Edit Event',
				'all_items' => 'All Events',
				'singular_name' => 'Event'
			),
			'menu_icon' => 'dashicons-calendar'
		));

		// Program Post Type
		register_post_type('program', array(
			'supports' => array('title'),
			'rewrite' => array('slug' => 'programs'),
			'has_archive' => true,
			'public' => true,
			'labels' => array(
				'name' => 'Programs',
				'add_new_item' => 'Add New Program',
				'edit_item' => 'Edit Program',
				'all_items' => 'All Programs',
				'singular_name' => 'Program'
			),
			'menu_icon' => 'dashicons-welcome-learn-more'
		));

		// Professor Post Type
		register_post_type('professor', array(
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => true,
			'labels' => array(
				'name' => 'Professors',
				'edit_item' => 'Edit Professor',
				'all_items' => 'All Professors',
				'singular_name' => 'Professor'
			),
			'menu_icon' => 'dashicons-businessperson'
		));

		// Campus Post Type
		register_post_type('campus', array(
			'capability_type' => 'campus',
			'map_meta_cap' => true,
			'supports' => array('title', 'editor', 'excerpt'),
			'rewrite' => array('slug' => 'campuses'),
			'has_archive' => true,
			'public' => true,
			'labels' => array(
				'name' => 'Campuses',
				'add_new_item' => 'Add New Campus',
				'edit_item' => 'Edit Campus',
				'all_items' => 'All Campuses',
				'singular_name' => 'Campus'
			),
			'menu_icon' => 'dashicons-location-alt'
		));

		// Note Post Type
		register_post_type('note', array(
			'capability_type' => 'note',
			'map_meta_cap' => true,
			'show_in_rest' => true,
			'supports' => array('title', 'editor'),
			'public' => false,
			'show_ui' => true,
			'labels' => array(
				'name' => 'Notes',
				'edit_item' => 'Edit Note',
				'all_items' => 'All Notes',
				'singular_name' => 'Note'
			),
			'menu_icon' => 'dashicons-welcome-write-blog'
		));

		// Like Post Type
		register_post_type('like', array(
			'supports' => array('title'),
			'public' => false,
			'show_ui' => true,
			'labels' => array(
				'name' => 'Likes',
				'edit_item' => 'Edit Like',
				'all_items' => 'All Likes',
				'singular_name' => 'Like'
			),
			'menu_icon' => 'dashicons-heart'
		));

	}

	add_action('init', 'university_post_types');

