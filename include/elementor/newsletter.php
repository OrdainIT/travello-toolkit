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
class Od_Newsletter extends Widget_Base
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
        return 'newsletter';
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
        return __('Newsletter', 'ordainit-toolkit');
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
            'od_newsletter_title_content',
            [
                'label' => __('Title Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_newsletter_title_content_title',
            [
                'label' => esc_html__('Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join Our Newsletter', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_newsletter_title_content_subtitle',
            [
                'label' => esc_html__('Sub Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Subscribe our newsletter to get our latest update & news.', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'od_newsletter_title_content_shape',
            [
                'label' => __('shape', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_newsletter_title_content_shape_1',
            [
                'label' => esc_html__('Image 1', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy//home-2/newsletter/shape-2-1.png',
                ],
            ]
        );

        $this->add_control(
            'od_newsletter_title_content_shape_2',
            [
                'label' => esc_html__('Image 2', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/newsletter/shape-2-2.png',
                ],
            ]
        );

        $this->add_control(
            'od_newsletter_title_content_shape_3',
            [
                'label' => esc_html__('Image 3', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-2/newsletter/shape-2-3.png',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_newsletter_contact_form',
            [
                'label' => __('Contact Form', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_newsletter_contact_form_list',
            [
                'label'   => esc_html__('Select Form', 'odcore'),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_od_contact_form(),
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'od_newsletter_style',
            [
                'label' => __('Newsletter Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_newsletter_bg_color',
            [
                'label' => esc_html__('Newsletter BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-bg-2' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_newsletter_title_color',
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
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_newsletter_title_typography',
                'selector' => '{{WRAPPER}} .it-section-title',
            ]
        );

        $this->add_control(
            'od_newsletter_subtitle_color',
            [
                'label' => esc_html__('Sub Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-newsletter-left span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Sub Title Typography', 'ordainit-toolkit'),
                'name' => 'od_newsletter_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-newsletter-left span',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'od_newsletter_contact_form_style',
            [
                'label' => __('Newsletter Form Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_newsletter_contact_form_input_bg_color',
            [
                'label' => esc_html__('Input BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-newsletter-right input' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_newsletter_contact_form_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-newsletter-right input::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Placeholder Typography', 'ordainit-toolkit'),
                'name' => 'od_newsletter_contact_form_placeholder_typography',
                'selector' => '{{WRAPPER}} .it-newsletter-right input',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->start_controls_tabs(
            'od_newsletter_contact_form_style_tabs'
        );

        $this->start_controls_tab(
            'od_newsletter_contact_form_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_newsletter_contact_form_btn_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_newsletter_contact_form_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_newsletter_contact_form_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_newsletter_contact_form_btn_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_newsletter_contact_form_btn_hover_bg_color',
            [
                'label' => esc_html__('Button Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-btn-secondary:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
                'name' => 'od_newsletter_contact_form_btn_typography',
                'selector' => '{{WRAPPER}} .it-btn-secondary',
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

        $od_newsletter_title_content_title = $settings['od_newsletter_title_content_title'];
        $od_newsletter_title_content_subtitle = $settings['od_newsletter_title_content_subtitle'];
        $od_newsletter_contact_form = $settings['od_newsletter_contact_form_list'];
        $od_newsletter_title_content_shape_1 = $settings['od_newsletter_title_content_shape_1'];
        $od_newsletter_title_content_shape_2 = $settings['od_newsletter_title_content_shape_2'];
        $od_newsletter_title_content_shape_3 = $settings['od_newsletter_title_content_shape_3'];
?>

        <div class="it-newsletter-area it-newsletter-height fix p-relative theme-bg-2">
            <div class="it-newsletter-shape-1 d-none d-lg-block">
                <img src="<?php echo esc_url($od_newsletter_title_content_shape_1['url'], 'ordainit-toolkit'); ?>" alt="">
            </div>
            <div class="it-newsletter-shape-2 d-none d-lg-block">
                <img src="<?php echo esc_url($od_newsletter_title_content_shape_2['url'], 'ordainit-toolkit'); ?>" alt="">
            </div>
            <div class="it-newsletter-shape-3 d-none d-xl-block">
                <img src="<?php echo esc_url($od_newsletter_title_content_shape_3['url'], 'ordainit-toolkit'); ?>" alt="">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="it-newsletter-left">
                            <h4 class="it-section-title"><?php echo esc_html($od_newsletter_title_content_title, 'ordainit-toolkit'); ?></h4>
                            <?php if (!empty($od_newsletter_title_content_subtitle)): ?>
                                <span><?php echo esc_html($od_newsletter_title_content_subtitle, 'ordainit-toolkit'); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <?php echo do_shortcode('[contact-form-7  id="' . $od_newsletter_contact_form . '"]'); ?>
                    </div>
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

$widgets_manager->register(new Od_Newsletter());
