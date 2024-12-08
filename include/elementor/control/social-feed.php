<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_social_feed',
    [
        'label' => __('Content', 'ordainit-toolkit'),
    ]
);



$this->add_control(
    'od_social_feed_lists',
    [
        'label' => esc_html__('Social Feed List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [

            [
                'name' => 'od_social_feed_title',
                'label' => esc_html__('Social Feed', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Social Feed', 'ordainit-toolkit'),
            ],
            [
                'name' => 'od_social_feed_image',
                'label' => esc_html__('Thumbnail Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-5/instagram/insta-1.jpg',
                ],
            ],
            [
                'name' => 'od_social_feed_icon',
                'label' => esc_html__('Icon', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-brands fa-instagram',
                    'library' => 'fa-solid',
                ],
            ],
            [
                'name' => 'od_social_feed_url',
                'label' => esc_html__('URL', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
            ],
        ],
        'default' => [
            [
                'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
            ],
            [
                'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
            ],
            [
                'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
            ],
            [
                'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
            ],
            [
                'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
            ],
            [
                'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_social_feed_title }}}',
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
