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



// Style Starts
$this->start_controls_section(
    'od_slider_content_style',
    [
        'label' => __('Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_slider_content_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slider-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_slider_content_title_typography',
        'selector' => '{{WRAPPER}} .it-slider-title',
    ]
);

$this->add_control(
    'od_slider_content_subtitle_color',
    [
        'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Sub Title Typography', 'ordainit-toolkit'),
        'name' => 'od_slider_content_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);


$this->end_controls_section();

$this->start_controls_section(
    'od_slider_content_form_style',
    [
        'label' => __('Content Form Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_slider_content_form_bg_color',
    [
        'label' => esc_html__('Form BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-tour-package-box' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_slider_content_form_package_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-tour-package-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-tour-package-icon i' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_slider_content_form_package_title_typography',
        'selector' => '{{WRAPPER}} .it-tour-package-title',
    ]
);

$this->add_control(
    'od_slider_content_form_placeholder_color',
    [
        'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-tour-package-text input::placeholder' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Placeholder Typography', 'ordainit-toolkit'),
        'name' => 'od_slider_content_form_placeholder_typography',
        'selector' => '{{WRAPPER}} .it-tour-package-text input',
    ]
);

$this->add_control(
    'od_slider_content_form_btn_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slider-tour-style .it-tour-package-search button' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_slider_content_form_btn_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slider-tour-style .it-tour-package-search button' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();
