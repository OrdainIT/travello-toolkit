<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;


if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class OD_Heading extends Widget_Base
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
        return 'od-heading';
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
        return __('Heading', 'ordainit-toolkit');
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
            'od_heading_content',
            [
                'label' => __('Heading Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_heading_title',
            [
                'label' => __('Heading Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Heading', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'od_heading_title_alignment',
            [
                'label' => __('Alignment', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ordainit-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ordainit-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ordainit-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'od_heading_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'tvcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'tvcore'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'tvcore'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'tvcore'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'tvcore'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'tvcore'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'tvcore'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
            ]
        );


        $this->add_control(
            'od_heading_link',
            [
                'label' => __('Heading Link', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'ordainit-toolkit'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'od_heading_style',
            [
                'label' => __('Heading Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_heading_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        // heading title color
        $this->add_control(
            'od_heading_color_title_color',
            [
                'label' => esc_html__('Color Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-title span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_heading_title_typography',
                'selector' => '{{WRAPPER}} .it-section-title',
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
        $od_heading_title = $settings['od_heading_title'];
        $od_heading_title_alignment = $settings['od_heading_title_alignment'];

        $this->add_render_attribute('heading_title_args', 'class', 'it-section-title');
        $this->add_render_attribute('heading_title_args', 'style', 'text-align: ' . $od_heading_title_alignment . ';');


        $link_attributes = "";
        $link_settings = $settings['od_heading_link'];

        if (!empty($link_settings['url'])) {
            $this->add_render_attribute('heading_link_args', 'href', esc_url($link_settings['url']));
            if (!empty($link_settings['is_external'])) {
                $this->add_render_attribute('heading_link_args', 'target', '_blank');
            }
            if (!empty($link_settings['nofollow'])) {
                $this->add_render_attribute('heading_link_args', 'rel', 'nofollow');
            }
            $link_attributes = $this->get_render_attribute_string('heading_link_args');
        }


?>

        <?php

        printf(
            '<%1$s %2$s>%3$s%4$s%5$s</%1$s>',
            esc_attr($settings['od_heading_title_tag']), // Escaped heading tag
            $this->get_render_attribute_string('heading_title_args'), // Heading attributes
            $link_attributes ? '<a ' . $link_attributes . '>' : '', // Open link if set
            od_kses($od_heading_title, 'ordainit-toolkit'), // Heading text
            $link_attributes ? '</a>' : '' // Close link if set
        );

        ?>


        <script>
            jQuery(document).ready(function($) {

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Heading());
