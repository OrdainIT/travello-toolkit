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
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Counter Section
$this->start_controls_section(
    'od_counter_box_content',
    [
        'label' => __('Counter Content', 'ordainit-toolkit'),
    ]
);

// Value
$this->add_control(
    'od_counter_box_end_value',
    [
        'label' => esc_html__('Counter End Value', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => 835,
    ]
);
// SubText
$this->add_control(
    'od_counter_box_subtext',
    [
        'label' => esc_html__('Counter Sub Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => '+',
    ]
);
//Title
$this->add_control(
    'od_counter_box_title',
    [
        'label' => esc_html__('Counter Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Total Donations',
    ]
);

$this->end_controls_section();

// Icon Switcher
$this->start_controls_section(
    'od_counter_box_svg',
    [
        'label' => esc_html__('Svg Switcher', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_counter_box_svg_switcher',
    [
        'label' => esc_html__('Svg Show / Hide', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
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



$this->end_controls_section();
