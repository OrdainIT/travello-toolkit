<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_working_box_content',
    [
        'label' => __('Working Box Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_working_box_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Working Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_working_box_title_url',
    [
        'label' => __('Title Url', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_working_box_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Working Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your Description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);



$this->end_controls_section();

// Working Box Style
$this->start_controls_section(
    'od_working_box_style',
    [
        'label' => __('Box Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_working_box_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-work-box' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_working_box_border_color',
    [
        'label' => esc_html__('Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-work-box' => 'border-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

// Content Style
$this->start_controls_section(
    'od_working_box_content_style',
    [
        'label' => __('Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Working Quantity Style
$this->start_controls_tabs(
    'od_working_box_quantity_style_tabs'
);

$this->start_controls_tab(
    'od_working_box_quantity_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_working_box_quantity_style_normal_bg_color',
    [
        'label' => esc_html__('Quantity BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-work-quantity' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_working_box_quantity_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_working_box_quantity_style_hover_bg_color',
    [
        'label' => esc_html__('Quantity BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-work-item:hover .it-work-quantity' => 'background-color: {{VALUE}}',
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

// Title Style
$this->start_controls_tabs(
    'od_working_box_title_style_tabs'
);

$this->start_controls_tab(
    'od_working_box_title_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_working_box_title_normal_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-work-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_working_box_title_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_working_box_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-work-title:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

// Title Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_working_box_title_typography',
        'selector' => '{{WRAPPER}} it-work-title',
    ]
);

// Description Style
$this->add_control(
    'od_working_box_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-work-box p' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_working_box_description_typography',
        'selector' => '{{WRAPPER}} .it-work-box p',
    ]
);


$this->end_controls_section();
