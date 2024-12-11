<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'od_video_play_btn_content',
    [
        'label' => __('Video Btn Url', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_video_play_btn_url',
    [
        'label' => __('Video Url', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('https://youtu.be/hI9HQfCAw64?si=7NnbHC4datC-PNgg', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Put video url here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Style Starts

$this->start_controls_section(
    'od_video_play_btn_style',
    [
        'label' => __('Btn Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_video_play_btn_icon_color',
    [
        'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-video-icon a' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_video_play_btn_bg_color',
    [
        'label' => esc_html__('Btn Bg Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-video-icon a' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_video_play_btn_before_bg_color',
    [
        'label' => esc_html__('Btn Before Bg Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-video-icon a::before' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_video_play_btn_icon_border_color',
    [
        'label' => esc_html__('Btn Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-video-icon a::after' => 'border-color: {{VALUE}}',
        ],
    ]
);






$this->end_controls_section();
