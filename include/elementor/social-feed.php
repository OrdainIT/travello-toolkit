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
class Od_Social_Feed extends Widget_Base
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
        return 'od-social-feed';
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
        return __('Social Feed', 'ordainit-toolkit');
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
            'od_social_feed',
            [
                'label' => __('Content', 'ordainit-toolkit'),
            ]
        );



        $this->add_control(
            'od_social_feed_lists',
            [
                'label' => esc_html__('Social Feed List', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'od_social_feed_title',
                        'label' => esc_html__('Social Feed', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Social Feed', 'ordainit-toolkit'),
                    ],
                    [
                        'name' => 'od_social_feed_image',
                        'label' => esc_html__('Thumbnail Image', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/home-5/instagram/insta-1.jpg',
                        ],
                    ],
                    [
                        'name' => 'od_social_feed_icon',
                        'label' => esc_html__('Icon', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fa-brands fa-instagram',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'name' => 'od_social_feed_url',
                        'label' => esc_html__('URL', 'ordainit-toolkit'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('#', 'ordainit-toolkit'),
                    ],
                ],
                'default' => [
                    [
                        'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
                    ],
                    [
                        'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
                    ],
                    [
                        'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
                    ],
                    [
                        'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
                    ],
                    [
                        'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
                    ],
                    [
                        'od_social_feed_title' => esc_html__('Social Feed', 'ordainit-toolkit'),
                    ],
                ],
                'title_field' => '{{{ od_social_feed_title }}}',
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
        $od_social_feed_lists = $settings['od_social_feed_lists'];
?>

        <div class="swiper-container it-insta-active">
            <div class="swiper-wrapper">
                <?php foreach ($od_social_feed_lists as $single_social_feed):
                    $social_feed_img_url = $single_social_feed['od_social_feed_image'];
                    $social_feed_icon_value = $single_social_feed['od_social_feed_icon'];
                ?>
                    <div class="swiper-slide">
                        <div class="it-instagram-item">
                            <div class="it-instagram-thumb p-relative">
                                <img src="<?php echo esc_url($social_feed_img_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                <div class="it-instagram-icon">
                                    <a href="<?php echo esc_url($single_social_feed['od_social_feed_url'], 'ordainit-toolkit'); ?>">
                                        <i class="<?php echo esc_attr($social_feed_icon_value['value'], 'ordainit-toolkit'); ?>"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>






        <script>
            jQuery(document).ready(function($) {


                ////////////////////////////////////////////////////
                // 27. Swiper Js
                const instaSwiper = new Swiper(".it-insta-active", {
                    speed: 1000,
                    slidesPerView: 5,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: true,
                    breakpoints: {
                        1400: {
                            slidesPerView: 5,
                        },
                        1200: {
                            slidesPerView: 5,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        0: {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: ".it-cat-prev",
                        nextEl: ".it-cat-next",
                    },
                });



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Social_Feed());
