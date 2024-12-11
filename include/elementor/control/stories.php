<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_stories_heading_content',
    [
        'label' => __('Stories Heading Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_stories_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Od Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_stories_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Od Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();


// Masonry Content Starts
$this->start_controls_section(
    'od_stories_masonry_content',
    [
        'label' => __('Masonry Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_stories_masonry_tabs',
    [
        'label' => esc_html__('Masonry Tabs', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_stories_masonry_tab_name',
                'label' => esc_html__('Tab Name', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('New Tab', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_stories_masonry_tab_filter',
                'label' => esc_html__('Filter Class', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('cat-1', 'ordainit-toolkit'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_stories_masonry_tab_name' => esc_html__('All', 'ordainit-toolkit'),
                'od_stories_masonry_tab_filter' => '*',
            ],
            [
                'od_stories_masonry_tab_name' => esc_html__('Inspiration', 'ordainit-toolkit'),
                'od_stories_masonry_tab_filter' => 'sto-1',
            ],
            [
                'od_stories_masonry_tab_name' => esc_html__('Lifestyle', 'ordainit-toolkit'),
                'od_stories_masonry_tab_filter' => 'sto-2',
            ],
            [
                'od_stories_masonry_tab_name' => esc_html__('Food', 'ordainit-toolkit'),
                'od_stories_masonry_tab_filter' => 'sto-3',
            ],
        ],
        'title_field' => '{{{ od_stories_masonry_tab_name }}}',
    ]
);

$this->add_control(
    'od_stories_masonry_items',
    [
        'label' => esc_html__('Masonry Items', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_stories_masonry_item_image',
                'label' => esc_html__('Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-5/stories/stories-2.jpg',
                ],
            ],
            [
                'name' => 'od_stories_masonry_item_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Od Portfolio Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_stories_masonry_item_subtitle',
                'label' => esc_html__('Subtitle', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Inspiration', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_stories_masonry_item_published_date',
                'label' => esc_html__('Published Date', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Aug 04, 1994', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_stories_masonry_item_category',
                'label' => esc_html__('Category Classes', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('sto-1', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_stories_masonry_item_url',
                'label' => esc_html__('Url', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_stories_masonry_item_title' => esc_html__('Top 10 remote destinations to see in your lifetime', 'ordainit-toolkit'),
                'od_stories_masonry_item_category' => 'sto-1',
            ],
            [
                'od_stories_masonry_item_title' => esc_html__('Top 10 Cloud destinations to see in your lifetime', 'ordainit-toolkit'),
                'od_stories_masonry_item_category' => 'sto-2',
            ],
            [
                'od_stories_masonry_item_title' => esc_html__('Top 10 Jungle destinations to see in your lifetime', 'ordainit-toolkit'),
                'od_stories_masonry_item_category' => 'sto-1 sto-3',
            ],
        ],
        'title_field' => '{{{ od_stories_masonry_item_title }}}',
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
