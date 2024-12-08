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
class OD_Testimonial_Slider extends Widget_Base
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
        return 'od-testimonial-slider';
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
        return __('Testimonial Slider', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/testimonial-slider.php');
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
        $od_testimonial_lists = $settings['od_testimonial_lists'];
        $od_testimonial_slider_autoplay = $settings['od_testimonial_slider_autoplay'];
        $od_testimonial_title = $settings['od_testimonial_title'];
        $od_testimonial_subtitle = $settings['od_testimonial_subtitle'];
        $od_testimonial_thumbnail = $settings['od_testimonial_thumbnail'];
        $od_testimonial_shape_image_1 = $settings['od_testimonial_shape_image_1'];
        $od_testimonial_shape_image_2 = $settings['od_testimonial_shape_image_2'];
?>


        <?php if ($settings['od_design_style']  == 'layout-4'): ?>

            <div class="it-testi-4-slider-wrap">
                <div class="swiper-container it-testi-4-active">
                    <div class="swiper-wrapper">
                        <?php foreach ($od_testimonial_lists as $od_testimonial_list) :
                            $testimonial_avatar_url = $od_testimonial_list['od_testimonial_list_avatar'];
                            $testimonial_rating_star = $od_testimonial_list['od_testimonial_list_rating'];
                        ?>
                            <div class="swiper-slide">
                                <div class="it-testi-4-avater-box text-center">
                                    <div class="it-testi-4-avater mb-25">
                                        <img src="<?php echo esc_url($testimonial_avatar_url['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_list['od_testimonial_list_author']) ?>">
                                    </div>
                                    <h3 class="it-testi-4-avater-title"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                    <div class="it-testi-4-designation-box d-flex align-items-center justify-content-center">
                                        <span class="it-testi-4-designation-title mr-5"><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                        <div class="it-testi-4-designation-review">
                                            <?php
                                            $rating = intval($testimonial_rating_star); // Convert to integer for safety
                                            for ($i = 1; $i <= $rating; $i++) : ?>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            <?php endfor; ?>

                                        </div>
                                    </div>
                                    <p>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="it-testi-style-3">
                <div class="it-testimonial-wrapper p-relative">
                    <div class="swiper-container it-testi-3-active">
                        <div class="swiper-wrapper">
                            <?php foreach ($od_testimonial_lists as $od_testimonial_list) :
                                $testimonial_avatar_url = $od_testimonial_list['od_testimonial_list_avatar'];
                            ?>
                                <div class="swiper-slide">
                                    <div class="it-testimonial-content">
                                        <div class="it-testimonial-dsc p-relative">
                                            <i class="fa-solid fa-quote-right qoute-1"></i>
                                            <p>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</p>
                                        </div>
                                        <div class="it-testimonial-avater d-flex align-items-center">
                                            <div class="it-testimonial-avater-thumb">
                                                <img src="<?php echo esc_url($testimonial_avatar_url['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_list['od_testimonial_list_author']) ?>">
                                            </div>
                                            <div class="it-testimonial-avater-info">
                                                <h3 class="it-testimonial-avater-title"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                                <span class="it-testimonial-avater-designation"><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="it-testi-2-arrow-box text-end">
                        <button class="testi-2-prev">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button class="testi-2-prev testi-2-next">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="it-testi-2-area pt-120 pb-120 p-relative">
                <div class="it-testi-2-shape-box d-none d-md-block">
                    <div class="it-testi-2-shape-top">
                        <?php
                        $alt_text_1 = str_replace(['-', '_'], ' ', pathinfo($od_testimonial_shape_image_1['url'], PATHINFO_FILENAME));
                        ?>
                        <img src="<?php echo $od_testimonial_shape_image_1['url'] ?>" alt="<?php echo esc_attr($alt_text_1); ?>">
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8">
                            <div class="it-testi-2-title-box">
                                <span class="it-section-subtitle"><?php echo od_kses($od_testimonial_subtitle, 'ordainit-toolkit') ?></span>
                                <h3 class="it-section-title">
                                    <?php echo od_kses($od_testimonial_title, 'ordainit-toolkit') ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-4 col-sm-4">
                            <div class="it-testi-2-arrow-box text-end">
                                <button class="testi-2-prev">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </button>
                                <button class="testi-2-prev testi-2-next">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="it-testi-2-wrap mt-70">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-4">
                                <div class="it-testi-2-thumb-box d-none d-lg-block text-center p-relative">
                                    <div class="it-testi-2-shape d-none d-lg-block">
                                        <?php
                                        $alt_text_2 = str_replace(['-', '_'], ' ', pathinfo($od_testimonial_shape_image_2['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_testimonial_shape_image_2['url'] ?>" alt="<?php echo esc_attr($alt_text_2); ?>">
                                    </div>
                                    <div class="it-testi-2-thumb">
                                        <?php
                                        $alt_text_3 = str_replace(['-', '_'], ' ', pathinfo($od_testimonial_thumbnail['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_testimonial_thumbnail['url'] ?>" alt="<?php echo esc_attr($alt_text_3); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8">
                                <div class="it-testi-2-content theme-bg">
                                    <div class="swiper-container it-testi-2-active">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($od_testimonial_lists as $od_testimonial_list) : ?>
                                                <div class="swiper-slide">
                                                    <div class="it-testi-2-item">
                                                        <div class="it-testi-2-dsc mb-15">
                                                            <i>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</i>
                                                        </div>
                                                        <div
                                                            class="it-testi-2-avater-content d-flex align-items-center justify-content-between">
                                                            <div class="it-testi-2-avater-info">
                                                                <h3 class="it-testi-2-avater-title mb-10"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                                                <span><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
                                                            </div>
                                                            <div class="it-testi-2-avater-quote">
                                                                <i class="fa-solid fa-quote-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="swiper-container it-testimonial-active">
                <div class="swiper-wrapper">
                    <?php foreach ($od_testimonial_lists as $od_testimonial_list):
                        $testimonial_avatar_url = $od_testimonial_list['od_testimonial_list_avatar'];
                        $testimonial_rating_star = $od_testimonial_list['od_testimonial_list_rating'];
                    ?>
                        <div class="swiper-slide">
                            <div class="it-testimonial-item">
                                <div class="it-testimonial-rating">
                                    <?php
                                    $rating = intval($testimonial_rating_star); // Convert to integer for safety
                                    for ($i = 1; $i <= $rating; $i++) : ?>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    <?php endfor; ?>
                                </div>
                                <div class="it-testimonial-dsc">
                                    <p>“<?php echo od_kses($od_testimonial_list['od_testimonial_list_description'], 'orsdainit-toolkit') ?>”</p>
                                </div>
                                <div class="it-testimonial-avater-box d-flex align-items-center">
                                    <div class="it-testimonial-avater-thumb p-relative">
                                        <img src="<?php echo esc_url($testimonial_avatar_url['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_list['od_testimonial_list_author']) ?>">
                                        <div class="it-testimonial-avater-icon">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>
                                    </div>
                                    <div class="it-testimonial-avater-info">
                                        <h3 class="it-testimonial-avater-title"><?php echo esc_html($od_testimonial_list['od_testimonial_list_author'], 'ordainit-toolkit') ?></h3>
                                        <span class="it-testimonial-avater-designation"><?php echo esc_html($od_testimonial_list['od_testimonial_list_designation'], 'ordainit-toolkit') ?></span>
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
                const sliderAutoplay = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay3 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay4 = <?php echo $od_testimonial_slider_autoplay ? 'true' : 'false'; ?>;

                // Testimonial Layout 1
                const testiMonialswiper = new Swiper('.it-testimonial-active', {
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
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },

                });

                // Testimonial Layout 2
                const testiMonial2swiper = new Swiper('.it-testi-2-active', {
                    speed: 1000,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.testi-2-prev',
                        nextEl: '.testi-2-next',
                    }
                });

                // Testi - layout - 3
                const testi3swiper = new Swiper('.it-testi-3-active', {
                    speed: 1000,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay3 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.testi-2-prev',
                        nextEl: '.testi-2-next',
                    }

                });


                // Testi layout-4
                const testiMonial4swiper = new Swiper('.it-testi-4-active', {
                    speed: 1000,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 1,
                        },
                        '1200': {
                            slidesPerView: 1,
                        },
                        '992': {
                            slidesPerView: 1,
                        },
                        '768': {
                            slidesPerView: 1,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    pagination: {
                        el: ".it-testi-4-dots",
                        clickable: true,
                    }

                });



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Testimonial_Slider());
