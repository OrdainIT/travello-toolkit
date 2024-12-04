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
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_heading_title_typography',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);


$this->end_controls_section();
