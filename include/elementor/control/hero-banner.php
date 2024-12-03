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

// Title & COntent
$this->start_controls_section(
    'od_section_content',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Title', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Description', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);


$this->end_controls_section();

// Button
$this->start_controls_section(
    'od_section_button',
    [
        'label' => __('Button', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Button Text', 'ordainit-toolkit'),
        'title' => esc_html__('Enter button text', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_link_type',
    [
        'label' => esc_html__('Button Link Type', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            '1' => 'Custom Link',
            '2' => 'Internal Page',
        ],
        'default' => '1',
        'label_block' => true,
    ]
);

$this->add_control(
    'od_btn_link',
    [
        'label' => esc_html__('Button link', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'dynamic' => [
            'active' => true,
        ],
        'placeholder' => esc_html__('htods://your-link.com', 'ordainit-toolkit'),
        'show_external' => false,
        'default' => [
            'url' => '#',
            'is_external' => true,
            'nofollow' => true,
            'custom_attributes' => '',
        ],
        'condition' => [
            'od_btn_link_type' => '1',
        ],
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_page_link',
    [
        'label' => esc_html__('Select Button Page', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => od_get_all_pages(),
        'condition' => [
            'od_btn_link_type' => '2',
        ]
    ]
);

$this->end_controls_section();

// Thumbnail
$this->start_controls_section(
    'od_section_thumbnail',
    [
        'label' => __('Thumbnail', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_thumbnail_image',
    [
        'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/about/thumb/about-3-1.png',
        ],
    ]
);
$this->add_control(
    'od_thumbnail_image_2',
    [
        'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/hero/thumb/hero-sm-thumb.jpg',
        ],
        'condition' => [
            'od_design_style' => ['layout-2']
        ],
    ]
);

$this->end_controls_section();

// Shape
$this->start_controls_section(
    'od_section_shape',
    [
        'label' => __('Shape', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_shape_image_1',
    [
        'label' => esc_html__('Choose Shape 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/about/shape/rocket.png',
        ],
    ]
);

$this->add_control(
    'od_shape_image_2',
    [
        'label' => esc_html__('Choose Shape 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/cloud.png',
        ],
    ]
);

$this->add_control(
    'od_shape_image_3',
    [
        'label' => esc_html__('Choose Shape 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/cloud.png',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->end_controls_section();

// Banner Section Style
$this->start_controls_section(
    'od_banner_section_style',
    [
        'label' => __('Section BG Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_banner_section_bgcolor',
    [
        'label' => esc_html__('Banner BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .grey-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

// Title & Content Style
$this->start_controls_section(
    'od_title_content_style',
    [
        'label' => __('Title & Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Title Style
$this->add_control(
    'od_title_color',
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
        'name' => 'od_title_typography',
        'selector' => '{{WRAPPER}} .it-slider-title',
    ]
);

// SubTitle Style
$this->add_control(
    'od_subtitle_color',
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
        'name' => 'od_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);

// Description Style
$this->add_control(
    'od_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-hero-title-box p' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
        'name' => 'od_description_typography',
        'selector' => '{{WRAPPER}} .it-hero-title-box p',
    ]
);

$this->end_controls_section();



// Button Style
$this->start_controls_section(
    'od_btn_style',
    [
        'label' => __('Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_btn_style_tabs'
);

$this->start_controls_tab(
    'od_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_normal_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_btn_style_normal_bgcolor',
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
    'od_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_hover_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_btn_style_hover_bgcolor',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_button_typography',
        'selector' => '{{WRAPPER}} .it-btn-primary',
    ]
);

$this->end_controls_section();

// Thumbnail Shape Style
$this->start_controls_section(
    'od_thumbnail_shape_style',
    [
        'label' => __('Thumbnail Shape Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_thumbnail_shape_bgcolor',
    [
        'label' => esc_html__('Shape BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape::before, .it-about-style-3 .it-about-thumb-shape::after' => 'border-color: {{VALUE}}',
            '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape::after' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();
