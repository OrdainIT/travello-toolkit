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
    'section_style',
    [
        'label' => __('Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'text_transform',
    [
        'label' => __('Text Transform', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'default' => '',
        'options' => [
            '' => __('None', 'ordainit-toolkit'),
            'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
            'lowercase' => __('lowercase', 'ordainit-toolkit'),
            'capitalize' => __('Capitalize', 'ordainit-toolkit'),
        ],
        'selectors' => [
            '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();
