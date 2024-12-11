<?php

use Elementor\Controls_Manager;

// layout Panel
$this->start_controls_section(
    'od_destination_layout',
    [
        'label' => esc_html__('Destination Layout', 'ordainit-toolkit'),
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


$this->start_controls_section(
    'od_destination_content',
    [
        'label' => __('Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_content_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Discovery Islands', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_destination_content_subtitle',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Adventure', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_destination_content_tour_count',
    [
        'label' => esc_html__('Tour Count', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('30', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);
$this->add_control(
    'od_destination_content_traveler_count',
    [
        'label' => esc_html__('Traveler Count', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('150', 'ordainit-toolkit'),
        'label_block' => true,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);
$this->add_control(
    'od_destination_content_url',
    [
        'label' => esc_html__('URL', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_destination_content_thumbnail',
    [
        'label' => esc_html__('Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/destination/in-d-1.jpg',
        ],
    ]
);





$this->end_controls_section();

$this->start_controls_section(
    'od_destination_style',
    [
        'label' => __('Content', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


$this->add_control(
    'od_destination_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-inner-destination .it-dest-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-destination-list-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-inner-destination .it-dest-title:hover a' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-destination-list-title:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_title_typo',
        'selector' => '{{WRAPPER}} .it-inner-destination .it-dest-title, {{WRAPPER}} .it-destination-list-title',
    ]
);

$this->add_control(
    'od_destination_subtitle_color',
    [
        'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-inner-destination .it-dest-content span' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_subtitle_typo',
        'selector' => '{{WRAPPER}} .it-inner-destination .it-dest-content span',
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

// Tour Count Style
$this->add_control(
    'od_destination_tour_count_color',
    [
        'label' => esc_html__('Tour Count Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-list-number' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);
$this->add_control(
    'od_destination_tour_count_bg_color',
    [
        'label' => esc_html__('Tour Count BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-list-number' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_tour_count_typo',
        'selector' => '{{WRAPPER}} .it-destination-list-number',
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

// Traveler Count Style
$this->add_control(
    'od_destination_traveler_count_color',
    [
        'label' => esc_html__('Traveler Count Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-list-departures' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_traveler_count_typo',
        'selector' => '{{WRAPPER}} .it-destination-list-departures',
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);


$this->end_controls_section();



// Arrow Button Style

$this->start_controls_section(
    'od_destination_btn_sty',
    [
        'label' => __('Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->start_controls_tabs(
    'od_destination_arrow_button_tabs'
);

// Normal

$this->start_controls_tab(
    'od_destination_arrow_button_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_arrow_button_normal_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-inner-destination .it-dest-icon a' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_arrow_button_normal_text_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-inner-destination .it-dest-icon a' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_destination_arrow_button_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_arrow_button_hover_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-inner-destination .it-dest-icon a:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_arrow_button_hover_text_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-inner-destination .it-dest-icon a:hover' => 'color: {{VALUE}}',
        ],
    ]
);


$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
