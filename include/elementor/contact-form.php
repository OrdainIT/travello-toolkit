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
class Od_Contact_form extends Widget_Base
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
        return 'contact-form';
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
        return __('Contact Form', 'ordainit-toolkit');
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

    // Contact form 7 List

    public function get_od_contact_form()
    {
        if (! class_exists('WPCF7')) {
            return;
        }
        $od_cfa         = array();
        $od_cf_args     = array('posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form');
        $od_forms       = get_posts($od_cf_args);
        $od_cfa         = ['0' => esc_html__('Select Form', 'odcore')];
        if ($od_forms) {
            foreach ($od_forms as $od_form) {
                $od_cfa[$od_form->ID] = $od_form->post_title;
            }
        } else {
            $od_cfa[esc_html__('No contact form found', 'odcore')] = 0;
        }
        return $od_cfa;
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
            'od_contact_form_section',
            [
                'label' => __('Contact Form', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_select_contact_form',
            [
                'label'   => esc_html__('Select Form', 'odcore'),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_od_contact_form(),
            ]
        );





        $this->end_controls_section();

        $this->start_controls_section(
            'od_contact_form_style',
            [
                'label' => __('Contact Form Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_contact_form_form_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-contact-input-box input::placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-contact-textarea-box textarea::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Placeholder Typography', 'ordainit-toolkit'),
                'name' => 'od_contact_form_placeholder_typography',
                'selector' => '{{WRAPPER}} .it-contact-input-box input, {{WRAPPER}} .it-contact-textarea-box textarea',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->start_controls_tabs(
            'od_contact_form_style_tabs'
        );

        $this->start_controls_tab(
            'od_contact_form_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_contact_form_btn_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_contact_form_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_contact_form_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_contact_form_btn_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_contact_form_btn_hover_bg_color',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-primary:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // button margin control

        $this->add_responsive_control(
            'od_contact_form_btn_margin',
            [
                'label' => esc_html__('Button Margin', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .it-newsletter-right button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_contact_form_btn_typography',
                'selector' => '{{WRAPPER}} .it-btn-primary',
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
        $od_select_contact_form = $settings['od_select_contact_form'];
?>


        <div class="od-form">
            <?php echo do_shortcode('[contact-form-7  id="' . $od_select_contact_form . '"]'); ?>

        </div>







        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Contact_form());
