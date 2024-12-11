<?php

use Elementor\Controls_Manager;


// Title & Content Section
$this->start_controls_section(
    'od_tour_category_content',
    [
        'label' => __('Category Title & Content', 'ordainit-toolkit'),
    ]
);

// Title
$this->add_control(
    'od_tour_category_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Subtitle
$this->add_control(
    'od_tour_category_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_tour_category_shape',
    [
        'label' => esc_html__('Choose Shape Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/category-shape.png',
        ],
    ]
);

$this->end_controls_section();


// Category List Content
$this->start_controls_section(
    'od_tour_category_content_list',
    [
        'label' => __('Category Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_lists',
    [
        'label' => esc_html__('Category List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_tour_category_list_title',
                'label' => esc_html__('Category Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Category Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_tour_category_list_icon_img',
                'label' => esc_html__('Choose Icon Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/sunbathing.png',
                ],

            ],

        ],
        'default' => [
            [
                'od_tour_category_list_title' => esc_html__('Sunbathing', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Paragliding', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Sports', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Wildlife', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Windsurfing', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_tour_category_list_title }}}',
    ]
);

$this->end_controls_section();

// Category Slider settings
$this->start_controls_section(
    'od_tour_category_slider_settings',
    [
        'label' => __('Category Slider Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_slider_autoplay',
    [
        'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();

// Arrow Switcher
$this->start_controls_section(
    'od_tour_category_slider_arrow_switcher_section',
    [
        'label' => __('Testimonial Arrow Switcher', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_slider_arrow_switcher',
    [
        'label' => esc_html__('Show / Hide Arrow', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();

// Style starts

$this->start_controls_section(
    'section_style',
    [
        'label' => __('Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


$this->start_controls_tabs(
    'style_tabs'
);

$this->start_controls_tab(
    'style_normal_tab',
    [
        'label' => esc_html__('Normal', 'textdomain'),
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
