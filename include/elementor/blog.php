<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Widget_Base;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Od_Blog extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'od-blog';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Blog Post', 'ordainit-toolkit');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'od-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/blog.php');
    }

    /**
     * Render the widget ouodut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } else if (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        // include_categories
        $category_list = '';
        if (!empty($settings['category'])) {
            $category_list = implode(", ", $settings['category']);
        }
        $category_list_value = explode(" ", $category_list);
        // exclude_categories
        $exclude_categories = '';
        if (!empty($settings['exclude_category'])) {
            $exclude_categories = implode(", ", $settings['exclude_category']);
        }
        $exclude_category_list_value = explode(" ", $exclude_categories);

        $post__not_in = '';
        if (!empty($settings['post__not_in'])) {
            $post__not_in = $settings['post__not_in'];
            $args['post__not_in'] = $post__not_in;
        }
        $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
        $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
        $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
        $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';

        // number
        $off = (!empty($offset_value)) ? $offset_value : 0;
        $offset = $off + (($paged - 1) * $posts_per_page);
        $p_ids = array();

        // build up the array
        if (!empty($settings['post__not_in'])) {
            foreach ($settings['post__not_in'] as $p_idsn) {
                $p_ids[] = $p_idsn;
            }
        }

        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby' => $orderby,
            'order' => $order,
            'offset' => $offset,
            'paged' => $paged,
            'post__not_in' => $p_ids,
        );

        // exclude_categories
        if (!empty($settings['exclude_category'])) {

            // Exclude the correct cats from tax_query
            $args['tax_query'] = array(
                array(
                    'taxonomy'    => 'category',
                    'field'         => 'slug',
                    'terms'        => $exclude_category_list_value,
                    'operator'    => 'NOT IN'
                )
            );

            // Include the correct cats in tax_query
            if (!empty($settings['category'])) {
                $args['tax_query']['relation'] = 'AND';
                $args['tax_query'][] = array(
                    'taxonomy'    => 'category',
                    'field'        => 'slug',
                    'terms'        => $category_list_value,
                    'operator'    => 'IN'
                );
            }
        } else {
            // Include the cats from $cat_slugs in tax_query
            if (!empty($settings['category'])) {
                $args['tax_query'][] = [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $category_list_value,
                ];
            }
        }

        $filter_list = $settings['category'];

        // The Query
        $query = new \WP_Query($args);

        // var_dump($query);

        $od_blog_title_word = $settings['od_blog_title_word'];
        $od_post_content = $settings['od_post_content'];
        $od_post_content_limit = $settings['od_post_content_limit'];
        $od_blog_content_date_switcher = $settings['od_blog_content_date_switcher'];
        $od_blog_content_comment_switcher = $settings['od_blog_content_comment_switcher'];
        $od_blog_content_btn_text = $settings['od_blog_content_btn_text'];
        $od_blog_content_button_style = $settings['od_blog_content_button_style'];



?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

        <?php else: ?>

            <div class="container">

                <div class="row">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) :
                            $query->the_post();
                            global $post;
                            $categories = get_the_category($post->ID);
                        ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 wow itfadeUp mb-30" data-wow-duration=".9s"
                                data-wow-delay=".3s">
                                <div class="it-blog-item p-relative">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="it-blog-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="it-blog-categories">
                                            <?php
                                            if (! empty($categories)) {
                                                foreach ($categories as $category) {
                                                    echo '<span>' . esc_html($category->name) . '</span> ';
                                                }
                                            }
                                            ?>
                                        </div>

                                    <?php endif; ?>

                                    <div class="it-blog-content">
                                        <div class="it-blog-meta-box mb-20 d-flex align-items-center">
                                            <?php if (!empty($od_blog_content_date_switcher)): ?>
                                                <div class="it-blog-meta">
                                                    <span>
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        <?php echo get_the_date('j, F, Y'); ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($od_blog_content_comment_switcher)): ?>
                                                <div class="it-blog-meta">
                                                    <span>
                                                        <i class="fa-regular fa-comments"></i>
                                                        <?php comments_number('No Comments', '1 Comment', '% Comments'); ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <h3 class="it-blog-title mb-20">
                                            <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $od_blog_title_word, ''); ?></a>
                                        </h3>
                                        <?php if ($od_blog_content_button_style == 'btn-2'): ?>
                                            <div class="it-blog-link">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo esc_html($od_blog_content_btn_text, 'ordainit-toolkit'); ?>
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        <?php else: ?>

                                            <div class="it-blog-button">
                                                <a href="<?php the_permalink(); ?>" class="it-btn-blog blog-style-btn"><?php echo esc_html($od_blog_content_btn_text, 'ordainit-toolkit'); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile;
                        wp_reset_query(); ?>
                    <?php endif; ?>

                </div>




            </div>



        <?php endif; ?>







        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Blog());
