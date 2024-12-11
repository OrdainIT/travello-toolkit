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
            'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
            'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
            'layout-5' => esc_html__('Layout 5', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_tour_post_title_content',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-5'],
        ],
    ]
);

$this->add_control(
    'od_tour_post_title_content_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Amazing tour Places around the world', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_tour_post_title_content_subtitle',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Featured Tours', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_tour_post_title_content_shap',
    [
        'label' => esc_html__('Shap', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);


$this->end_controls_section();

$this->start_controls_section(
    'od_tour_post_query',
    [
        'label' => __('Tour Post Query', 'ordainit-toolkit'),
    ]
);


$post_type = 'tour-package';

$this->add_control(
    'posts_per_page',
    [
        'label' => esc_html__('Posts Per Page', 'ordainit-toolkit'),
        'description' => esc_html__('Leave blank or enter -1 for all.', 'tvcore'),
        'type' => Controls_Manager::NUMBER,
        'default' => '3',
    ]
);

$this->add_control(
    'tour_post_order',
    [
        'label' => esc_html__('Orderby', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'asc',
        'options' => [
            'asc' => esc_html__('ASC', 'textdomain'),
            'desc' => esc_html__('DESC', 'textdomain'),
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_tour_post_button',
    [
        'label' => __('Button', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3'],
        ],
    ]
);



$this->add_control(
    'od_tour_post_button_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Explore More', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);


$this->end_controls_section();

$this->start_controls_section(
    'section_style',
    [
        'label' => __('Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'text_transform',
    [
        'label' => __('Text Transform', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => '',
        'options' => [
            '' => __('None', 'ordainit-toolkit'),
            'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
            'lowercase' => __('lowercase', 'ordainit-toolkit'),
            'capitalize' => __('Capitalize', 'ordainit-toolkit'),
        ],
        'selectors' => [
            '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();
