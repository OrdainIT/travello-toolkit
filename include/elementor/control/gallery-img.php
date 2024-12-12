<?php

use Elementor\Controls_Manager;


// Testimonial List Content
$this->start_controls_section(
    'od_gallery_section_content_list',
    [
        'label' => __('Galley Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_gallery_lists',
    [
        'label' => esc_html__('Gallery List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_gallery_list_thumbnail',
                'label' => esc_html__('Choose Gallery Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/gallery/gallery-1-1.jpg',
                ],
            ],

        ],
        'title_field' => 'Gallery',
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


$this->end_controls_section();
