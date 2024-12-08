<?php

use Elementor\Controls_Manager;


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
