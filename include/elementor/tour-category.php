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
class OD_Tour_Category extends Widget_Base
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
        return 'od-tour-category';
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
        return __('Tour Category', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/tour-category.php');
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
        $od_tour_category_title = $settings['od_tour_category_title'];
        $od_tour_category_subtitle = $settings['od_tour_category_subtitle'];
        $od_tour_category_shape = $settings['od_tour_category_shape'];
        $od_tour_category_slider_arrow_switcher = $settings['od_tour_category_slider_arrow_switcher'];
        $od_tour_category_slider_autoplay = $settings['od_tour_category_slider_autoplay'];
        $od_tour_category_lists = $settings['od_tour_category_lists'];
?>

        <div class="it-categories-area it-categories-pd black-bg">
            <div class="it-categories-wrap p-relative">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-6">
                            <div class="it-categories-title-box mb-55 p-relative">
                                <div class="it-categories-shape d-none d-xl-block">
                                    <span>
                                        <img src="<?php echo esc_url($od_tour_category_shape['url'], 'ordainit-toolkit') ?>" alt="">
                                    </span>
                                </div>
                                <span class="it-section-subtitle"><?php echo esc_html($od_tour_category_subtitle, 'ordainit-toolkit') ?></span>
                                <h3 class="it-section-title"><?php echo esc_html($od_tour_category_title, 'ordainit-toolkit') ?></h3>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <?php if (!empty($od_tour_category_slider_arrow_switcher)) : ?>
                                <div class="it-categories-arrow-box">
                                    <button class="it-cat-prev" tabindex="0">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </button>
                                    <button class="it-cat-next" tabindex="0">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="swiper-container it-categories-active">
                                <div class="swiper-wrapper">
                                    <?php foreach ($od_tour_category_lists as $od_tour_category_list) :
                                        $icon_img_url = $od_tour_category_list['od_tour_category_list_icon_img'];
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="it-categories-item text-center">
                                                <div class="it-categories-icon mb-15">
                                                    <span>
                                                        <img src="<?php echo esc_url($icon_img_url['url'], 'ordainit-toolkit') ?>"
                                                            alt="">

                                                    </span>

                                                </div>
                                                <h3 class="it-categories-title">
                                                    <a href="#"><?php echo esc_html($od_tour_category_list['od_tour_category_list_title'], 'ordainit-toolkit') ?></a>
                                                </h3>
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



        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_tour_category_slider_autoplay ? 'true' : 'false'; ?>;

                const categoriesSwiper = new Swiper('.it-categories-active', {
                    speed: 1000,
                    slidesPerView: 5,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 5,
                        },
                        '1200': {
                            slidesPerView: 5,
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
                    navigation: {
                        prevEl: '.it-cat-prev',
                        nextEl: '.it-cat-next',
                    }
                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Tour_Category());
