<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_contact_form_section',
    [
        'label' => __('Contact Form', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_select_contact_form',
    [
        'label'   => esc_html__('Select Form', 'odcore'),
        'type'    => Controls_Manager::SELECT,
        'default' => '0',
        'options' => $this->get_od_contact_form(),
    ]
);





$this->end_controls_section();

$this->start_controls_section(
    'od_contact_form_style',
    [
        'label' => __('Contact Form Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_contact_form_form_placeholder_color',
    [
        'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-contact-input-box input::placeholder' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-contact-textarea-box textarea::placeholder' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Placeholder Typography', 'ordainit-toolkit'),
        'name' => 'od_contact_form_placeholder_typography',
        'selector' => '{{WRAPPER}} .it-contact-input-box input, {{WRAPPER}} .it-contact-textarea-box textarea',
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->start_controls_tabs(
    'od_contact_form_style_tabs'
);

$this->start_controls_tab(
    'od_contact_form_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_contact_form_btn_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_contact_form_btn_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_contact_form_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_contact_form_btn_hover_color',
    [
        'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_contact_form_btn_hover_bg_color',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_contact_form_btn_typography',
        'selector' => '{{WRAPPER}} .it-btn-primary',
    ]
);

$this->end_controls_section();
