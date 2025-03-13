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
class OD_Testimonial extends Widget_Base
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
        return 'od-testimonial';
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
        return __('Testimonial', 'ordainit-toolkit');
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
        // Testimonial Content
        $this->start_controls_section(
            'od_testimonial_single_content',
            [
                'label' => __('Content hello', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_testimonial_single_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Testimonial Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your Description here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_testimonial_single_author',
            [
                'label' => __('Author', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Author Name', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Author Name here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_testimonial_single_designation',
            [
                'label' => __('Designation', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Designation', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Author Designation here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_testimonial_single_avatar',
            [
                'label' => esc_html__('Choose Avatar', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/testimonial/in-testi-2-1.png',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'od_testimonial_single_style',
            [
                'label' => __('Testimonial Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        // Description Style
        $this->add_control(
            'od_testimonial_single_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_testimonial_single_description_bg_color',
            [
                'label' => esc_html__('Description BG', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_single_description_typography',
                'selector' => '{{WRAPPER}} .it-testi-inner-2 .it-testi-dsc p',
            ]
        );

        // Author Style
        $this->add_control(
            'od_testimonial_single_author_color',
            [
                'label' => esc_html__('Author Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_single_author_typography',
                'selector' => '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-title',
            ]
        );

        // Designation Style
        $this->add_control(
            'od_testimonial_single_designation_color',
            [
                'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-desig' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
                'name' => 'od_testimonial_single_designation_typography',
                'selector' => '{{WRAPPER}} .it-testi-inner-2 .it-testi-author-desig',
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
        $od_testimonial_single_description = $settings['od_testimonial_single_description'];
        $od_testimonial_single_author = $settings['od_testimonial_single_author'];
        $od_testimonial_single_designation = $settings['od_testimonial_single_designation'];
        $od_testimonial_single_avatar = $settings['od_testimonial_single_avatar'];
?>

        <div class="it-testi-inner-2">
            <div class="it-testi-item">
                <div class="it-testi-dsc p-relative">
                    <p><?php echo od_kses($od_testimonial_single_description, 'ordainit-toolkit') ?></p>
                </div>
                <div class="it-testi-author-box mb-30 d-flex align-items-center justify-content-center">
                    <div class="it-testi-author-thumb mr-30">
                        <img src="<?php echo esc_url($od_testimonial_single_avatar['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_single_author, 'ordainit-toolkit')  ?>">
                    </div>
                    <div class="it-testi-author-text">
                        <h3 class="it-testi-author-title"><?php echo esc_html($od_testimonial_single_author, 'ordainit-toolkit')  ?></h3>
                        <span class="it-testi-author-desig"><?php echo esc_html($od_testimonial_single_designation, 'ordainit-toolkit') ?></span>
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

$widgets_manager->register(new OD_Testimonial());
