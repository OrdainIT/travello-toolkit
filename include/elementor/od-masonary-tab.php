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
class Od_Masonary_Tab extends Widget_Base
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
        return 'od-masonary-tab';
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
        return __('OD Masonary Tab', 'ordainit-toolkit');
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
            'od_design_layout_setion',
            [
                'label' => __('Design Style', 'ordainit-toolkit'),
            ]
        );

        $this->add_control(
            'od_design_style',
            [
                'label' => __('Masonary Layout', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout-1',
                'options' => [
                    'layout-1' => __('Layout 1', 'ordainit-toolkit'),
                    'layout-2' => __('Layout 2', 'ordainit-toolkit'),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'od_section_title_area',
            [
                'label' => __('Section Title', 'ordainit-toolkit'),
            ]
        );

        // od section title area switcher

        $this->add_control(
            'od_section_title_area_switcher',
            [
                'label' => __('Section Title Area', 'ordainit-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ordainit-toolkit'),
                'label_off' => __('Hide', 'ordainit-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // od Section Sub Title

        $this->add_control(
            'od_section_subtitle',
            [
                'label' => __('Section Sub Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Stories', 'ordainit-toolkit'),
            ]
        );

        // od Section Title

        $this->add_control(
            'od_section_title',
            [
                'label' => __('Section Title', 'ordainit-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Stories From The Road', 'ordainit-toolkit'),
            ]
        );






        $this->end_controls_section();

        $this->start_controls_section(
            'od_section_masonary_area',
            [
                'label' => __('Masonary Content', 'ordainit-toolkit'),
            ]
        );


        $this->add_control(
            'od_section_masonary_content_list',
            [
                'label' => esc_html__('Content List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'od_design_style' => 'layout-1',
                ],
                'fields' => [
                    [
                        'name' => 'od_masonary_button_text',
                        'label' => esc_html__('Button Text', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Inspiration', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_masonary_button_category_id',
                        'label' => esc_html__('Button Datafilter Name ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('cat-1', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_masonary_image_id',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'od_masonary_title',
                        'label' => esc_html__('Masonary Title ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Default Title', 'textdomain'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'od_masonary_date',
                        'label' => esc_html__('Date ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('April 28, 2025', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_masonary_category',
                        'label' => esc_html__('Category ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Inspiration', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_masonary_url',
                        'label' => esc_html__('URL ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'textdomain'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'od_masonary_datafilter_class',
                        'label' => esc_html__('Data Filter Class ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('', 'textdomain'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'od_masonary_title' => esc_html__('Top 10 remote destinations to see in your lifetime', 'textdomain'),
                    ],
                    [
                        'od_masonary_title' => esc_html__('Top 10 remote destinations to see in your lifetime', 'textdomain'),
                    ],
                    [
                        'od_masonary_title' => esc_html__('Top 10 remote destinations to see in your lifetime', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ od_masonary_title }}}',
            ]
        );


        $this->add_control(
            'od_section_masonary_button_list2',
            [
                'label' => esc_html__('Button List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
                'fields' => [
                    [
                        'name' => 'od_masonary_button_text2',
                        'label' => esc_html__('Button Text', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Adventure', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_masonary_button_category_id2',
                        'label' => esc_html__('Button Datafilter Name ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('cat-1', 'textdomain'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'od_masonary_button_text2' => esc_html__('Adventure', 'textdomain'),
                        'od_masonary_button_category_id2' => esc_html__('cat-1', 'textdomain'),
                    ],
                    [
                        'od_masonary_button_text2' => esc_html__('Family Friendly', 'textdomain'),
                        'od_masonary_button_category_id2' => esc_html__('cat-2', 'textdomain'),
                    ],
                    [
                        'od_masonary_button_text2' => esc_html__('Martinlife', 'textdomain'),
                        'od_masonary_button_category_id2' => esc_html__('cat-3', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ od_masonary_button_text2 }}}',
            ]
        );


        $this->add_control(
            'od_section_masonary_content_list2',
            [
                'label' => esc_html__('Content List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'od_design_style' => 'layout-2',
                ],
                'fields' => [
                    [
                        'name' => 'od_masonary_title2',
                        'label' => esc_html__('Masonary Title ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Default Title', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_masonary_subtitle2',
                        'label' => esc_html__('Sub Title ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Sub Title', 'textdomain'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'od_masonary_image_id2',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'od_masonary_datafilter_class2',
                        'label' => esc_html__('Data Filter Class ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('', 'textdomain'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'od_masonary_url2',
                        'label' => esc_html__('URL ', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'textdomain'),
                        'label_block' => true,
                    ],

                ],
                'default' => [
                    [
                        'od_masonary_title2' => esc_html__('Cuba Sailing Adventure', 'textdomain'),
                    ],
                    [
                        'od_masonary_title2' => esc_html__('Tour in New York', 'textdomain'),
                    ],
                    [
                        'od_masonary_title2' => esc_html__('San Martens', 'textdomain'),
                    ],
                    [
                        'od_masonary_title2' => esc_html__('Swizer Lands', 'textdomain'),
                    ],
                    [
                        'od_masonary_title2' => esc_html__('Dhaka Bangladesh', 'textdomain'),
                    ],
                    [
                        'od_masonary_title2' => esc_html__('Discovery Islands', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ od_masonary_title2 }}}',
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'ordainit-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'ordainit-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'ordainit-toolkit'),
                    'uppercase' => __('UPPERCASE', 'ordainit-toolkit'),
                    'lowercase' => __('lowercase', 'ordainit-toolkit'),
                    'capitalize' => __('Capitalize', 'ordainit-toolkit'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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
        $od_section_title_area_switcher = $settings['od_section_title_area_switcher'];
        $od_section_subtitle = $settings['od_section_subtitle'];
        $od_section_title = $settings['od_section_title'];
        $od_section_masonary_content_list = $settings['od_section_masonary_content_list'];


?>

        <?php if ($settings['od_design_style']  == 'layout-2'):
            $od_section_masonary_button_list2 = $settings['od_section_masonary_button_list2'];
            $od_section_masonary_content_list2 = $settings['od_section_masonary_content_list2'];
        ?>

            <!-- start destination area  -->
            <div class="it-portfolio-area it-inner-destination pt-120 pb-85">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-xl-6 col-lg-6">
                            <?php if (!empty($od_section_title_area_switcher)): ?>

                                <div class="it-portfolio-title-box">
                                    <span class="it-section-subtitle"><?php echo esc_html($od_section_subtitle); ?></span>
                                    <h3 class="it-section-title"><?php echo esc_html($od_section_title); ?></h3>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="it-portfolio-filter text-lg-end">
                                <div class="masonary-menu">
                                    <button class="active" data-filter="*">All</button>
                                    <?php foreach ($od_section_masonary_button_list2 as $single_button_item): ?>
                                        <button data-filter=".<?php echo esc_attr($single_button_item['od_masonary_button_category_id2']); ?>"><?php echo esc_html($single_button_item['od_masonary_button_text2']); ?></button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="it-portfolio-wrap mt-65">
                        <div class="row grid">
                            <?php foreach ($od_section_masonary_content_list2 as $single_masonary_item):
                                $single_masonary_item_img_url = $single_masonary_item['od_masonary_image_id2']['url'];
                            ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 <?php echo esc_attr($single_masonary_item['od_masonary_datafilter_class2']); ?> grid-item">
                                    <div class="it-dest-item">
                                        <div class="it-dest-thumb fix mb-20">
                                            <img src="<?php echo esc_url($single_masonary_item_img_url); ?>" alt="">
                                        </div>
                                        <div class="it-dest-content d-flex align-items-center justify-content-between">
                                            <div class="it-dest-text">
                                                <h3 class="it-dest-title">
                                                    <a href="<?php echo esc_url($single_masonary_item['od_masonary_url2']); ?>"><?php echo esc_html($single_masonary_item['od_masonary_title2']); ?></a>
                                                </h3>
                                                <span><?php echo esc_html($single_masonary_item['od_masonary_subtitle2']); ?></span>
                                            </div>
                                            <div class="it-dest-icon">
                                                <a href="<?php echo esc_url($single_masonary_item['od_masonary_url2']); ?>">
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
            <!-- end destination area  -->

        <?php else: ?>


            <!-- start Stories area  -->
            <div class="it-stories-area pt-120 pb-85 p-relative">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <?php if (!empty($od_section_title_area_switcher)): ?>
                                <div class="it-stories-title-box mb-20 text-center">
                                    <span class="it-section-subtitle"><?php echo esc_html($od_section_subtitle, 'ordainit-toolkit'); ?></span>
                                    <h3 class="it-section-title"><?php echo esc_html($od_section_title, 'ordainit-toolkit'); ?></h3>
                                </div>
                            <?php endif; ?>
                            <div class="masonary-menu mb-80 d-md-flex justify-content-md-center">

                                <button class="active" data-filter="*"><?php echo esc_html__('All'); ?></button>
                                <?php foreach ($od_section_masonary_content_list as $single_masonary_item): ?>
                                    <button data-filter=".<?php echo esc_attr($single_masonary_item['od_masonary_button_category_id']); ?>"><?php echo esc_html($single_masonary_item['od_masonary_button_text']); ?></button>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <div class="row grid">
                        <?php foreach ($od_section_masonary_content_list as $single_masonary_item):
                            $single_masonary_item_img_url = $single_masonary_item['od_masonary_image_id']['url'];
                        ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 <?php echo esc_attr($single_masonary_item['od_masonary_datafilter_class']); ?> grid-item">
                                <div class="it-stories-item mb-30 p-relative">
                                    <div class="it-stories-thumb mb-30">
                                        <img src="<?php echo esc_url($single_masonary_item_img_url); ?>" alt="">
                                    </div>
                                    <div class="it-stories-content">
                                        <div class="it-stories-meta-box mb-25 d-flex align-items-center">
                                            <span class="it-stories-categories"><?php echo esc_html($single_masonary_item['od_masonary_category']); ?></span>
                                            <span class="it-stories-meta-text"><?php echo esc_html($single_masonary_item['od_masonary_date']); ?></span>
                                        </div>
                                        <h3 class="it-stories-title">
                                            <a href="<?php echo esc_url($single_masonary_item['od_masonary_url']); ?>"><?php echo esc_html($single_masonary_item['od_masonary_title']); ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- end project area  -->

        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Masonary_Tab());
