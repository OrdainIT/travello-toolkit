<?php

use Elementor\Controls_Manager;

// Button Type Section
$this->start_controls_section(
    'od_btn_type',
    [
        'label' => __('Button Types', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_class',
    [
        'label' => __('Button Type', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'it-btn-primary' => __('Primary', 'ordainit-toolkit'),
            'it-btn-secondary' => __('Secondary', 'ordainit-toolkit'),
        ],
        'default' => 'it-btn-primary',
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Button Content Section
$this->start_controls_section(
    'od_btn_content',
    [
        'label' => __('Button Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Button', 'ordainit-toolkit'),
        'title' => esc_html__('Enter button text', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_link_type',
    [
        'label' => esc_html__('Button Link Type', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            '1' => 'Custom Link',
            '2' => 'Internal Page',
        ],
        'default' => '1',
        'label_block' => true,
    ]
);

$this->add_control(
    'od_btn_link',
    [
        'label' => esc_html__('Button link', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'dynamic' => [
            'active' => true,
        ],
        'placeholder' => esc_html__('htods://your-link.com', 'ordainit-toolkit'),
        'show_external' => false,
        'default' => [
            'url' => '#',
            'is_external' => true,
            'nofollow' => true,
            'custom_attributes' => '',
        ],
        'condition' => [
            'od_btn_link_type' => '1',
        ],
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_page_link',
    [
        'label' => esc_html__('Select Button Page', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => od_get_all_pages(),
        'condition' => [
            'od_btn_link_type' => '2',
        ]
    ]
);

$this->end_controls_section();

// Style Section Starts
$this->start_controls_section(
    'od_btn_style',
    [
        'label' => __('Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_responsive_control(
    'od_btn_padding',
    [
        'label' => esc_html__('Button Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => '20',
            'right' => '30',
            'bottom' => '20',
            'left' => '30',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .it-btn-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'od_btn_border_radius',
    [
        'label' => esc_html__('Border Radius', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => '5',
            'right' => '5',
            'bottom' => '5',
            'left' => '5',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .it-btn-secondary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);



$this->start_controls_tabs(
    'od_btn_style_tabs'
);

$this->start_controls_tab(
    'od_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_normal_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_btn_style_normal_bgcolor',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'background-color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_hover_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary:hover' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_btn_style_hover_bgcolor',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'background-color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary:hover' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_button_typography',
        'selector' => '{{WRAPPER}} .it-btn-primary, {{WRAPPER}} .it-btn-secondary',
    ]
);



$this->end_controls_section();
