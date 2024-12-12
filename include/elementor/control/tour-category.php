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
    'od_tour_category_style',
    [
        'label' => __('Category Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_tour_category_style_area_bg_color',
    [
        'label' => esc_html__('Category Area BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .black-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_tour_category_heading_style',
    [
        'label' => __('Category Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

//Title Style
$this->add_control(
    'od_tour_category_heading_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_tour_category_heading_title_typography',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);

//Subtitle Style
$this->add_control(
    'od_tour_category_heading_subtitle_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_tour_category_heading_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);

$this->end_controls_section();

// Category Content style
$this->start_controls_section(
    'od_tour_category_content_style',
    [
        'label' => __('Category Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_tour_category_style_tabs'
);

$this->start_controls_tab(
    'od_tour_category_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_style_title_normal_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_icon_box_normal_bg_color',
    [
        'label' => esc_html__('Icon Box BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-icon span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_item_box_normal_bg_color',
    [
        'label' => esc_html__('Item Box BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

//Hover style
$this->start_controls_tab(
    'od_tour_category_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_style_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item:hover .it-categories-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_icon_box_hover_bg_color',
    [
        'label' => esc_html__('Icon Box Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item:hover .it-categories-icon span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_item_box_hover_bg_color',
    [
        'label' => esc_html__('Item Box Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

//Title Typo
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_tour_category_style_title_typography',
        'selector' => '{{WRAPPER}} .it-categories-title',
    ]
);

$this->end_controls_section();


// Arrow Style
$this->start_controls_section(
    'od_tour_category_arrow_style',
    [
        'label' => __('Category Arrow Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_tour_category_arrow_style_tabs'
);

$this->start_controls_tab(
    'od_tour_category_arrow_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_normal_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button' => 'background-color: {{VALUE}}',

        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_normal_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_normal_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();

$this->start_controls_tab(
    'od_tour_category_arrow_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_hover_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_hover_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_hover_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button:hover' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
