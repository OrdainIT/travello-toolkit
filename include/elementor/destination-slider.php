<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Widget_Base;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Od_Destination_Slider extends Widget_Base
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
        return 'od-destination-slider';
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
        return __('Destination Slider', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/destination-slider.php');
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
        $od_destination_slider_content_wrap = $settings['od_destination_slider_content_wrap'];
        $od_destination_slider_autoplay_switcher = $settings['od_destination_slider_autoplay_switcher'];
?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>
            <div class="it-destination-2-area it-destination-2-pt it-destination-2-overlay p-relative pt-120 pb-120 fix">
                <div class="it-destination-2-shape-box">
                    <div class="it-destination-2-shape-1 d-none d-xl-block">
                        <img src="assets/img/home-2/destination/shape/d-walk.png" alt="">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="it-destination-2-title-box">
                                <span class="it-section-subtitle">DESTINATION LIST</span>
                                <h3 class="it-section-title">Explore the Beautiful Places Around World</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do..</p>
                            </div>
                            <div class="it-destination-2-button">
                                <a href="about.html" class="it-btn-secondary">Discover More</a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="it-destination-2-slider-wrap p-relative">
                                <div class="swiper-container it-destination-2-active">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="it-destination-2-item p-relative">
                                                <div class="it-destination-2-thumb">
                                                    <img src="assets/img/home-2/destination/d-1-1.jpg" alt="">
                                                </div>
                                                <div class="it-destination-2-text text-center">
                                                    <h3 class="it-destination-2-place"><a href="destination.html">Angola</a></h3>
                                                    <span class="it-destination-2-tourist">15 Tours</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="it-destination-2-item p-relative">
                                                <div class="it-destination-2-thumb">
                                                    <img src="assets/img/home-2/destination/d-1-2.jpg" alt="">
                                                </div>
                                                <div class="it-destination-2-text text-center">
                                                    <h3 class="it-destination-2-place"><a href="destination.html">new york</a></h3>
                                                    <span class="it-destination-2-tourist">20 Tours</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="it-destination-2-item p-relative">
                                                <div class="it-destination-2-thumb">
                                                    <img src="assets/img/home-2/destination/d-1-3.jpg" alt="">
                                                </div>
                                                <div class="it-destination-2-text text-center">
                                                    <h3 class="it-destination-2-place"><a href="destination.html">Switzerland</a></h3>
                                                    <span class="it-destination-2-tourist">08 Tours</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="it-destination-2-item p-relative">
                                                <div class="it-destination-2-thumb">
                                                    <img src="assets/img/home-2/destination/d-1-4.jpg" alt="">
                                                </div>
                                                <div class="it-destination-2-text text-center">
                                                    <h3 class="it-destination-2-place"><a href="destination.html">Europe</a></h3>
                                                    <span class="it-destination-2-tourist">20 Tours</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="it-destination-2-arrow-box d-none d-md-block">
                                    <button class="destination-2-prev it-slide-btn-1">
                                        <i class="flaticon-left-chevron"></i>
                                    </button>
                                    <button class="destination-2-next it-slide-btn-2">
                                        <i class="flaticon-chevron"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>
        <?php elseif ($settings['od_design_style']  == 'layout-4'): ?>
        <?php else: ?>


            <div class="it-destination-slider-wrap">
                <div class="swiper-container it-destination-slider-active">
                    <div class="swiper-wrapper">
                        <?php foreach ($od_destination_slider_content_wrap as $single_destination_wrap):
                            $od_destination_thumb_url = $single_destination_wrap['od_destination_slider_image'];
                        ?>
                            <div class="swiper-slide">
                                <div class="it-destination-item p-relative">
                                    <div class="it-destination-thumb">
                                        <img src="<?php echo esc_url($od_destination_thumb_url['url'], 'ordainit-toolkit'); ?>" alt="">
                                    </div>
                                    <div class="it-destination-content">
                                        <h3 class="it-destination-title"><a href="<?php echo esc_url($single_destination_wrap['od_destination_slider_url'], 'ordainit-toolkit'); ?>"><?php echo esc_html($single_destination_wrap['od_destination_slider_title'], 'ordainit-toolkit'); ?></a></h3>
                                        <span><?php echo esc_html($single_destination_wrap['od_destination_slider_subtitle'], 'ordainit-toolkit'); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>



        <?php endif; ?>








        <script>
            jQuery(document).ready(function($) {

                ////////////////////////////////////////////////////
                // 16. Swiper Js

                const desination_slider_autoplay = <?php echo $od_destination_slider_autoplay_switcher ? 'true' : 'false'; ?>;
                const destiNationswiper = new Swiper('.it-destination-slider-active', {
                    speed: 1000,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: desination_slider_autoplay ? {
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
                            slidesPerView: 2,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },

                });


                ////////////////////////////////////////////////////
                // 19. Swiper Js
                const desination_slider_autoplay2 = <?php echo $od_destination_slider_autoplay_switcher ? 'true' : 'false'; ?>;
                const destiNation2swiper = new Swiper(".it-destination-2-active", {
                    speed: 1000,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: desination_slider_autoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        1400: {
                            slidesPerView: 4,
                        },
                        1200: {
                            slidesPerView: 4,
                        },
                        992: {
                            slidesPerView: 4,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                        576: {
                            slidesPerView: 3,
                        },
                        0: {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: ".destination-2-prev",
                        nextEl: ".destination-2-next",
                    },
                });



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_Destination_Slider());
