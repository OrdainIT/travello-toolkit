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
class OD_Team extends Widget_Base
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
        return 'od-team';
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
        return __('Team', 'ordainit-toolkit');
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
            'od_team_single_content',
            [
                'label' => __('Team Content', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_single_thumbnail',
            [
                'label' => esc_html__('Choose Thumbnail', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/inner-page/team/team-1-1.jpg',
                ],
            ]
        );

        $this->add_control(
            'od_team_single_author',
            [
                'label' => __('Author', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Author Name', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Author Name here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_team_single_url',
            [
                'label' => esc_html__('URL', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_team_single_designation',
            [
                'label' => __('Designation', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OD Designation', 'ordainit-toolkit'),
                'placeholder' => esc_html__('Type Author Designation here', 'ordainit-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'od_team_single_social_lists',
            [
                'label' => esc_html__('Social Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'od_team_single_social_title',
                        'label' => esc_html__('OD Social Title', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fa-brands fa-twitter',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'name' => 'od_team_single_social_url',
                        'label' => esc_html__('Content', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                        'label_block' => true,
                    ],

                ],
                'default' => [
                    [
                        'od_team_single_social_title' => esc_html__('Francis Roman', 'ordainit-toolkit'),
                    ],

                ],
                'title_field' => 'Social Icon',
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'od_team_single_style',
            [
                'label' => __('Team Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'od_team_single_style_tabs'
        );

        $this->start_controls_tab(
            'od_team_single_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_single_author_color',
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
            'od_team_single_designation_color',
            [
                'label' => esc_html__('Designation Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_single_item_bg_color',
            [
                'label' => esc_html__('Item BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_single_social_color',
            [
                'label' => esc_html__('Social Icon Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'od_team_single_social_bg_color',
            [
                'label' => esc_html__('Social BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'od_team_single_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_team_single_author_hover_color',
            [
                'label' => esc_html__('Author Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover .it-team-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_single_designation_hover_color',
            [
                'label' => esc_html__('Designation Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover .it-team-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_single_item_hover_bg_color',
            [
                'label' => esc_html__('Item BG Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-item:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_single_social_hover_color',
            [
                'label' => esc_html__('Social Icon Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'od_team_single_social_hover_bg_color',
            [
                'label' => esc_html__('Social BG Hover Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box a:hover' => 'background-color: {{VALUE}}',
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
                'name' => 'od_team_single_author_typography',
                'selector' => '{{WRAPPER}} .it-team-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Designation Typography', 'ordainit-toolkit'),
                'name' => 'od_team_single_designation_typography',
                'selector' => '{{WRAPPER}} .it-team-designation',
            ]
        );


        $this->add_control(
            'hr_2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'od_team_single_social_box_bg_color',
            [
                'label' => esc_html__('Social Box BG Color', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .it-team-social-box' => 'background-color: {{VALUE}}',
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
        $od_team_single_thumbnail = $settings['od_team_single_thumbnail'];
        $od_team_single_author = $settings['od_team_single_author'];
        $od_team_single_url = $settings['od_team_single_url'];
        $od_team_single_designation = $settings['od_team_single_designation'];
        $od_team_single_social_lists = $settings['od_team_single_social_lists'];
?>

        <div class="it-team-item">
            <div class="it-team-content text-center">
                <div class="it-team-thumb">
                    <img src="<?php echo esc_url($od_team_single_thumbnail['url'], 'ordainit-toolkit') ?>" alt="">
                </div>
                <div class="it-team-text mb-30">
                    <h3 class="it-team-title">
                        <a href="<?php echo esc_url($od_team_single_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($od_team_single_author, 'ordainit-toolkit') ?></a>
                    </h3>
                    <span class="it-team-designation"><?php echo esc_html($od_team_single_designation, 'ordainit-toolkit') ?></span>
                </div>
                <div class="it-team-social-box">
                    <?php foreach ($od_team_single_social_lists as $od_team_single_social_list) :
                        $social_value = $od_team_single_social_list['od_team_single_social_title']
                    ?>
                        <a href="#"><i class="<?php echo esc_attr($social_value['value'], 'ordainit-toolkit') ?>"></i></a>
                    <?php endforeach; ?>

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

$widgets_manager->register(new OD_Team());
