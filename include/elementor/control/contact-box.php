<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_contact_box_content',
    [
        'label' => __('Contact Box Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_contact_box_icon',
    [
        'label' => __('Icon', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('flaticon-chat', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Icon Here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_contact_box_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Emergency', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Title Here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_contact_box_phone',
    [
        'label' => __('Phone', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('(+99) 012356987', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Phone no. Here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_contact_box_style',
    [
        'label' => __('Contact Box Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_contact_box_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-icon i' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_contact_box_icon_font_size',
    [
        'label' => esc_html__('Icon Font Size', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', 'em', 'rem'], // Units available
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 100,
                'step' => 1,
            ],
            'em' => [
                'min' => 0.5,
                'max' => 5,
                'step' => 0.1,
            ],
            'rem' => [
                'min' => 0.5,
                'max' => 5,
                'step' => 0.1,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 50,
        ],
        'selectors' => [
            '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'od_contact_box_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_contact_box_title_typography',
        'selector' => '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text span',
    ]
);

$this->add_control(
    'od_contact_box_phone_color',
    [
        'label' => esc_html__('Phone Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text a' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Phone Typography', 'ordainit-toolkit'),
        'name' => 'od_contact_box_phone_typography',
        'selector' => '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text a',
    ]
);

$this->end_controls_section();
