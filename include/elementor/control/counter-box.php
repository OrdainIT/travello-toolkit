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

// Icon Type Section
$this->start_controls_section(
    'od_counter_box_icon_type',
    [
        'label' => __('Icon Types', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_control(
    'od_counter_box_icon_class',
    [
        'label' => __('Select Icon', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'flaticon-journey' => __('Journey', 'ordainit-toolkit'),
            'flaticon-camping' => __('Camping', 'ordainit-toolkit'),
            'flaticon-travel' => __('Travel', 'ordainit-toolkit'),
            'flaticon-luggage' => __('Luggage', 'ordainit-toolkit'),
        ],
        'default' => 'flaticon-journey',
        'label_block' => true,
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
    'od_counter_box_icon',
    [
        'label' => esc_html__('Icon Switcher', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2']
        ],
    ]
);

$this->add_control(
    'od_counter_box_icon_switcher',
    [
        'label' => esc_html__('Icon Show / Hide', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();


// Style Section

$this->start_controls_section(
    'od_counter_box_style',
    [
        'label' => __('Counter Box Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]

);

// Counter Box background
$this->add_control(
    'od_counter_box_bg_color',
    [
        'label' => esc_html__('Counter Box BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-funfact-2 .it-funfact-item' => 'background-color: {{VALUE}}',

        ],
    ]
);

$this->add_control(
    'od_counter_box_border_color',
    [
        'label' => esc_html__('Counter Box border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-funfact-2 .it-funfact-item' => 'border-color: {{VALUE}}',

        ],
    ]
);


$this->end_controls_section();

// Counter Box before bg
$this->start_controls_section(
    'od_counter_box_before_style',
    [
        'label' => __('Counter Box Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-3']
        ],
    ]

);

$this->add_control(
    'od_counter_box_before_bg_color',
    [
        'label' => esc_html__('Counter Box Before BG', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-funfact-4 .it-funfact-text::before' => 'background-color: {{VALUE}}',

        ],
    ]
);

$this->end_controls_section();

//Content Style
$this->start_controls_section(
    'od_counter_box_content_style',
    [
        'label' => __('Counter Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// icon Style
$this->add_control(
    'od_counter_box_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-funfact-icon span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-funfact-2 .it-funfact-icon' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2']
        ],
    ]
);
// Font Size
$this->add_control(
    'od_counter_box_font_size',
    [
        'label' => esc_html__('Icon Font Size', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', 'em', 'rem'], // Specify the units you want to support
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 100,
                'step' => 1,
            ],
            'em' => [
                'min' => 0.5,
                'max' => 10,
                'step' => 0.1,
            ],
            'rem' => [
                'min' => 0.5,
                'max' => 10,
                'step' => 0.1,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .it-funfact-2 .it-funfact-icon' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],

    ]
);

$this->add_control(
    'od_counter_box_divider',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
        'style' => 'solid',
    ]
);

// Value/Sub Text , icon Style
$this->add_control(
    'od_counter_box_value_color',
    [
        'label' => esc_html__('Value + SubText Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-funfact-number' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Value Typography', 'ordainit-toolkit'),
        'name' => 'od_counter_box_value_typography',
        'selector' => '{{WRAPPER}} .it-funfact-number',
    ]
);

// Title Style
$this->add_control(
    'od_counter_box_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-funfact-text p' => 'color: {{VALUE}}',

        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_counter_box_title_typography',
        'selector' => '{{WRAPPER}} .it-funfact-text p',
    ]
);




$this->end_controls_section();
