<?php

/**
 * Custom Post Type
 * Author EgensLab
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

if (!class_exists('Turio_Custom_Post_Type')) {
    class Turio_Custom_Post_Type
    {

        //$instance variable
        private static $instance;

        public function __construct()
        {
            //register post type
            add_action('init', array($this, 'register_custom_post_type'));
        }

        /**
         * get Instance
         * @since  2.0.0
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Register Custom Post Type
         * @since  2.0.0
         * */
        public function register_custom_post_type()
        {
            if (!defined('ELEMENTOR_VERSION')) {
                return;
            }
            $all_post_type = array(
                [
                    'post_type' => 'tour-package',
                    'args'      => array(
                        'label'              => esc_html__('Tour Package', 'ordainit-toolkit'),
                        'description'        => esc_html__('Tour Package', 'ordainit-toolkit'),
                        'menu_icon'           => 'dashicons-airplane',
                        'labels'             => array(
                            'name'               => esc_html_x('Tour Package', 'Post Type General Name', 'ordainit-toolkit'),
                            'singular_name'      => esc_html_x('Tour Package', 'Post Type Singular Name', 'ordainit-toolkit'),
                            'menu_name'          => esc_html__('Tour Package', 'ordainit-toolkit'),
                            'all_items'          => esc_html__('Tour Package', 'ordainit-toolkit'),
                            'view_item'          => esc_html__('View Tour Package', 'ordainit-toolkit'),
                            'add_new_item'       => esc_html__('Add New Package', 'ordainit-toolkit'),
                            'add_new'            => esc_html__('Add New Package', 'ordainit-toolkit'),
                            'edit_item'          => esc_html__('Edit Tour Package', 'ordainit-toolkit'),
                            'update_item'        => esc_html__('Update Tour Package', 'ordainit-toolkit'),
                            'search_items'       => esc_html__('Search Tour Package', 'ordainit-toolkit'),
                            'not_found'          => esc_html__('Not Found', 'ordainit-toolkit'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'ordainit-toolkit'),
                        ),
                        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
                        'hierarchical'       => true,
                        'public'             => true,
                        'has_archive'         => true,
                        "publicly_queryable" => true,
                        'show_ui'            => true,
                        "rewrite" => array('slug' => 'tour', 'with_front' => true),
                        'exclude_from_search'   => false,
                        'can_export'         => true,
                        'capability_type'    => 'post',
                        'query_var'          => true,
                        "show_in_rest"         => false,
                    )
                ],
                [
                    'post_type' => 'enquiries',
                    'args'      => array(
                        'labels'             => array(
                            'name'               => esc_html_x('All Enquiries', 'Post Type General Name', 'ordainit-toolkit'),
                            'singular_name'      => esc_html_x('All Enquiries', 'Post Type Singular Name', 'ordainit-toolkit'),
                            'menu_name'          => esc_html__('All Enquiries', 'ordainit-toolkit'),
                            'all_items'          => esc_html__('Enquiries', 'ordainit-toolkit'),
                            'view_item'          => esc_html__('View Enquiry', 'ordainit-toolkit'),
                            'add_new_item'       => esc_html__('Add New Enquiry', 'ordainit-toolkit'),
                            'add_new'            => esc_html__('Add New Enquiry', 'ordainit-toolkit'),
                            'edit_item'          => esc_html__('Edit Enquiry', 'ordainit-toolkit'),
                            'update_item'        => esc_html__('Update Enquiry', 'ordainit-toolkit'),
                            'search_items'       => esc_html__('Search Enquiry', 'ordainit-toolkit'),
                            'not_found'          => esc_html__('Not Found', 'ordainit-toolkit'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'ordainit-toolkit'),
                        ),
                        'capabilities' => array(
                            'create_posts' => false,
                            'edit_post' => 'manage_options',
                            'read_post' => 'manage_options',
                            'delete_post' => 'manage_options',
                            'edit_posts' => 'manage_options',
                            'edit_others_posts' => 'manage_options',
                            'publish_posts' => 'manage_options',
                            'read_private_posts' => 'manage_options',
                        ),
                        'supports'           => array('title'),
                        'hierarchical'       => true,
                        'public'             => true,
                        'has_archive'         => false,
                        "publicly_queryable" => true,
                        'show_ui'            => true,
                        "rewrite" => array('slug' => 'enquiries', 'with_front' => true),
                        'exclude_from_search'   => true,
                        'can_export'         => true,
                        'capability_type'    => 'post',
                        'query_var'          => true,
                        "show_in_rest"         => false,
                        "show_in_menu"         => 'edit.php?post_type=tour-package',

                    )
                ],
                [
                    'post_type' => 'review-rating',
                    'args'      => array(
                        'label'              => esc_html__('Review & Rating', 'ordainit-toolkit'),
                        'description'        => esc_html__('Review & Rating', 'ordainit-toolkit'),
                        'menu_icon'           => 'dashicons-book',
                        'labels'             => array(
                            'name'               => esc_html_x('All Review & Rating', 'Post Type General Name', 'ordainit-toolkit'),
                            'singular_name'      => esc_html_x('All Review & Rating', 'Post Type Singular Name', 'ordainit-toolkit'),
                            'menu_name'          => esc_html__('All Review & Rating', 'ordainit-toolkit'),
                            'all_items'          => esc_html__('Review & Rating', 'ordainit-toolkit'),
                            'view_item'          => esc_html__('View Review & Rating', 'ordainit-toolkit'),
                            'add_new_item'       => esc_html__('Add New Review & Rating', 'ordainit-toolkit'),
                            'add_new'            => esc_html__('Add New Review & Rating', 'ordainit-toolkit'),
                            'edit_item'          => esc_html__('Edit Review & Rating', 'ordainit-toolkit'),
                            'update_item'        => esc_html__('Update Review & Rating', 'ordainit-toolkit'),
                            'search_items'       => esc_html__('Search Review & Rating', 'ordainit-toolkit'),
                            'not_found'          => esc_html__('Not Found', 'ordainit-toolkit'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'ordainit-toolkit'),
                        ),
                        'capabilities' => array(
                            'create_posts' => false,
                            'edit_post' => 'manage_options',
                            'read_post' => 'manage_options',
                            'delete_post' => 'manage_options',
                            'edit_posts' => 'manage_options',
                            'edit_others_posts' => 'manage_options',
                            'publish_posts' => 'manage_options',
                            'read_private_posts' => 'manage_options',
                        ),
                        'supports'           => array('title'),
                        'hierarchical'       => true,
                        'public'             => true,
                        'has_archive'          => true,
                        "publicly_queryable" => true,
                        'show_ui'            => true,
                        "rewrite"                 => array('slug' => 'review-rating', 'with_front' => false),
                        'exclude_from_search'   => true,
                        'can_export'         => true,
                        'capability_type'    => 'post',
                        'query_var'          => true,
                        "show_in_rest"         => true,
                        "show_in_menu"         => 'edit.php?post_type=tour-package',

                    )
                ],
            );

            if (!empty($all_post_type) && is_array($all_post_type)) {
                foreach ($all_post_type as $post_type) {
                    call_user_func_array('register_post_type', $post_type);
                }
            }


            /**
             * Custom Taxonomy Register
             */

            $all_custom_taxonmy = array(
                array(
                    'taxonomy' => 'tour-package-destination',
                    'object_type' => 'tour-package',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Destination", 'ordainit-toolkit'),
                            "singular_name" => esc_html__("Destination", 'ordainit-toolkit'),
                            "menu_name" => esc_html__("Destination", 'ordainit-toolkit'),
                            "all_items" => esc_html__("All Destination", 'ordainit-toolkit'),
                            "add_new_item" => esc_html__("Add New Destination", 'ordainit-toolkit')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        'has_archive' => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "rewrite" => array('slug' => 'destination', 'with_front' => true),
                        "query_var" => true,
                        "show_admin_column" => true,
                        "show_in_rest" => false,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'tour-package-type',
                    'object_type' => 'tour-package',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Travel Type", 'ordainit-toolkit'),
                            "singular_name" => esc_html__("Travel Type", 'ordainit-toolkit'),
                            "menu_name" => esc_html__("Travel Type", 'ordainit-toolkit'),
                            "all_items" => esc_html__("All Travel Type", 'ordainit-toolkit'),
                            "add_new_item" => esc_html__("Add New Travel Type", 'ordainit-toolkit')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        'has_archive' => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "rewrite" => array('slug' => 'tour-type', 'with_front' => true),
                        "query_var" => true,
                        "show_admin_column" => true,
                        "show_in_rest" => false,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'tour-package-tags',
                    'object_type' => 'tour-package',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Tags", 'ordainit-toolkit'),
                            "singular_name" => esc_html__("Tags", 'ordainit-toolkit'),
                            "menu_name" => esc_html__("Tags", 'ordainit-toolkit'),
                            "all_items" => esc_html__("All Tags", 'ordainit-toolkit'),
                            "add_new_item" => esc_html__("Add New Tags", 'ordainit-toolkit')
                        ),
                        "public" => true,
                        "hierarchical" => false,
                        'has_archive' => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'tour-tags', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => false,
                        "show_in_quick_edit" => true,
                    )
                )
            );
            if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
                foreach ($all_custom_taxonmy as $taxonomy) {
                    call_user_func_array('register_taxonomy', $taxonomy);
                }
            }

            flush_rewrite_rules();
        }
    } //end class

    if (class_exists('Turio_Custom_Post_Type')) {
        Turio_Custom_Post_Type::getInstance();
    }
}
