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
    'od_newsletter_title_content_shap',
    [
        'label' => __('Shap', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_newsletter_title_content_shap_1',
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
    'od_newsletter_title_content_shap_2',
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
    'od_newsletter_title_content_shap_3',
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
