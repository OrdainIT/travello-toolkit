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

$this->start_controls_section(
    'od_destination_title_content',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_destination_title_content_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Explore the Beautiful Places Around World', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);
$this->add_control(
    'od_destination_title_content_subtitle',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('DESTINATION LIST', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);
$this->add_control(
    'od_destination_title_content_description',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do..', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);

$this->add_control(
    'od_destination_title_content_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Button Text', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);
$this->add_control(
    'od_destination_title_content_btn_url',
    [
        'label' => esc_html__('Button URL', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);





$this->end_controls_section();





$this->start_controls_section(
    'od_destination_slider_contnet',
    [
        'label' => __('Slider Lists', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_destination_slider_content_wrap',
    [
        'label' => esc_html__('Slider List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_destination_slider_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_destination_slider_subtitle',
                'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_destination_slider_url',
                'label' => esc_html__('URL', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_destination_slider_image',
                'label' => esc_html__('Slider Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/destination/img/img-1.jpg',
                ],
            ],
        ],
        'default' => [
            [
                'od_destination_slider_title' => esc_html__('Europe', 'ordainit-toolkit'),
            ],
            [
                'od_destination_slider_title' => esc_html__('North America', 'ordainit-toolkit'),
            ],
            [
                'od_destination_slider_title' => esc_html__('South Africa', 'ordainit-toolkit'),
            ],
            [
                'od_destination_slider_title' => esc_html__('Costa Rica', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_destination_slider_title }}}',
    ]
);








$this->end_controls_section();




$this->start_controls_section(
    'od_destination_slider_setttings',
    [
        'label' => __('Slider Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_slider_autoplay_switcher',
    [
        'label' => esc_html__('Autoplay On/Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->end_controls_section();

$this->start_controls_section(
    'od_destination_slider_style',
    [
        'label' => __('Slider Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_destination_slider_bg_overlay_color',
    [
        'label' => esc_html__('BG Overlay Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-item::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_destination_slider_title_heading',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_destination_slider_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-title:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_title_typo',
        'selector' => '{{WRAPPER}} .it-destination-title',
    ]
);

$this->add_control(
    'od_destination_slider_subtitle_heading',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_destination_slider_subtitle_color',
    [
        'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-content span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_subtitle_typo',
        'selector' => '{{WRAPPER}} .it-destination-content span',
    ]
);




$this->end_controls_section();
