<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Widget_Base;

use Elementor\Controls_Manager;

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
  




// layout Panel
$this->start_controls_section(
    'od_layout',
    [
        'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_design_style',
    [
        'label' => esc_html__('Select Layout', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'layout-1' => esc_html__('Layout 1', 'ordainit-toolkit'),
            'layout-2' => esc_html__('Layout 2', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Blog Query
$this->start_controls_section(
    'od_post_query',
    [
        'label' => esc_html__('Blog Query', 'tvcore'),
    ]
);

$post_type = 'post';
$taxonomy = 'category';

$this->add_control(
    'posts_per_page',
    [
        'label' => esc_html__('Posts Per Page', 'tvcore'),
        'description' => esc_html__('Leave blank or enter -1 for all.', 'tvcore'),
        'type' => Controls_Manager::NUMBER,
        'default' => '3',
    ]
);

$this->add_control(
    'category',
    [
        'label' => esc_html__('Include Categories', 'tvcore'),
        'description' => esc_html__('Select a category to include or leave blank for all.', 'tvcore'),
        'type' => Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => od_get_categories($taxonomy),
        'label_block' => true,
    ]
);

$this->add_control(
    'exclude_category',
    [
        'label' => esc_html__('Exclude Categories', 'tvcore'),
        'description' => esc_html__('Select a category to exclude', 'tvcore'),
        'type' => Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => od_get_categories($taxonomy),
        'label_block' => true
    ]
);

$this->add_control(
    'post__not_in',
    [
        'label' => esc_html__('Exclude Item', 'tvcore'),
        'type' => Controls_Manager::SELECT2,
        'options' => od_get_all_types_post($post_type),
        'multiple' => true,
        'label_block' => true
    ]
);

$this->add_control(
    'offset',
    [
        'label' => esc_html__('Offset', 'tvcore'),
        'type' => Controls_Manager::NUMBER,
        'default' => '0',
    ]
);

$this->add_control(
    'orderby',
    [
        'label' => esc_html__('Order By', 'tvcore'),
        'type' => Controls_Manager::SELECT,
        'options' => array(
            'ID' => 'Post ID',
            'author' => 'Post Author',
            'title' => 'Title',
            'date' => 'Date',
            'modified' => 'Last Modified Date',
            'parent' => 'Parent Id',
            'rand' => 'Random',
            'comment_count' => 'Comment Count',
            'menu_order' => 'Menu Order',
        ),
        'default' => 'date',
    ]
);

$this->add_control(
    'order',
    [
        'label' => esc_html__('Order', 'tvcore'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            'asc'     => esc_html__('Ascending', 'tvcore'),
            'desc'     => esc_html__('Descending', 'tvcore')
        ],
        'default' => 'desc',

    ]
);


$this->add_control(
    'od_blog_title_word',
    [
        'label' => esc_html__('Title Word Count', 'tvcore'),
        'description' => esc_html__('Set how many word you want to displa!', 'tvcore'),
        'type' => Controls_Manager::NUMBER,
        'default' => '6',
    ]
);

$this->add_control(
    'od_post_content',
    [
        'label' => __('Content', 'tvcore'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __('Show', 'tvcore'),
        'label_off' => __('Hide', 'tvcore'),
        'return_value' => 'yes',
        'default' => '',
    ]
);

$this->add_control(
    'od_post_content_limit',
    [
        'label' => __('Content Limit', 'tvcore'),
        'type' => Controls_Manager::TEXT,
        'label_block' => true,
        'default' => '14',
        'dynamic' => [
            'active' => true,
        ],
        'condition' => [
            'od_post_content' => 'yes'
        ]
    ]
);

$this->end_controls_section();



$this->start_controls_section(
    'od_blog_content_settings',
    [
        'label' => __('Blog Post Settings', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_blog_content_date_switcher',
    [
        'label' => esc_html__('Date Show/Hide', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'od_blog_content_comment_switcher',
    [
        'label' => esc_html__('Comment Show/Hide', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);


$this->add_control(
    'od_blog_content_button_heading',
    [
        'label' => esc_html__('Button', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_blog_content_button_style',
    [
        'label' => esc_html__('Button Style', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'btn-1' => esc_html__('Style 1', 'ordainit-toolkit'),
            'btn-2' => esc_html__('Style 2', 'ordainit-toolkit'),
        ],

        'default' => 'btn-1',
        'label_block' => true,
    ]
);



$this->add_control(
    'od_blog_content_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Explore More', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);






$this->end_controls_section();

$this->start_controls_section(
    'od_blog_post_style',
    [
        'label' => __('Blog Post Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_blog_post_style_bg_color',
    [
        'label' => esc_html__('Bg Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_blog_post_style_title_heading',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->start_controls_tabs(
    'od_blog_post_style_title_tabs'
);

// Normal

$this->start_controls_tab(
    'od_blog_post_style_title_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_blog_post_style_title_normal_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-title' => 'color: {{VALUE}}',
        ],
    ]
);





$this->end_controls_tab();
// Hover

$this->start_controls_tab(
    'od_blog_post_style_title_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_blog_post_style_title_hover_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-title:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_style_title_typography',
        'selector' => '{{WRAPPER}} .it-blog-title',
    ]
);


$this->add_control(
    'od_blog_post_style_meta_heading',
    [
        'label' => esc_html__('Blog Meta', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_blog_post_style_meta_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-meta span i' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_blog_post_style_meta_text_color',
    [
        'label' => esc_html__('Meta Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-meta span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_style_meta_text_typo',
        'selector' => '{{WRAPPER}} .it-blog-meta span',
    ]
);



$this->add_control(
    'od_blog_post_style_button_heading',
    [
        'label' => esc_html__('Blog Button', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->start_controls_tabs(
    'od_blog_post_style_button_tabs'
);

// Normal

$this->start_controls_tab(
    'od_blog_post_style_button_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_blog_post_style_button_normal_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-blog.blog-style-btn' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_blog_post_style_button_normal_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-blog.blog-style-btn' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-blog-link a' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_blog_post_style_button_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_blog_post_style_button_hover_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-blog:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_blog_post_style_button_hover_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-blog:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-blog-link a:hover' => 'color: {{VALUE}}',
        ],
    ]
);


$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_style_button_typo',
        'selector' => '{{WRAPPER}} .it-btn-blog, {WRAPPER}} .it-blog-link a',
    ]
);

$this->add_control(
    'od_blog_post_style_category_heading',
    [
        'label' => esc_html__('Blog Category', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_blog_post_style_category_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-categories span' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_blog_post_style_category_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-blog-categories span' => 'color: {{VALUE}}',
        ],
    ]
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_blog_post_style_category_text_typo',
        'selector' => '{{WRAPPER}} .it-blog-categories span',
    ]
);








$this->end_controls_section();

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
                    <?php $i=-1; if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) :
                            $query->the_post();
                            $i++;
                            global $post;
                            $categories = get_the_category($post->ID);
                        ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 wow itfadeUp mb-30" data-wow-duration=".9s"
                                data-wow-delay="<?php echo esc_attr(.3 + $i * .2); ?>s">
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
                                                        <?php echo get_the_date('j, M, Y'); ?>
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
