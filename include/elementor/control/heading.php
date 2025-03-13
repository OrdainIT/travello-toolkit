<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_heading_content',
    [
        'label' => __('Heading Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_heading_title',
    [
        'label' => __('Heading Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Heading', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);


$this->add_control(
    'od_heading_title_alignment',
    [
        'label' => __('Alignment', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'left' => [
                'title' => __('Left', 'ordainit-toolkit'),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => __('Center', 'ordainit-toolkit'),
                'icon' => 'eicon-text-align-center',
            ],
            'right' => [
                'title' => __('Right', 'ordainit-toolkit'),
                'icon' => 'eicon-text-align-right',
            ],
        ],
        'default' => 'left',
        'toggle' => true,
    ]
);

$this->add_control(
    'od_heading_title_tag',
    [
        'label' => esc_html__('Title HTML Tag', 'tvcore'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
            'h1' => [
                'title' => esc_html__('H1', 'tvcore'),
                'icon' => 'eicon-editor-h1'
            ],
            'h2' => [
                'title' => esc_html__('H2', 'tvcore'),
                'icon' => 'eicon-editor-h2'
            ],
            'h3' => [
                'title' => esc_html__('H3', 'tvcore'),
                'icon' => 'eicon-editor-h3'
            ],
            'h4' => [
                'title' => esc_html__('H4', 'tvcore'),
                'icon' => 'eicon-editor-h4'
            ],
            'h5' => [
                'title' => esc_html__('H5', 'tvcore'),
                'icon' => 'eicon-editor-h5'
            ],
            'h6' => [
                'title' => esc_html__('H6', 'tvcore'),
                'icon' => 'eicon-editor-h6'
            ]
        ],
        'default' => 'h3',
        'toggle' => false,
    ]
);


$this->add_control(
    'od_heading_link',
    [
        'label' => __('Heading Link', 'plugin-domain'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __('https://your-link.com', 'ordainit-toolkit'),
        'default' => [
            'url' => '',
            'is_external' => false,
            'nofollow' => false,
        ],
    ]
);



$this->end_controls_section();

$this->start_controls_section(
    'od_heading_style',
    [
        'label' => __('Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_heading_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
        ],
    ]
);
// heading title color
$this->add_control(
    'od_heading_color_title_color',
    [
        'label' => esc_html__('Color Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title span' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_heading_title_typography',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);


$this->end_controls_section();
