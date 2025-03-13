<?php

use Elementor\Controls_Manager;

// layout Panel
$this->start_controls_section(
    'od_icon_box_layout',
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
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Content Section

// Icon Type Section
$this->start_controls_section(
    'od_icon_box_icon_type',
    [
        'label' => __('Icon Types', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
        ],
    ]
);

$this->add_control(
    'od_icon_box_icon_class',
    [
        'label' => __('Icon Type', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'flaticon-worker' => __('Worker', 'ordainit-toolkit'),
            'flaticon-tour-guide' => __('Tour Guide', 'ordainit-toolkit'),
            'fa-regular fa-hand-holding-heart' => __('Heart', 'ordainit-toolkit'),
            'fa-regular fa-notebook' => __('Notebook', 'ordainit-toolkit'),
            'flaticon-travel' => __('Airplane', 'ordainit-toolkit'),
            'fa-regular fa-badge-check' => __('Check', 'ordainit-toolkit'),
            'fa-regular fa-house-heart' => __('House', 'ordainit-toolkit'),
            'fa-sharp fa-solid fa-star' => __('Star', 'ordainit-toolkit'),
            'flaticon-travel' => __('Travel', 'ordainit-toolkit'),
        ],
        'default' => 'flaticon-worker',
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Icon Image Selection Section
$this->start_controls_section(
    'od_icon_box_image_section',
    [
        'label' => __('Icon Image', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-4']
        ],
    ]
);

$this->add_control(
    'od_icon_box_icon_image',
    [
        'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/tour-guide.png',
        ],
    ]
);

$this->end_controls_section();

// Counter Section
$this->start_controls_section(
    'od_icon_box_counter',
    [
        'label' => __('Icon Box Counter', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-3']
        ],
    ]
);

$this->add_control(
    'od_icon_box_counter_end',
    [
        'label' => esc_html__('Counter End Value', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => 3500,
    ]
);

$this->add_control(
    'od_icon_box_counter_text',
    [
        'label' => esc_html__('Counter Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'satisfied customers',
    ]
);

$this->end_controls_section();


// Icon Content
$this->start_controls_section(
    'od_icon_box_content',
    [
        'label' => __('Icon Box Content', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_icon_box_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Icon Box Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_icon_box_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Icon Box Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Description title here', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->end_controls_section();




// Style Section

$this->start_controls_section(
    'od_icon_style',
    [
        'label' => __('Icon Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Background
$this->add_control(
    'od_icon_box_icon_background',
    [
        'label' => esc_html__('Background', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-service-icon span' => 'background: {{VALUE}};',
            '{{WRAPPER}} .it-chooseus-service-icon i' => 'background: {{VALUE}};',
            '{{WRAPPER}} .it-chooseus-rating-icon i ' => 'background: {{VALUE}};',
        ],
    ]
);
// Color
$this->add_control(
    'od_icon_box_icon_color',
    [
        'label' => esc_html__('Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-service-icon span' => 'color: {{VALUE}};',
            '{{WRAPPER}} .it-chooseus-service-icon i' => 'color: {{VALUE}};',
            '{{WRAPPER}} .it-chooseus-rating-icon i ' => 'color: {{VALUE}};',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
        ],

    ]
);



// Icon Size Control
$this->add_responsive_control(
    'od_icon_box_icon_size',
    [
        'label' => esc_html__('Icon Size', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'selectors' => [
            '{{WRAPPER}} .it-about-service-icon span' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
        ],
    ]
);



$this->end_controls_section();

// Icon Content Styles
$this->start_controls_section(
    'od_icon_content_style',
    [
        'label' => __('Icon Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
        ],
    ]
);

// Title Style
$this->add_control(
    'od_icon_box_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-service-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_icon_box_title_typography',
        'selector' => '{{WRAPPER}} .it-about-service-title',
    ]
);

// Description Style
$this->add_control(
    'od_icon_box_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-service-text p' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_icon_box_description_typography',
        'selector' => '{{WRAPPER}} .it-about-service-text p',
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->end_controls_section();

// Counter Style
$this->start_controls_section(
    'od_icon_box_counter_style',
    [
        'label' => __('Couter Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-3']
        ],
    ]
);

// Counter Value
$this->add_control(
    'od_icon_box_counter_value_color',
    [
        'label' => esc_html__('Value Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-chooseus-rating-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Value Typography', 'ordainit-toolkit'),
        'name' => 'od_icon_box_counter_value_typography',
        'selector' => '{{WRAPPER}} .it-chooseus-rating-title',
    ]
);

// Counter Text Style
$this->add_control(
    'od_icon_box_counter_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-chooseus-rating-text p' => 'color: {{VALUE}}',
        ],

    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Text Typography', 'ordainit-toolkit'),
        'name' => 'od_icon_box_counter_text_typography',
        'selector' => '{{WRAPPER}} .it-chooseus-rating-text p',
    ]
);

$this->end_controls_section();
