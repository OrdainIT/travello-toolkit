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
class OD_Icon_Box extends Widget_Base
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
        return 'od-icon-box';
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
        return __('Icon Box', 'ordainit-toolkit');
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
        // layout Panel
        $this->start_controls_section(
            'od_icon_box_layout',
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

        // Content Section

        // Icon Type Section
        $this->start_controls_section(
            'od_icon_box_icon_type',
            [
                'label' => __('Icon Types', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_icon_box_icon_class',
            [
                'label' => __('Icon Type', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'flaticon-worker' => __('Worker', 'ordainit-toolkit'),
                    'flaticon-tour-guide' => __('Tour Guide', 'ordainit-toolkit'),
                    'fa-regular fa-hand-holding-heart' => __('Heart', 'ordainit-toolkit'),
                    'fa-regular fa-notebook' => __('Notebook', 'ordainit-toolkit'),
                    'flaticon-travel' => __('Airplane', 'ordainit-toolkit'),
                    'fa-regular fa-badge-check' => __('Check', 'ordainit-toolkit'),
                    'fa-regular fa-house-heart' => __('House', 'ordainit-toolkit'),
                    'fa-sharp fa-solid fa-star' => __('Star', 'ordainit-toolkit'),
                    'flaticon-travel' => __('Travel', 'ordainit-toolkit'),
                ],
                'default' => 'flaticon-worker',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Icon Image Selection Section
        $this->start_controls_section(
            'od_icon_box_image_section',
            [
                'label' => __('Icon Image', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-4']
                ],
            ]
        );

        $this->add_control(
            'od_icon_box_icon_image',
            [
                'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/tour-guide.png',
                ],
            ]
        );

        $this->end_controls_section();

        // Counter Section
        $this->start_controls_section(
            'od_icon_box_counter',
            [
                'label' => __('Icon Box Counter', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        $this->add_control(
            'od_icon_box_counter_end',
            [
                'label' => esc_html__('Counter End Value', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3500,
            ]
        );

        $this->add_control(
            'od_icon_box_counter_text',
            [
                'label' => esc_html__('Counter Text', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'satisfied customers',
            ]
        );

        $this->end_controls_section();


        // Icon Content
        $this->start_controls_section(
            'od_icon_box_content',
            [
                'label' => __('Icon Box Content', 'ordainit-toolkit'),
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
                ],
            ]
        );

        $this->add_control(
            'od_icon_box_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Icon Box Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_icon_box_description',
            [
                'label' => __('Description', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('OD Icon Box Description', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Description title here', 'ordainit-toolkit'),
                'label_block' => true,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4']
                ],
            ]
        );

        $this->end_controls_section();




        // Style Section

        $this->start_controls_section(
            'od_icon_style',
            [
                'label' => __('Icon Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background
        $this->add_control(
            'od_icon_box_icon_background',
            [
                'label' => esc_html__('Background', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-service-icon span' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .it-chooseus-service-icon i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .it-chooseus-rating-icon i ' => 'background: {{VALUE}};',
                ],
            ]
        );
        // Color
        $this->add_control(
            'od_icon_box_icon_color',
            [
                'label' => esc_html__('Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-service-icon span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .it-chooseus-service-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .it-chooseus-rating-icon i ' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
                ],

            ]
        );



        // Icon Size Control
        $this->add_responsive_control(
            'od_icon_box_icon_size',
            [
                'label' => esc_html__('Icon Size', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .it-about-service-icon span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-3']
                ],
            ]
        );



        $this->end_controls_section();

        // Icon Content Styles
        $this->start_controls_section(
            'od_icon_content_style',
            [
                'label' => __('Icon Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-2', 'layout-4']
                ],
            ]
        );

        // Title Style
        $this->add_control(
            'od_icon_box_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-service-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_icon_box_title_typography',
                'selector' => '{{WRAPPER}} .it-about-service-title',
            ]
        );

        // Description Style
        $this->add_control(
            'od_icon_box_description_color',
            [
                'label' => esc_html__('Description Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-about-service-text p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4']
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Description Typography', 'ordainit-toolkit'),
                'name' => 'od_icon_box_description_typography',
                'selector' => '{{WRAPPER}} .it-about-service-text p',
                'condition' => [
                    'od_design_style' => ['layout-1', 'layout-4']
                ],
            ]
        );

        $this->end_controls_section();

        // Counter Style
        $this->start_controls_section(
            'od_icon_box_counter_style',
            [
                'label' => __('Couter Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'od_design_style' => ['layout-3']
                ],
            ]
        );

        // Counter Value
        $this->add_control(
            'od_icon_box_counter_value_color',
            [
                'label' => esc_html__('Value Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-chooseus-rating-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Value Typography', 'ordainit-toolkit'),
                'name' => 'od_icon_box_counter_value_typography',
                'selector' => '{{WRAPPER}} .it-chooseus-rating-title',
            ]
        );

        // Counter Text Style
        $this->add_control(
            'od_icon_box_counter_text_color',
            [
                'label' => esc_html__('Text Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-chooseus-rating-text p' => 'color: {{VALUE}}',
                ],

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Text Typography', 'ordainit-toolkit'),
                'name' => 'od_icon_box_counter_text_typography',
                'selector' => '{{WRAPPER}} .it-chooseus-rating-text p',
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
        $od_icon_box_icon_class = $settings['od_icon_box_icon_class'];
        $od_icon_box_title = $settings['od_icon_box_title'];
        $od_icon_box_description = $settings['od_icon_box_description'];
        $od_icon_box_counter_end = $settings['od_icon_box_counter_end'];
        $od_icon_box_counter_text = $settings['od_icon_box_counter_text'];
        $od_icon_box_icon_image = $settings['od_icon_box_icon_image'];
?>

        <?php if ($settings['od_design_style']  == 'layout-4'): ?>



            <div class="it-about-service-item d-flex align-items-center">
                <div class="it-about-service-icon mr-20">
                    <span>
                        <?php
                        $alt_text = str_replace(['-', '_'], ' ', pathinfo($od_icon_box_icon_image['url'], PATHINFO_FILENAME));
                        ?>
                        <img src="<?php echo $od_icon_box_icon_image['url'] ?>" alt="<?php echo esc_attr($alt_text); ?>">
                    </span>
                </div>

                <div class="it-about-service-text">
                    <h3 class="it-about-service-title"><?php echo od_kses($od_icon_box_title, 'ordainit-toolkit'); ?></h3>
                    <p><?php echo od_kses($od_icon_box_description, 'ordainit-toolkit'); ?>
                    </p>
                </div>
            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>
            <div class="it-chooseus-rating-box">
                <div class="it-chooseus-rating-content d-flex align-items-center">
                    <div class="it-chooseus-rating-icon">
                        <i class="<?php echo esc_attr($od_icon_box_icon_class); ?>"></i>
                    </div>

                    <div class="it-chooseus-rating-text">
                        <h3 class="it-chooseus-rating-title">
                            <b class="purecounter"
                                data-purecounter-duration="1"
                                data-purecounter-end="<?php echo esc_attr($od_icon_box_counter_end, 'ordainit-toolkit'); ?>">
                                <?php echo esc_html($od_icon_box_counter_end, 'ordainit-toolkit'); ?>
                            </b>+
                        </h3>
                        <p><?php echo esc_html($od_icon_box_counter_text, 'ordainit-toolkit'); ?></p>
                    </div>
                </div>
            </div>



        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <!-- Layout - 2 -->
            <div class="it-chooseus-service-content d-flex align-items-center">
                <div class="it-chooseus-service-icon">
                    <i class="<?php echo esc_attr($od_icon_box_icon_class); ?>"></i>
                </div>
                <h3 class="it-chooseus-service-title"><?php echo od_kses($od_icon_box_title, 'ordainit-toolkit'); ?></h3>
            </div>

        <?php else: ?>
            <!-- Layout - 1 -->

            <div class="it-about-service-item d-flex align-items-center">
                <div class="it-about-service-icon mr-20">
                    <span>
                        <i class="<?php echo esc_attr($od_icon_box_icon_class); ?>"></i>
                    </span>
                </div>
                <div class="it-about-service-text">
                    <h3 class="it-about-service-title"><?php echo od_kses($od_icon_box_title, 'ordainit-toolkit'); ?></h3>
                    <p><?php echo od_kses($od_icon_box_description, 'ordainit-toolkit'); ?></p>
                </div>
            </div>

        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {
                if ($(".purecounter").length) {
                    new PureCounter({
                        filesizing: true,
                        selector: ".filesizecount",
                        pulse: 2,
                    });
                    new PureCounter();
                }

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Icon_Box());
