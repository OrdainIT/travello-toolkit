<?php

use Elementor\Controls_Manager;

// layout Panel
$this->start_controls_section(
    'od_team_layout',
    [
        'label' => esc_html__('Team Layout', 'ordainit-toolkit'),
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
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

// Testimonial List Content
$this->start_controls_section(
    'od_team_section_content_list',
    [
        'label' => __('Team Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_lists',
    [
        'label' => esc_html__('Team List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_team_list_thumbnail',
                'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/team/team-1-3.jpg',
                ],
            ],
            [
                'name' => 'od_team_list_author',
                'label' => esc_html__('Author', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Testimonial Author', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_team_list_url',
                'label' => esc_html__('Url', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_team_list_designation',
                'label' => esc_html__('Designation', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Testimonial Designation', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_team_list_facebook_url',
                'label' => esc_html__('Facebook Url', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'description' => esc_html__('It works only for layout - 1'),
                'label_block' => true,
            ],
            [
                'name' => 'od_team_list_twitter_url',
                'label' => esc_html__('Twitter Url', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'description' => esc_html__('It works only for layout - 1'),
                'label_block' => true,
            ],
            [
                'name' => 'od_team_list_skype_url',
                'label' => esc_html__('Skype Url', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'description' => esc_html__('It works only for layout - 1'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'od_team_list_author' => esc_html__('Francis Roman', 'ordainit-toolkit'),
            ],
            [
                'od_team_list_author' => esc_html__('Isco Alarcon', 'ordainit-toolkit'),
            ],
            [
                'od_team_list_author' => esc_html__('Sergio Ramos', 'ordainit-toolkit'),
            ],
            [
                'od_team_list_author' => esc_html__('Marco Asensio', 'ordainit-toolkit'),
            ],

        ],
        'title_field' => '{{{ od_team_list_author }}}',
    ]
);

$this->end_controls_section();

// Team slider settings
$this->start_controls_section(
    'od_team_slider_settings',
    [
        'label' => __('Team Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_slider_autoplay',
    [
        'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();

// Style Starts

$this->start_controls_section(
    'od_team_slider_style',
    [
        'label' => __('Team Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_team_slider_style_tabs'
);

$this->start_controls_tab(
    'od_team_slider_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_slider_author_color',
    [
        'label' => esc_html__('Author Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-team-title:hover a' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_slider_designation_color',
    [
        'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-designation' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_slider_item_bg_color',
    [
        'label' => esc_html__('Item BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_team_slider_social_color',
    [
        'label' => esc_html__('Social Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);
$this->add_control(
    'od_team_slider_social_bg_color',
    [
        'label' => esc_html__('Social BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_team_slider_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_slider_author_hover_color',
    [
        'label' => esc_html__('Author Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover .it-team-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-team-style-3 .it-team-title:hover a' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_slider_designation_hover_color',
    [
        'label' => esc_html__('Designation Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover .it-team-designation' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-team-designation:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_slider_item_hover_bg_color',
    [
        'label' => esc_html__('Item BG Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_team_slider_social_hover_color',
    [
        'label' => esc_html__('Social Icon Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a:hover' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_team_slider_social_hover_bg_color',
    [
        'label' => esc_html__('Social BG Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a:hover' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

// Typography

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
        'name' => 'od_team_slider_author_typography',
        'selector' => '{{WRAPPER}} .it-team-title',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
        'name' => 'od_team_slider_designation_typography',
        'selector' => '{{WRAPPER}} .it-team-designation',
    ]
);


$this->add_control(
    'hr_2',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->add_control(
    'od_team_slider_social_box_bg_color',
    [
        'label' => esc_html__('Social Box BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box' => 'background-color: {{VALUE}}',
        ],
        'condition' => [
            'od_design_style' => ['layout-1']
        ],
    ]
);

$this->end_controls_section();
