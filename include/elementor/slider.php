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
class Od_slider extends Widget_Base
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
        return 'slider';
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
        return __('Slider', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/slider.php');
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
        $od_slider_content_lists = $settings['od_slider_content_lists'];


?>


        <!-- start slider area  -->
        <div class="it-slider-area fix">
            <div class="it-slider-wrapper p-relative">
                <div class="swiper-container it-slider-active">
                    <div class="swiper-wrapper">
                        <?php foreach ($od_slider_content_lists as $single_slider_item):
                            $slider_img_url = $single_slider_item['od_slider_content_list_image'];

                        ?>
                            <div class="swiper-slide">
                                <div class="it-slider-item it-slider-overlay it-slider-height p-relative d-flex align-items-center">
                                    <div class="it-slider-bg" style="background-image: url(<?php echo esc_url($slider_img_url['url'], 'ordainit-toolkit'); ?>);"></div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="it-slider-title-box text-center mb-85 z-index">
                                                    <span class="it-section-subtitle"><?php echo od_kses($single_slider_item['od_slider_content_list_subtitle'], 'ordainit-toolkit'); ?></span>
                                                    <h3 class="it-slider-title"><?php echo od_kses($single_slider_item['od_slider_content_list_title'], 'ordainit-toolkit'); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="it-tour-package-main">
                    <div class="container">
                        <div class="it-tour-package-wrap it-slider-tour-style it-tour-package-box z-index">
                            <div class="it-tour-package-location__wrapper">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="it-tour-package-item d-flex">
                                            <div class="it-tour-package-icon">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="it-tour-package-text">
                                                <h3 class="it-tour-package-title">Location</h3>
                                                <input type="text" placeholder="Where are your going?">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="it-tour-package-item d-flex">
                                            <div class="it-tour-package-icon">
                                                <i class="fa-light fa-calendar"></i>
                                            </div>
                                            <div class="it-tour-package-text">
                                                <h3 class="it-tour-package-title">Check In</h3>
                                                <div class="it-clander-input">
                                                    <input class="form-control" id="selectingMultipleDates" type="text" placeholder="Check In" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="it-tour-package-item d-flex">
                                            <div class="it-tour-package-icon">
                                                <i class="fa-light fa-calendar"></i>
                                            </div>
                                            <div class="it-tour-package-text">
                                                <h3 class="it-tour-package-title">Check Out</h3>
                                                <div class="it-clander-input">
                                                    <input class="form-control" id="selectingMultipleDatess" type="text" placeholder="Check Out" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="it-tour-package-item d-flex">
                                            <div class="it-tour-package-icon">
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                            <div class="it-tour-package-text">
                                                <h3 class="it-tour-package-title">Guest</h3>
                                                <input type="text" placeholder="Total Guest">
                                            </div>
                                            <div class="it-tour-package-search">
                                                <button type="submit">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end slider area  -->





        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Od_slider());
