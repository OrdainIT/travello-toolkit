<?php

use Elementor\Controls_Manager;

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
        ],
    ]
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_title_typo',
        'selector' => '{{WRAPPER}} .it-inner-destination .it-dest-title',
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
    ]
);


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_subtitle_typo',
        'selector' => '{{WRAPPER}} .it-inner-destination .it-dest-content span',
    ]
);
$this->add_control(
    'od_destination_arrow_button',
    [
        'label' => esc_html__('Button', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
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
