<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_sub_heading_content',
    [
        'label' => __('Subheading Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_sub_heading_title',
    [
        'label' => __('Sub Heading Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Sub Heading', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);




$this->add_control(
    'od_sub_heading_title_alignment',
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



$this->end_controls_section();

$this->start_controls_section(
    'od_sub_heading_style',
    [
        'label' => __('Sub Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_sub_heading_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_sub_heading_title_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);


$this->end_controls_section();
