<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_portfolio_heading_content',
    [
        'label' => __('Stories Heading Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_portfolio_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Od Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_portfolio_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('Od Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_portfolio_masonry_content',
    [
        'label' => __('Masonry Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_portfolio_masonry_tabs',
    [
        'label' => esc_html__('Masonry Tabs', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_portfolio_masonry_tab_name',
                'label' => esc_html__('Tab Name', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('New Tab', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_portfolio_masonry_tab_filter',
                'label' => esc_html__('Filter Class', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('cat-1', 'ordainit-toolkit'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_portfolio_masonry_tab_name' => esc_html__('All', 'ordainit-toolkit'),
                'od_portfolio_masonry_tab_filter' => '*',
            ],
            [
                'od_portfolio_masonry_tab_name' => esc_html__('Adventure', 'ordainit-toolkit'),
                'od_portfolio_masonry_tab_filter' => 'cat-1',
            ],
            [
                'od_portfolio_masonry_tab_name' => esc_html__('Family Friendly', 'ordainit-toolkit'),
                'od_portfolio_masonry_tab_filter' => 'cat-2',
            ],
        ],
        'title_field' => '{{{ od_portfolio_masonry_tab_name }}}',
    ]
);

$this->add_control(
    'od_portfolio_masonry_items',
    [
        'label' => esc_html__('Masonry Items', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_portfolio_masonry_item_image',
                'label' => esc_html__('Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/destination/in-d-1.jpg',
                ],
            ],
            [
                'name' => 'od_portfolio_masonry_item_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Od Portfolio Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_portfolio_masonry_item_subtitle',
                'label' => esc_html__('Subtitle', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Adventure', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_portfolio_masonry_item_category',
                'label' => esc_html__('Category Classes', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('cat-1', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_portfolio_masonry_item_url',
                'label' => esc_html__('Url', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_portfolio_masonry_item_title' => esc_html__('Discovery Islands', 'ordainit-toolkit'),
                'od_portfolio_masonry_item_category' => 'cat-1',
            ],
            [
                'od_portfolio_masonry_item_title' => esc_html__('Cuba Sailing Adventure', 'ordainit-toolkit'),
                'od_portfolio_masonry_item_category' => 'cat-2',
            ],
            [
                'od_portfolio_masonry_item_title' => esc_html__('Tour in New York', 'ordainit-toolkit'),
                'od_portfolio_masonry_item_category' => 'cat-1 cat-3',
            ],
        ],
        'title_field' => '{{{ od_portfolio_masonry_item_title }}}',
    ]
);


$this->end_controls_section();

$this->start_controls_section(
    'od_portfolio_heading_style',
    [
        'label' => __('Portfolio Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_portfolio_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-portfolio-title-box .it-section-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_portfolio_title_typography',
        'selector' => '{{WRAPPER}} .it-portfolio-title-box .it-section-title',
    ]
);

$this->add_control(
    'od_portfolio_subtitle_color',
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
        'name' => 'od_portfolio_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);

$this->end_controls_section();

// Masonry Btn Style
$this->start_controls_section(
    'od_portfolio_masonry_btn_style',
    [
        'label' => __('Masonry Btn Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_portfolio_masonry_btn_style_tabs'
);

// Active
$this->start_controls_tab(
    'od_portfolio_masonry_btn_style_active_tab',
    [
        'label' => esc_html__('Active', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_portfolio_masonry_btn_hover_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-portfolio-filter .masonary-menu button:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-portfolio-filter .masonary-menu button.active' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_portfolio_masonry_btn_bg_hover_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-portfolio-filter .masonary-menu button:hover' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-portfolio-filter .masonary-menu button.active' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

// Normal
$this->start_controls_tab(
    'od_portfolio_masonry_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_portfolio_masonry_btn_color',
    [
        'label' => esc_html__('Button Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-portfolio-filter .masonary-menu button' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_portfolio_masonry_btn_bg_color',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-portfolio-filter .masonary-menu button' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
