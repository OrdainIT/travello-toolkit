<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_slider_content',
    [
        'label' => __('Slider', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_slider_content_lists',
    [
        'label' => esc_html__('Slider List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_slider_content_list_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_slider_content_list_subtitle',
                'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Memories For Life', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_slider_content_list_image',
                'label' => esc_html__('Slider Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/slider/slider-1-2.jpg',
                ],
            ]
        ],
        'default' => [
            [
                'od_slider_content_list_title' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
            ],
            [
                'od_slider_content_list_title' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
            ],
            [
                'od_slider_content_list_title' => esc_html__('Lets Explore the world', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_slider_content_list_title }}}',
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
