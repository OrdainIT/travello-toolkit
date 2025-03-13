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
class OD_Contact_Box extends Widget_Base
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
        return 'od-contact-box';
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
        return __('Contact Box', 'ordainit-toolkit');
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
            'od_contact_box_content',
            [
                'label' => __('Contact Box Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_contact_box_icon',
            [
                'label' => __('Icon', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('flaticon-chat', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Icon Here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_contact_box_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Emergency', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Title Here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_contact_box_phone',
            [
                'label' => __('Phone', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('(+99) 012356987', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Phone no. Here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_contact_box_style',
            [
                'label' => __('Contact Box Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_contact_box_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_contact_box_icon_font_size',
            [
                'label' => esc_html__('Icon Font Size', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'], // Units available
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0.5,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0.5,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'od_contact_box_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_contact_box_title_typography',
                'selector' => '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text span',
            ]
        );

        $this->add_control(
            'od_contact_box_phone_color',
            [
                'label' => esc_html__('Phone Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Phone Typography', 'ordainit-toolkit'),
                'name' => 'od_contact_box_phone_typography',
                'selector' => '{{WRAPPER}} .it-chooseus-4 .it-chooseus-contact-text a',
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
        $od_contact_box_title = $settings['od_contact_box_title'];
        $od_contact_box_phone = $settings['od_contact_box_phone'];
        $od_contact_box_icon = $settings['od_contact_box_icon'];
?>
        <div class="it-chooseus-4">
            <div class="it-chooseus-contact d-flex align-items-center">
                <div class="it-chooseus-contact-icon">
                    <i class="<?php echo esc_attr($od_contact_box_icon, 'ordainit-toolkit') ?>"></i>
                </div>
                <div class="it-chooseus-contact-text">
                    <span><?php echo esc_html($od_contact_box_title, 'ordainit-toolkit') ?></span>
                    <a href="tel:<?php echo esc_url($od_contact_box_phone, 'ordainit-toolkit') ?>"><?php echo esc_html($od_contact_box_phone, 'ordainit-toolkit') ?></a>
                </div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function($) {

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Contact_Box());
