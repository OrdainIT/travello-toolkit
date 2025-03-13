<?php

use Elementor\Controls_Manager;

class OdCustomContainer
{


    public function __construct()
    {
        add_action('elementor/element/common/_section_style/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/column/section_advanced/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/section/section_advanced/after_section_end', [$this, 'register_controls']);
        add_action('elementor/element/container/section_layout/after_section_end', [$this, 'register_controls']);
        add_action('elementor/frontend/before_render', [$this, 'before_render'], 1);
      
    }

    public function register_controls($element)
    {


        // Data Fade From Control
        $element->start_controls_section(
            'data_fade_from_wrapper',
            [
                'label' => __('Fade From', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'data_fade_from',
            [
                'label' => __('Fade From', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'ordainit-toolkit'),
                    'wow itfadeLeft' => __('Left', 'ordainit-toolkit'),
                    'wow itfadeRight' => __('Right', 'ordainit-toolkit'),
                    'wow itfadeUp' => __('Up', 'ordainit-toolkit'),
                ],
            ]
        );

        $element->end_controls_section();

        // Data Delay Control
        $element->start_controls_section(
            'data_delay_wrapper',
            [
                'label' => __('Delay & Duration', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'od_data_duration',
            [
                'label' => __('Duration', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => 0,
                'description' => __('Enter delay in milliseconds.', 'ordainit-toolkit'),
            ]
        );

        $element->add_control(
            'od_data_delay',
            [
                'label' => __('Delay', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => 0,
                'description' => __('Enter delay in milliseconds.', 'ordainit-toolkit'),
            ]
        );


        $element->end_controls_section();

        
    }

    public function before_render($element)
    {
        $settings = $element->get_settings();

        // Add the data-wow-delay attribute if it has a value
        if (!empty($settings['od_data_delay'])) {
            $element->add_render_attribute('_wrapper', 'data-wow-delay', $settings['od_data_delay']);
        }

        // Add the data-wow-duration attribute if it has a value
        if (!empty($settings['od_data_duration'])) {
            $element->add_render_attribute('_wrapper', 'data-wow-duration', $settings['od_data_duration']);
        }

        // Add the data-fade-from class if it has a value
        if (!empty($settings['data_fade_from'])) {
            $element->add_render_attribute('_wrapper', 'class', $settings['data_fade_from']);
        }
      

    }


   
}

new OdCustomContainer();
