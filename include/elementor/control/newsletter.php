<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_newsletter_title_content',
    [
        'label' => __('Title Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_newsletter_title_content_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Join Our Newsletter', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_newsletter_title_content_subtitle',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Subscribe our newsletter to get our latest update & news.', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);



$this->end_controls_section();

$this->start_controls_section(
    'od_newsletter_title_content_shape',
    [
        'label' => __('shape', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_newsletter_title_content_shape_1',
    [
        'label' => esc_html__('Image 1', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy//home-2/newsletter/shape-2-1.png',
        ],
    ]
);

$this->add_control(
    'od_newsletter_title_content_shape_2',
    [
        'label' => esc_html__('Image 2', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/newsletter/shape-2-2.png',
        ],
    ]
);

$this->add_control(
    'od_newsletter_title_content_shape_3',
    [
        'label' => esc_html__('Image 3', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/newsletter/shape-2-3.png',
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_newsletter_contact_form',
    [
        'label' => __('Contact Form', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_newsletter_contact_form_list',
    [
        'label'   => esc_html__('Select Form', 'odcore'),
        'type'    => Controls_Manager::SELECT,
        'default' => '0',
        'options' => $this->get_od_contact_form(),
    ]
);



$this->end_controls_section();

$this->start_controls_section(
    'od_newsletter_style',
    [
        'label' => __('Newsletter Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_newsletter_bg_color',
    [
        'label' => esc_html__('Newsletter BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .theme-bg-2' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_newsletter_title_color',
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
        'name' => 'od_newsletter_title_typography',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);

$this->add_control(
    'od_newsletter_subtitle_color',
    [
        'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-newsletter-left span' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Sub Title Typography', 'ordainit-toolkit'),
        'name' => 'od_newsletter_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-newsletter-left span',
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_newsletter_contact_form_style',
    [
        'label' => __('Newsletter Form Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_newsletter_contact_form_input_bg_color',
    [
        'label' => esc_html__('Input BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-newsletter-right input' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_newsletter_contact_form_placeholder_color',
    [
        'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-newsletter-right input::placeholder' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Placeholder Typography', 'ordainit-toolkit'),
        'name' => 'od_newsletter_contact_form_placeholder_typography',
        'selector' => '{{WRAPPER}} .it-newsletter-right input',
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->start_controls_tabs(
    'od_newsletter_contact_form_style_tabs'
);

$this->start_controls_tab(
    'od_newsletter_contact_form_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_newsletter_contact_form_btn_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_newsletter_contact_form_btn_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_newsletter_contact_form_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_newsletter_contact_form_btn_hover_color',
    [
        'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_newsletter_contact_form_btn_hover_bg_color',
    [
        'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_newsletter_contact_form_btn_typography',
        'selector' => '{{WRAPPER}} .it-btn-secondary',
    ]
);

$this->end_controls_section();
