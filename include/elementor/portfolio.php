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
class OD_Portfolio extends Widget_Base
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
        return 'od-portfolio';
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
        return __('Portfolio', 'ordainit-toolkit');
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
            'od_portfolio_heading_content',
            [
                'label' => __('Stories Heading Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_portfolio_title',
            [
                'label' => __('Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Od Title', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Title here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_portfolio_subtitle',
            [
                'label' => __('Subtitle', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Od Subtitle', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Subtitle here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_portfolio_masonry_content',
            [
                'label' => __('Masonry Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_tabs',
            [
                'label' => esc_html__('Masonry Tabs', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_portfolio_masonry_tab_name',
                        'label' => esc_html__('Tab Name', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('New Tab', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_portfolio_masonry_tab_filter',
                        'label' => esc_html__('Filter Class', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('cat-1', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'od_portfolio_masonry_tab_name' => esc_html__('All', 'ordainit-toolkit'),
                        'od_portfolio_masonry_tab_filter' => '*',
                    ],
                    [
                        'od_portfolio_masonry_tab_name' => esc_html__('Adventure', 'ordainit-toolkit'),
                        'od_portfolio_masonry_tab_filter' => 'cat-1',
                    ],
                    [
                        'od_portfolio_masonry_tab_name' => esc_html__('Family Friendly', 'ordainit-toolkit'),
                        'od_portfolio_masonry_tab_filter' => 'cat-2',
                    ],
                ],
                'title_field' => '{{{ od_portfolio_masonry_tab_name }}}',
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_items',
            [
                'label' => esc_html__('Masonry Items', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_portfolio_masonry_item_image',
                        'label' => esc_html__('Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' =>
                            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/destination/in-d-1.jpg',
                        ],
                    ],
                    [
                        'name' => 'od_portfolio_masonry_item_title',
                        'label' => esc_html__('Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Od Portfolio Title', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_portfolio_masonry_item_subtitle',
                        'label' => esc_html__('Subtitle', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Adventure', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_portfolio_masonry_item_category',
                        'label' => esc_html__('Category Classes', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('cat-1', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_portfolio_masonry_item_url',
                        'label' => esc_html__('Url', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'od_portfolio_masonry_item_title' => esc_html__('Discovery Islands', 'ordainit-toolkit'),
                        'od_portfolio_masonry_item_category' => 'cat-1',
                    ],
                    [
                        'od_portfolio_masonry_item_title' => esc_html__('Cuba Sailing Adventure', 'ordainit-toolkit'),
                        'od_portfolio_masonry_item_category' => 'cat-2',
                    ],
                    [
                        'od_portfolio_masonry_item_title' => esc_html__('Tour in New York', 'ordainit-toolkit'),
                        'od_portfolio_masonry_item_category' => 'cat-1 cat-3',
                    ],
                ],
                'title_field' => '{{{ od_portfolio_masonry_item_title }}}',
            ]
        );


        $this->end_controls_section();

        // Style Starts

        $this->start_controls_section(
            'od_portfolio_heading_style',
            [
                'label' => __('Portfolio Heading Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'od_portfolio_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-portfolio-title-box .it-section-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_portfolio_title_typography',
                'selector' => '{{WRAPPER}} .it-portfolio-title-box .it-section-title',
            ]
        );

        $this->add_control(
            'od_portfolio_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('SubTitle Typography', 'ordainit-toolkit'),
                'name' => 'od_portfolio_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-section-subtitle',
            ]
        );

        $this->end_controls_section();

        // Masonry Btn Style
        $this->start_controls_section(
            'od_portfolio_masonry_tab_btn_style',
            [
                'label' => __('Masonry Tab Btn Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'od_portfolio_masonry_tab_btn_style_tabs'
        );

        // Active
        $this->start_controls_tab(
            'od_portfolio_masonry_tab_btn_style_active_tab',
            [
                'label' => esc_html__('Active', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_tab_btn_hover_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-portfolio-filter .masonary-menu button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-portfolio-filter .masonary-menu button.active' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_tab_btn_bg_hover_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-portfolio-filter .masonary-menu button:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .it-portfolio-filter .masonary-menu button.active' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        // Normal
        $this->start_controls_tab(
            'od_portfolio_masonry_tab_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_tab_btn_color',
            [
                'label' => esc_html__('Button Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-portfolio-filter .masonary-menu button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_tab_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-portfolio-filter .masonary-menu button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Masonry Content Style
        $this->start_controls_section(
            'od_portfolio_masonry_content_style',
            [
                'label' => __('Masonry Content Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //Title
        $this->add_control(
            'od_portfolio_masonry_title_color',
            [
                'label' => esc_html__('Title Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-inner-destination .it-dest-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-inner-destination .it-dest-title:hover a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
                'name' => 'od_portfolio_masonry_title_typography',
                'selector' => '{{WRAPPER}} .it-inner-destination .it-dest-title',
            ]
        );

        //Subtitle
        $this->add_control(
            'od_portfolio_masonry_subtitle_color',
            [
                'label' => esc_html__('SubTitle Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-inner-destination .it-dest-content span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
                'name' => 'od_portfolio_masonry_subtitle_typography',
                'selector' => '{{WRAPPER}} .it-inner-destination .it-dest-content span',
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_btn_heading',
            [
                'label' => esc_html__('Button Style', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs(
            'od_portfolio_masonry_btn_style_tabs'
        );

        $this->start_controls_tab(
            'od_portfolio_masonry_btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_btn_style_normal_color',
            [
                'label' => esc_html__('Btn Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-inner-destination .it-dest-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_btn_style_normal_bg_color',
            [
                'label' => esc_html__('Btn BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-inner-destination .it-dest-icon a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_portfolio_masonry_btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_btn_style_hover_color',
            [
                'label' => esc_html__('Btn Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-inner-destination .it-dest-icon a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_portfolio_masonry_btn_style_hover_bg_color',
            [
                'label' => esc_html__('Btn Hover BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-inner-destination .it-dest-icon a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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
        $od_portfolio_title = $settings['od_portfolio_title'];
        $od_portfolio_subtitle = $settings['od_portfolio_subtitle'];
        $od_portfolio_masonry_tabs = $settings['od_portfolio_masonry_tabs'];
        $od_portfolio_masonry_items = $settings['od_portfolio_masonry_items'];
?>


        <div class="it-portfolio-area it-inner-destination">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-6 col-lg-6">
                        <div class="it-portfolio-title-box">
                            <span class="it-section-subtitle"><?php echo esc_html($od_portfolio_subtitle, 'ordainit-toolkit') ?></span>
                            <h3 class="it-section-title"><?php echo esc_html($od_portfolio_title, 'ordainit-toolkit') ?></h3>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="it-portfolio-filter text-lg-end">
                            <div class="masonary-menu">

                                <?php foreach ($od_portfolio_masonry_tabs as $index => $od_portfolio_masonry_tab): ?>
                                    <button
                                        class="<?php echo esc_attr($index === 0 ? 'active' : ''); ?>"
                                        data-filter="<?php echo $od_portfolio_masonry_tab['od_portfolio_masonry_tab_filter'] === '*'
                                                            ? esc_attr($od_portfolio_masonry_tab['od_portfolio_masonry_tab_filter'])
                                                            : '.' . esc_attr($od_portfolio_masonry_tab['od_portfolio_masonry_tab_filter']); ?>">
                                        <?php echo esc_html($od_portfolio_masonry_tab['od_portfolio_masonry_tab_name']); ?>
                                    </button>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-portfolio-wrap mt-65">
                    <div class="row grid">
                        <?php foreach ($od_portfolio_masonry_items as $od_portfolio_masonry_item): ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 <?php echo esc_attr($od_portfolio_masonry_item['od_portfolio_masonry_item_category'], 'ordainit-toolkit'); ?> grid-item">
                                <div class="it-dest-item">
                                    <div class="it-dest-thumb fix mb-20">
                                        <img src="<?php echo esc_url($od_portfolio_masonry_item['od_portfolio_masonry_item_image']['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_attr($od_portfolio_masonry_item['od_portfolio_masonry_item_title'], 'ordainit-toolkit'); ?>">
                                    </div>
                                    <div class="it-dest-content d-flex align-items-center justify-content-between">
                                        <div class="it-dest-text">
                                            <h3 class="it-dest-title">
                                                <a href="<?php echo esc_url($od_portfolio_masonry_item['od_portfolio_masonry_item_url'], 'ordainit-toolkit') ?>">
                                                    <?php echo esc_html($od_portfolio_masonry_item['od_portfolio_masonry_item_title'], 'ordainit-toolkit'); ?></a>
                                            </h3>
                                            <span><?php echo esc_html($od_portfolio_masonry_item['od_portfolio_masonry_item_subtitle'], 'ordainit-toolkit'); ?></span>
                                        </div>
                                        <div class="it-dest-icon">
                                            <a href="<?php echo esc_url($od_portfolio_masonry_item['od_portfolio_masonry_item_url'], 'ordainit-toolkit') ?>">
                                                <i class="fa-regular fa-arrow-right-long"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

$widgets_manager->register(new OD_Portfolio());
