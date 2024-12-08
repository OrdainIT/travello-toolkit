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
            'layout-4' => esc_html__('Layout-4', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_about_experienct_box',
    [
        'label' => __('About Experience', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_about_experienct_box_switcher',
    [
        'label' => esc_html__('Show/Hide', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->add_control(
    'od_about_experienct_box_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Years', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_about_experienct_box_subtitle',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('of experience in services', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_about_experienct_box_counter',
    [
        'label' => esc_html__('Counter Number', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('25', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_about_experienct_box_counter_symbol',
    [
        'label' => esc_html__('Symbol', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('+', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();
$this->start_controls_section(
    'od_about_image_box',
    [
        'label' => __('About Image', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_about_image_box1',
    [
        'label' => esc_html__('Image 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/about/img/img-1.jpg',
        ],
    ]
);
$this->add_control(
    'od_about_image_box2',
    [
        'label' => esc_html__('Image 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/about/img/img-2.jpg',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-4'],
        ],
    ]
);
$this->add_control(
    'od_about_image_box3',
    [
        'label' => esc_html__('Image 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/about/img/img-3.jpg',
        ],
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-4'],
        ],
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_about_experienced_box4',
    [
        'label' => __('Experience Box', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-4'],
        ],
    ]
);

$this->add_control(
    'od_about_experienced_box4_counter_text',
    [
        'label' => esc_html__('Text', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('years of experience.', 'textdomain'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_about_experienced_box4_counter_number',
    [
        'label' => esc_html__('Counter Number', 'textdomain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('25', 'textdomain'),
        'label_block' => true,
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_about_image_box_shap4',
    [
        'label' => __('Shap', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-4'],
        ],
    ]
);

$this->add_control(
    'od_about_image_box_shap21',
    [
        'label' => esc_html__('Shap 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/about/shape/rocket.png',
        ],
    ]
);

$this->end_controls_section();


$this->start_controls_section(
    'od_about_image_box_shap',
    [
        'label' => __('Shap', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_about_image_box_shap1',
    [
        'label' => esc_html__('Shap 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-3/about/shape/rocket.png',
        ],
    ]
);
$this->add_control(
    'od_about_image_box_shap2',
    [
        'label' => esc_html__('Shap 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ''
        ],
    ]
);
$this->add_control(
    'od_about_image_box_shap3',
    [
        'label' => esc_html__('Shap 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ''
        ],
    ]
);





$this->end_controls_section();

$this->start_controls_section(
    'od_about_experience_box_style',
    [
        'label' => __('Experience Box Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-2', 'layout-4'],
        ],
    ]
);


$this->add_control(
    'od_about_experience_box_area_bg',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-style-2 .it-about-experience-box' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .inner-about-style .it-about-experience' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_about_experience_box_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-style-2 .it-about-experience-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .inner-about-style .it-about-experience-number' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_about_experience_box_title_typography',
        'selector' => '{{WRAPPER}} .it-about-style-2 .it-about-experience-title, {{WRAPPER}} .inner-about-style .it-about-experience-number',
    ]
);

$this->add_control(
    'od_about_experience_box_subtitle_color',
    [
        'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-style-2 .it-about-experience-text' => 'color: {{VALUE}}',
            '{{WRAPPER}} .inner-about-style .it-about-experience i' => 'color: {{VALUE}}',
            '{{WRAPPER}} .inner-about-style .it-about-experience-icon span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_about_experience_box_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-about-style-2 .it-about-experience-text, {{WRAPPER}} .inner-about-style .it-about-experience i',
    ]
);




$this->end_controls_section();
$this->start_controls_section(
    'od_about_image_box_bg',
    [
        'label' => __('BG Color', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
        'condition' => [
            'od_design_style' => ['layout-3'],
        ],
    ]
);

$this->add_control(
    'od_about_image_box_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape::before' => 'border-color: {{VALUE}}',
            '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_about_image_box_border_color',
    [
        'label' => esc_html__('border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-about-style-3 .it-about-thumb-shape::after' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_section();
