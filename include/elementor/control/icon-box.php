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
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Content Section

// Button Type Section
$this->start_controls_section(
    'od_icon_box_icon_type',
    [
        'label' => __('Icon Types', 'ordainit-toolkit'),
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
        ],
        'default' => 'flaticon-worker',
        'label_block' => true,
    ]
);

$this->end_controls_section();




// Style Section

$this->start_controls_section(
    'section_style',
    [
        'label' => __('Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);



$this->end_controls_section();
