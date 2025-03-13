<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class OD_Video_Play_Btn extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'od-video-play-btn';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Video Play Btn', 'ordainit-toolkit');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'od-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['ordainit-toolkit'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

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
    }

    /**
     * Render the widget ouodut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $od_video_play_btn_url = $settings['od_video_play_btn_url'];
?>


        <div class="it-video-icon z-index justify-content-start justify-content-md-end align-items-center">
            <a href="<?php echo esc_url($od_video_play_btn_url, 'ordainit-toolkit')  ?>" class="popup-video">
                <i class="fa-solid fa-play"></i>
            </a>
        </div>


        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Video_Play_Btn());
