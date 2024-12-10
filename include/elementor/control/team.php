<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_team_single_content',
    [
        'label' => __('Team Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_single_thumbnail',
    [
        'label' => esc_html__('Choose Thumbnail', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/team/team-1-1.jpg',
        ],
    ]
);

$this->add_control(
    'od_team_single_author',
    [
        'label' => __('Author', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Author Name', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Author Name here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_team_single_url',
    [
        'label' => esc_html__('URL', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_team_single_designation',
    [
        'label' => __('Designation', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Designation', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type Author Designation here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_team_single_social_lists',
    [
        'label' => esc_html__('Social Icon', 'textdomain'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_team_single_social_title',
                'label' => esc_html__('OD Social Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-brands fa-twitter',
                    'library' => 'fa-brands',
                ],
            ],
            [
                'name' => 'od_team_single_social_url',
                'label' => esc_html__('Content', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],

        ],
        'default' => [
            [
                'od_team_single_social_title' => esc_html__('Francis Roman', 'ordainit-toolkit'),
            ],

        ],
        'title_field' => 'Social Icon',
    ]
);




$this->end_controls_section();

$this->start_controls_section(
    'od_team_single_style',
    [
        'label' => __('Team Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_team_single_style_tabs'
);

$this->start_controls_tab(
    'od_team_single_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_single_author_color',
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
    'od_team_single_designation_color',
    [
        'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-designation' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_single_item_bg_color',
    [
        'label' => esc_html__('Item BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_single_social_color',
    [
        'label' => esc_html__('Social Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_team_single_social_bg_color',
    [
        'label' => esc_html__('Social BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_team_single_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_team_single_author_hover_color',
    [
        'label' => esc_html__('Author Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover .it-team-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_single_designation_hover_color',
    [
        'label' => esc_html__('Designation Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover .it-team-designation' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_single_item_hover_bg_color',
    [
        'label' => esc_html__('Item BG Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-item:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_single_social_hover_color',
    [
        'label' => esc_html__('Social Icon Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_team_single_social_hover_bg_color',
    [
        'label' => esc_html__('Social BG Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box a:hover' => 'background-color: {{VALUE}}',
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
        'name' => 'od_team_single_author_typography',
        'selector' => '{{WRAPPER}} .it-team-title',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
        'name' => 'od_team_single_designation_typography',
        'selector' => '{{WRAPPER}} .it-team-designation',
    ]
);


$this->add_control(
    'hr_2',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_control(
    'od_team_single_social_box_bg_color',
    [
        'label' => esc_html__('Social Box BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-team-social-box' => 'background-color: {{VALUE}}',
        ],
    ]
);


$this->end_controls_section();
