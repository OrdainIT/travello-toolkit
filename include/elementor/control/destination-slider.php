<?php

use Elementor\Controls_Manager;


// layout Panel
$this->start_controls_section(
    'od_layout',
    [
        'label' => esc_html__('Design Layout', 'ordainit-toolkit'),
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
            'layout-3' => esc_html__('Layout 3', 'ordainit-toolkit'),
            'layout-4' => esc_html__('Layout 4', 'ordainit-toolkit'),
        ],
        'default' => 'layout-1',
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_destination_title_content',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_destination_title_content_title',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Explore the Beautiful Places Around World', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);
$this->add_control(
    'od_destination_title_content_subtitle',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('DESTINATION LIST', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);
$this->add_control(
    'od_destination_title_content_description',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do..', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);

$this->add_control(
    'od_destination_title_content_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Button Text', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);
$this->add_control(
    'od_destination_title_content_btn_url',
    [
        'label' => esc_html__('Button URL', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('#', 'ordainit-toolkit'),
        'label_block' => true,

    ]
);





$this->end_controls_section();





$this->start_controls_section(
    'od_destination_slider_contnet',
    [
        'label' => __('Slider Lists', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_destination_slider_content_wrap',
    [
        'label' => esc_html__('Slider List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_destination_slider_title',
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_destination_slider_subtitle',
                'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3'],
                ],
            ],
            [
                'name' => 'od_destination_slider_description',
                'label' => esc_html__('Description', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Description', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_destination_slider_btn_text',
                'label' => esc_html__('Button Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('See More', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_destination_slider_url',
                'label' => esc_html__('URL', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_destination_slider_image',
                'label' => esc_html__('Slider Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>  ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-1/destination/img/img-1.jpg',
                ],
            ],
        ],
        'default' => [
            [
                'od_destination_slider_title' => esc_html__('Europe', 'ordainit-toolkit'),
            ],
            [
                'od_destination_slider_title' => esc_html__('North America', 'ordainit-toolkit'),
            ],
            [
                'od_destination_slider_title' => esc_html__('South Africa', 'ordainit-toolkit'),
            ],
            [
                'od_destination_slider_title' => esc_html__('Costa Rica', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_destination_slider_title }}}',
    ]
);








$this->end_controls_section();




$this->start_controls_section(
    'od_destination_slider_setttings',
    [
        'label' => __('Slider Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_slider_autoplay_switcher',
    [
        'label' => esc_html__('Autoplay On/Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);
$this->end_controls_section();

$this->start_controls_section(
    'od_destination_slider_shap',
    [
        'label' => __('Shap', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
    ]
);

$this->add_control(
    'od_destination_slider_shap_img',
    [
        'label' => esc_html__('Shap Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/destination/shape/d-walk.png',
        ],
    ]
);


$this->end_controls_section();


$this->start_controls_section(
    'od_destination_slider_section_content',
    [
        'label' => __('Title & Content', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


$this->add_control(
    'od_destination_slider_section_content_title',
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
        'name' => 'od_destination_slider_section_content_title_typo',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);

$this->add_control(
    'od_destination_slider_section_content_subtitle',
    [
        'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_section_content_subtitle_typo',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);
$this->add_control(
    'od_destination_slider_section_content_description',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-2-title-box p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_section_content_description_typo',
        'selector' => '{{WRAPPER}} .it-destination-2-title-box p',
    ]
);



$this->end_controls_section();


$this->start_controls_section(
    'od_destination_slider_section_content_button',
    [
        'label' => __('Button', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_destination_slider_section_content_button_tabs'
);

// Normal

$this->start_controls_tab(
    'od_destination_slider_section_content_button_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_slider_section_content_button_normal_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_destination_slider_section_content_button_normal_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary' => 'color: {{VALUE}}',
        ],
    ]
);


$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_destination_slider_section_content_button_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_slider_section_content_button_hover_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_destination_slider_section_content_button_hover_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-secondary:hover' => 'color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();


$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_section_content_button_typo',
        'selector' => '{{WRAPPER}} .it-btn-secondary',
    ]
);



$this->end_controls_section();



$this->start_controls_section(
    'od_destination_slider_style',
    [
        'label' => __('Slider Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_destination_slider_bg_overlay_color',
    [
        'label' => esc_html__('BG Overlay Color', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-3', 'layout-4'],
        ],
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-item::after' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-travel-feat-thumb::before' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_content_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'condition' => [
            'od|_design_style' => ['layout-2'],
        ],
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-2-text' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_destination_slider_title_heading',
    [
        'label' => esc_html__('Title', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_destination_slider_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-title' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-destination-2-place' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-travel-feat-title' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-title:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-destination-2-place:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-travel-feat-item:hover .it-travel-feat-content .it-travel-feat-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_title_typo',
        'selector' => '{{WRAPPER}} .it-destination-title, {{WRAPPER}}  .it-destination-2-place',
    ]
);

$this->add_control(
    'od_destination_slider_subtitle_heading',
    [
        'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
        ],
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_destination_slider_subtitle_color',
    [
        'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
        ],
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-destination-content span' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-destination-2-text' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_subtitle_typo',
        'condition' => [
            'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
        ],
        'selector' => '{{WRAPPER}} .it-destination-content span, {{WRAPPER}} .it-destination-2-text',
    ]
);


$this->add_control(
    'od_destination_slider_description_heading',
    [
        'label' => esc_html__('Description', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-4']
        ],
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'od_destination_slider_description_color',
    [
        'label' => esc_html__('Description Color', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-4']
        ],
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-travel-feat-content p' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'od_destination_slider_description_typo',
        'condition' => [
            'od_design_style' => ['layout-4']
        ],
        'selector' => '{{WRAPPER}} .it-travel-feat-content p',
    ]
);





$this->end_controls_section();


$this->start_controls_section(
    'od_destination_slider_button_4',
    [
        'label' => __('Button', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-4'],
        ],
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_destination_slider_button_4_tabs'
);

// Normal

$this->start_controls_tab(
    'od_destination_slider_button_4_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);


$this->add_control(
    'od_destination_slider_button_4_normal_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-travel-feat-button a' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_button_4_normal_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-travel-feat-button a' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_destination_slider_button_4_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_slider_button_4_hover_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-travel-feat-button a:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_button_4_hover_text_color',
    [
        'label' => esc_html__('Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-travel-feat-button a:hover' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_tab();


$this->end_controls_tabs();
$this->end_controls_section();

$this->start_controls_section(
    'od_destination_slider_section_content_arrow',
    [
        'label' => __('Arrow', 'ordainit-toolkit'),
        'condition' => [
            'od_design_style' => ['layout-2'],
        ],
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_destination_slider_section_content_arrow_tabs'
);

// Normal

$this->start_controls_tab(
    'od_destination_slider_section_content_arrow_normal_tab',
    [
        'label' => esc_html__('Normal', 'odrainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_slider_section_content_arrow_normal_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slide-btn-1' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_section_content_arrow_normal_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slide-btn-1' => 'color: {{VALUE}}',
        ],
    ]
);





$this->end_controls_tab();

// Hover

$this->start_controls_tab(
    'od_destination_slider_section_content_arrow_hover_tab',
    [
        'label' => esc_html__('Hover', 'odrainit-toolkit'),
    ]
);


$this->add_control(
    'od_destination_slider_section_content_arrow_hover_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slide-btn-2:hover' => 'background-color: {{VALUE}}',
            '{{WRAPPER}} .it-slide-btn-1:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_section_content_arrow_hover_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slide-btn-2:hover' => 'color: {{VALUE}}',
            '{{WRAPPER}} .it-slide-btn-1:hover' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_tab();

// Active

$this->start_controls_tab(
    'od_destination_slider_section_content_arrow_active_tab',
    [
        'label' => esc_html__('Active', 'odrainit-toolkit'),
    ]
);

$this->add_control(
    'od_destination_slider_section_content_arrow_active_bg_color',
    [
        'label' => esc_html__('BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slide-btn-2' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_destination_slider_section_content_arrow_active_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-slide-btn-2' => 'color: {{VALUE}}',
        ],
    ]
);



$this->end_controls_tab();

$this->end_controls_tabs();
$this->end_controls_section();
