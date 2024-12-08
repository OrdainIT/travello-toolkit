<?php

use Elementor\Controls_Manager;

// layout Panel
$this->start_controls_section(
    'od_layout',
    [
        'label' => esc_html__('Testimonial Layout', 'ordainit-toolkit'),
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
            'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Title & Content Section
$this->start_controls_section(
    'od_testimonial_content',
    [
        'label' => __('Testimonial Title & Content', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

// Title
$this->add_control(
    'od_testimonial_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Subtitle
$this->add_control(
    'od_testimonial_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Thumbnail
$this->add_control(
    'od_testimonial_thumbnail_heading',
    [
        'label' => esc_html__('Thumbnail', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_testimonial_thumbnail',
    [
        'label' => esc_html__('Choose Thumbnail Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy//home-2/testimonial/thumb/test-2-1.jpg',
        ],
    ]
);

// Shape
$this->add_control(
    'od_testimonial_shape_heading',
    [
        'label' => esc_html__('Shape Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_testimonial_shape_image_1',
    [
        'label' => esc_html__('Choose Shape 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/testimonial/shape/test-2.1.png',
        ],
    ]
);

$this->add_control(
    'od_testimonial_shape_image_2',
    [
        'label' => esc_html__('Choose Shape 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/testimonial/shape/test-2.2.png',
        ],
    ]
);

$this->end_controls_section();

// Testimonial List Content
$this->start_controls_section(
    'od_testimonial_section_content_list',
    [
        'label' => __('Testimonial Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_lists',
    [
        'label' => esc_html__('Testimonial List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_testimonial_list_description',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Testimonial Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_list_author',
                'label' => esc_html__('Author', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Testimonial Author', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_list_avatar',
                'label' => esc_html__('Choose Image', 'textdomain'),
                'description' => esc_html__('It works for layout - 1 , 3 & 4'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/testimonial/img/avater-1.png',
                ],

            ],
            [
                'name' => 'od_testimonial_list_designation',
                'label' => esc_html__('Designation', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Testimonial Designation', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_testimonial_list_rating',
                'label' => esc_html__('Select Star', 'textdomain'),
                'description' => esc_html__('It works for layout - 1 & 4'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
                'options' => [
                    '1' => esc_html__('1 Star', 'ordainit-toolkit'),
                    '2' => esc_html__('2 Stars', 'ordainit-toolkit'),
                    '3' => esc_html__('3 Stars', 'ordainit-toolkit'),
                    '4' => esc_html__('4 Stars', 'ordainit-toolkit'),
                    '5' => esc_html__('5 Stars', 'ordainit-toolkit'),
                ],

            ],

        ],
        'default' => [
            [
                'od_testimonial_list_author' => esc_html__('Francis Roman', 'ordainit-toolkit'),
            ],
            [
                'od_testimonial_list_author' => esc_html__('Isco Alarcon', 'ordainit-toolkit'),
            ],
            [
                'od_testimonial_list_author' => esc_html__('Sergio Ramos', 'ordainit-toolkit'),
            ],
            [
                'od_testimonial_list_author' => esc_html__('Marco Asensio', 'ordainit-toolkit'),
            ],

        ],
        'title_field' => '{{{ od_testimonial_list_author }}}',
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_testimonial_settings',
    [
        'label' => __('Testimonial Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_slider_autoplay',
    [
        'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();

// Style Section Starts

// Heading Style
$this->start_controls_section(
    'od_testimonial_heading_style',
    [
        'label' => __('Testimonial Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

//Title
$this->add_control(
    'od_testimonial_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_title_typography',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);
//Subtitle
$this->add_control(
    'od_testimonial_subtitle_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);

$this->end_controls_section();

// Testimonial Content Style Starts
$this->start_controls_section(
    'od_testimonial_style',
    [
        'label' => __('Testimonial Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Testi box bg
$this->add_control(
    'od_testimonial_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-item' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .theme-bg' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2']
        ],
    ]
);

// Content Style
$this->add_control(
    'od_testimonial_content_style_heading',
    [
        'label' => esc_html__('Content Style', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

// Description Style
$this->add_control(
    'od_testimonial_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-dsc p' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-2-dsc i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-4-avater-box p' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_description_typography',
        'selector' => '{{WRAPPER}} .it-testimonial-dsc p, {{WRAPPER}} .it-testi-2-dsc i, {{WRAPPER}} .it-testi-4-avater-box p',
    ]
);

// Author Style
$this->add_control(
    'od_testimonial_author_color',
    [
        'label' => esc_html__('Author Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-avater-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-2-avater-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-4-avater-title' => 'color: {{VALUE}}',

        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_author_typography',
        'selector' => '{{WRAPPER}} .it-testimonial-avater-title, {{WRAPPER}} .it-testi-2-avater-title, {{WRAPPER}} .it-testi-4-avater-title',
    ]
);

// Designation Style
$this->add_control(
    'od_testimonial_designation_color',
    [
        'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-avater-designation' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-2-avater-info span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-4-designation-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_designation_typography',
        'selector' => '{{WRAPPER}} .it-testimonial-avater-designation, {{WRAPPER}} .it-testi-2-avater-info span, {{WRAPPER}} .it-testi-4-designation-title',
    ]
);

$this->add_control(
    'hr-2',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

// Rating star style
$this->add_control(
    'od_testimonial_star_color',
    [
        'label' => esc_html__('Rating Star Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-rating span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-4-designation-review span' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->add_control(
    'od_testimonial_star_font_size',
    [
        'label' => esc_html__('Star Font Size', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SLIDER,
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
            'size' => 15,
        ],
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-rating span' => 'font-size: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .it-testi-4-designation-review span' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-4']
        ],
    ]
);

$this->add_control(
    'hr-3',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);


// Quote Color
$this->add_control(
    'od_testimonial_quote_color',
    [
        'label' => esc_html__('Quote Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-avater-icon i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-2-avater-quote i' => 'color: {{VALUE}}',

        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2']
        ],
    ]
);
$this->add_control(
    'od_testimonial_quote_bg_color',
    [
        'label' => esc_html__('Quote Icon BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testimonial-avater-icon i' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->end_controls_section();


// Arrow Style
$this->start_controls_section(
    'od_testimonial_arrow_style',
    [
        'label' => __('Testimonial Arrow Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-3']
        ],
    ]
);

$this->start_controls_tabs(
    'od_testimonial_arrow_style_tabs'
);

$this->start_controls_tab(
    'od_testimonial_arrow_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'textdomain'),
    ]
);
$this->add_control(
    'od_testimonial_arrow_style_normal_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_testimonial_arrow_style_normal_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_testimonial_arrow_style_normal_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();

$this->start_controls_tab(
    'od_testimonial_arrow_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'textdomain'),
    ]
);
$this->add_control(
    'od_testimonial_arrow_style_hover_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_testimonial_arrow_style_hover_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_testimonial_arrow_style_hover_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-2-arrow-box .testi-2-prev:hover' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
