<?php

use Elementor\Controls_Manager;

// Testimonial Content
$this->start_controls_section(
    'od_testimonial_single_content',
    [
        'label' => __('Content hello', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_testimonial_single_description',
    [
        'label' => __('Description', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__('OD Testimonial Description', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your Description here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_testimonial_single_author',
    [
        'label' => __('Author', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Author Name', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Author Name here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_testimonial_single_designation',
    [
        'label' => __('Designation', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Designation', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Author Designation here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_testimonial_single_avatar',
    [
        'label' => esc_html__('Choose Avatar', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/testimonial/in-testi-2-1.png',
        ],
    ]
);


$this->end_controls_section();

$this->start_controls_section(
    'od_testimonial_single_style',
    [
        'label' => __('Testimonial Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


// Description Style
$this->add_control(
    'od_testimonial_single_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc p' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_testimonial_single_description_bg_color',
    [
        'label' => esc_html__('Description BG', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc::after' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_single_description_typography',
        'selector' => '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc p',
    ]
);

// Author Style
$this->add_control(
    'od_testimonial_single_author_color',
    [
        'label' => esc_html__('Author Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_single_author_typography',
        'selector' => '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-title',
    ]
);

// Designation Style
$this->add_control(
    'od_testimonial_single_designation_color',
    [
        'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-desig' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
        'name' => 'od_testimonial_single_designation_typography',
        'selector' => '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-desig',
    ]
);


$this->end_controls_section();
