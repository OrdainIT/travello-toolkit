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
class OD_Team_Slider extends Widget_Base
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
        return 'od-team-slider';
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
        return __('Team Slider', 'ordainit-toolkit');
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
            'od_team_layout',
            [
                'label' => esc_html__('Team Layout', 'ordainit-toolkit'),
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Testimonial List Content
        $this->start_controls_section(
            'od_team_section_content_list',
            [
                'label' => __('Team Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_lists',
            [
                'label' => esc_html__('Team List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_team_list_thumbnail',
                        'label' => esc_html__('Choose Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' =>
                            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/team/team-1-3.jpg',
                        ],
                    ],
                    [
                        'name' => 'od_team_list_author',
                        'label' => esc_html__('Author', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('OD Testimonial Author', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_team_list_url',
                        'label' => esc_html__('Url', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_team_list_designation',
                        'label' => esc_html__('Designation', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('OD Testimonial Designation', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_team_list_facebook_url',
                        'label' => esc_html__('Facebook Url', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                        'description' => esc_html__('It works only for layout - 1'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_team_list_twitter_url',
                        'label' => esc_html__('Twitter Url', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                        'description' => esc_html__('It works only for layout - 1'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_team_list_skype_url',
                        'label' => esc_html__('Skype Url', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                        'description' => esc_html__('It works only for layout - 1'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'od_team_list_author' => esc_html__('Francis Roman', 'ordainit-toolkit'),
                    ],
                    [
                        'od_team_list_author' => esc_html__('Isco Alarcon', 'ordainit-toolkit'),
                    ],
                    [
                        'od_team_list_author' => esc_html__('Sergio Ramos', 'ordainit-toolkit'),
                    ],
                    [
                        'od_team_list_author' => esc_html__('Marco Asensio', 'ordainit-toolkit'),
                    ],

                ],
                'title_field' => '{{{ od_team_list_author }}}',
            ]
        );

        $this->end_controls_section();

        // Team slider settings
        $this->start_controls_section(
            'od_team_slider_settings',
            [
                'label' => __('Team Settings', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_slider_autoplay',
            [
                'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'ordainit-toolkit'),
                'label_off' => esc_html__('Off', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Style Starts

        $this->start_controls_section(
            'od_team_slider_style',
            [
                'label' => __('Team Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'od_team_slider_style_tabs'
        );

        $this->start_controls_tab(
            'od_team_slider_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_slider_author_color',
            [
                'label' => esc_html__('Author Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-team-title:hover a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_designation_color',
            [
                'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_item_bg_color',
            [
                'label' => esc_html__('Item BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_social_color',
            [
                'label' => esc_html__('Social Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );
        $this->add_control(
            'od_team_slider_social_bg_color',
            [
                'label' => esc_html__('Social BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_team_slider_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_slider_author_hover_color',
            [
                'label' => esc_html__('Author Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover .it-team-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-team-style-3 .it-team-title:hover a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_designation_hover_color',
            [
                'label' => esc_html__('Designation Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover .it-team-designation' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .it-team-designation:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_item_hover_bg_color',
            [
                'label' => esc_html__('Item BG Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_social_hover_color',
            [
                'label' => esc_html__('Social Icon Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_social_hover_bg_color',
            [
                'label' => esc_html__('Social BG Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Author Typography', 'ordainit-toolkit'),
                'name' => 'od_team_slider_author_typography',
                'selector' => '{{WRAPPER}} .it-team-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
                'name' => 'od_team_slider_designation_typography',
                'selector' => '{{WRAPPER}} .it-team-designation',
            ]
        );


        $this->add_control(
            'hr_2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'od_design_style' => ['layout-1']
                ],
            ]
        );

        $this->add_control(
            'od_team_slider_social_box_bg_color',
            [
                'label' => esc_html__('Social Box BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'od_design_style' => ['layout-1']
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
        $od_team_slider_autoplay = $settings['od_team_slider_autoplay'];
        $od_team_lists = $settings['od_team_lists'];
?>
        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="it-team-style-3">
                <div class="swiper-container it-team-3-active">
                    <div class="swiper-wrapper text-center text-sm-start">
                        <?php foreach ($od_team_lists as $od_team_list):
                            $team_thumbnail_url = $od_team_list['od_team_list_thumbnail'];
                        ?>
                            <div class="swiper-slide">
                                <div class="it-team-3-item">
                                    <div class="it-team-3-thumb mb-25">
                                        <img
                                            src="<?php echo esc_url($team_thumbnail_url['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_html($od_testimonial_list['od_team_list_author']); ?>">
                                    </div>
                                    <div class="it-team-3-content">
                                        <h3 class="it-team-title">
                                            <a href="<?php echo esc_url($od_team_list['od_team_list_url']); ?>"><?php echo esc_html($od_team_list['od_team_list_author']); ?></a>
                                        </h3>
                                        <span class="it-team-designation"><?php echo esc_html($od_team_list['od_team_list_designation']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="swiper-container it-team-active">
                <div class="swiper-wrapper">
                    <?php foreach ($od_team_lists as $od_team_list):
                        $team_thumbnail_url = $od_team_list['od_team_list_thumbnail'];
                    ?>
                        <div class="swiper-slide">
                            <div class="it-team-item">
                                <div class="it-team-content text-center">
                                    <div class="it-team-thumb">
                                        <img
                                            src="<?php echo esc_url($team_thumbnail_url['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_html($od_testimonial_list['od_team_list_author']); ?>">
                                    </div>
                                    <div class="it-team-text mb-30">
                                        <h3 class="it-team-title">
                                            <a href="<?php echo esc_url($od_team_list['od_team_list_url']); ?>"><?php echo esc_html($od_team_list['od_team_list_author']); ?></a>
                                        </h3>
                                        <span class="it-team-designation"><?php echo esc_html($od_team_list['od_team_list_designation']); ?></span>
                                    </div>
                                    <div class="it-team-social-box">
                                        <a href="<?php echo esc_url($od_team_list['od_team_list_facebook_url']); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="<?php echo esc_url($od_team_list['od_team_list_twitter_url']); ?>"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="<?php echo esc_url($od_team_list['od_team_list_skype_url']); ?>"><i class="fa-brands fa-skype"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_team_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_team_slider_autoplay ? 'true' : 'false'; ?>;

                // Team Layout - 01
                const innerTeamSwiper = new Swiper('.it-team-active', {
                    speed: 1000,
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 3,
                        },
                        '1200': {
                            slidesPerView: 3,
                        },
                        '992': {
                            slidesPerView: 3,
                        },
                        '768': {
                            slidesPerView: 2,
                        },
                        '576': {
                            slidesPerView: 2,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                });


                // Team layout - 2
                const innerTeam3Swiper = new Swiper('.it-team-3-active', {
                    speed: 1000,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 4,
                        },
                        '1200': {
                            slidesPerView: 4,
                        },
                        '992': {
                            slidesPerView: 3,
                        },
                        '768': {
                            slidesPerView: 3,
                        },
                        '576': {
                            slidesPerView: 2,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                });


            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Team_Slider());
