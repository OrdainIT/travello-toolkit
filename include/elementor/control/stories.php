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

// Style Starts

$this->start_controls_section(
    'od_stories_heading_style',
    [
        'label' => __('Stories Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_stories_title_color',
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
        'name' => 'od_stories_title_typography',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);

$this->add_control(
    'od_stories_subtitle_color',
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
        'label' => esc_html__('SubTitle Typography', 'ordainit-toolkit'),
        'name' => 'od_stories_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);

$this->end_controls_section();

// Masonry tab Btn Style
$this->start_controls_section(
    'od_stories_masonry_tab_btn_style',
    [
        'label' => __('Masonry Tab Btn Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_stories_masonry_tab_btn_style_tabs'
);

// Active
$this->start_controls_tab(
    'od_stories_masonry_tab_btn_style_active_tab',
    [
        'label' => esc_html__('Active', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_stories_masonry_tab_btn_hover_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .masonary-menu button:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .masonary-menu button.active' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_stories_masonry_tab_btn_bg_hover_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .masonary-menu button:hover' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .masonary-menu button.active' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Normal
$this->start_controls_tab(
    'od_stories_masonry_tab_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_stories_masonry_tab_btn_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .masonary-menu button' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_stories_masonry_tab_btn_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .masonary-menu button' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

// Masonry Content Style
$this->start_controls_section(
    'od_stories_masonry_content_style',
    [
        'label' => __('Masonry Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

//Title
$this->add_control(
    'od_stories_masonry_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-stories-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_stories_masonry_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-stories-item:hover .it-stories-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_stories_masonry_title_typography',
        'selector' => '{{WRAPPER}} .it-stories-title',
    ]
);

// Subtitle
$this->add_control(
    'od_stories_masonry_subtitle_heading',
    [
        'label' => esc_html__('Subtitle Style', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->start_controls_tabs(
    'od_stories_masonry_subtitle_style_tabs'
);

$this->start_controls_tab(
    'od_stories_masonry_subtitle_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_stories_masonry_subtitle_style_normal_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-stories-categories' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_stories_masonry_subtitle_style_normal_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-stories-categories' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_stories_masonry_subtitle_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_stories_masonry_subtitle_style_hover_color',
    [
        'label' => esc_html__('Subtitle Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-stories-categories:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_stories_masonry_subtitle_style_hover_bg_color',
    [
        'label' => esc_html__('Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-stories-categories:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_stories_masonry_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-stories-categories',
    ]
);

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

// Published Date
$this->add_control(
    'od_stories_masonry_published_date_color',
    [
        'label' => esc_html__('Date Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-stories-meta-text' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Date Typography', 'ordainit-toolkit'),
        'name' => 'od_stories_masonry_published_date_typography',
        'selector' => '{{WRAPPER}} .it-stories-meta-text',
    ]
);

$this->end_controls_section();
