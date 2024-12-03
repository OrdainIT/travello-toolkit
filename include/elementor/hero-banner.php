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
class Hero_Banner extends Widget_Base
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
        return 'hero-banner';
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
        return __('Hero banner', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/hero-banner.php');
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
        $od_title = $settings['od_title'];
        $od_subtitle = $settings['od_subtitle'];
        $od_description = $settings['od_description'];
        $od_btn_text = $settings['od_btn_text'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];
        $od_thumbnail_image = $settings['od_thumbnail_image'];
        $od_thumbnail_image_2 = $settings['od_thumbnail_image_2'];
        $od_shape_image_1 = $settings['od_shape_image_1'];
        $od_shape_image_2 = $settings['od_shape_image_2'];
        $od_shape_image_3 = $settings['od_shape_image_3'];



?>
        <?php if ($settings['od_design_style']  == 'layout-2'):

            // Link
            if ('2' == $od_btn_link_type) {
                $this->add_render_attribute('od-button-arg', 'href', get_permalink($od_btn_page_link));
                $this->add_render_attribute('od-button-arg', 'target', '_self');
                $this->add_render_attribute('od-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
            } else {
                if (! empty($od_btn_link['url'])) {
                    $this->add_link_attributes('od-button-arg', $od_btn_link);
                    $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
                }
            }
        ?>

            <div class="it-hero-area fix it-hero-overlay it-hero-height it-hero-bg p-relative" data-background="assets/img/home-3/hero/hero-bg.jpg" style="background-image: url(&quot;assets/img/home-3/hero/hero-bg.jpg&quot;);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="it-hero-content-wrap p-relative">
                                <div class="it-hero-content-shape d-none d-md-block">
                                    <img src="assets/img/home-3/hero/shape/star.png" alt="">
                                </div>
                                <div class="it-hero-title-box mb-30">
                                    <span class="it-section-subtitle wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"><?php echo od_kses($od_subtitle, 'ordainit-toolkit') ?></span>
                                    <h3 class="it-section-title mb-20 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s"><?php echo od_kses($od_title, 'ordainit-toolkit') ?></h3>
                                    <p class="wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s"><?php echo od_kses($od_description, 'ordainit-toolkit') ?></p>
                                </div>
                                <div class="it-hero-button-area d-flex align-items-center wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".8s">
                                    <div class="it-hero-action mr-20">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_btn_text, 'ordainit-toolkit') ?>
                                        </a>
                                    </div>
                                    <div class="it-hero-customer-box-wrap d-none d-sm-block">
                                        <div class="it-hero-customer-box d-flex align-items-center">
                                            <div class="it-hero-customer-thumb mr-15">
                                                <img src="assets/img/home-3/hero/shape/customer.png" alt="">
                                            </div>
                                            <div class="it-hero-customer-text">
                                                <span>MORE THAN&nbsp;10K+<br>TRUSTED CUSTOMERS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="it-hero-thumb-box p-relative">
                                <div class="it-hero-thumb-shape d-none d-sm-block">
                                    <img src="assets/img/home-3/hero/shape/ballon.png" alt="">
                                </div>
                                <div class="it-hero-thumb p-relative">
                                    <?php
                                    $alt_text_1 = str_replace(['-', '_'], ' ', pathinfo($od_thumbnail_image['url'], PATHINFO_FILENAME));
                                    ?>
                                    <img src="<?php echo $od_thumbnail_image['url'] ?>" alt="<?php echo esc_attr($alt_text_1); ?>">
                                    <div class="it-hero-sub-thumb">
                                        <?php
                                        $alt_text_1 = str_replace(['-', '_'], ' ', pathinfo($od_thumbnail_image_2['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_thumbnail_image_2['url'] ?>" alt="<?php echo esc_attr($alt_text_1); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>


        <?php else:

            // Link
            if ('2' == $od_btn_link_type) {
                $this->add_render_attribute('od-button-arg', 'href', get_permalink($od_btn_page_link));
                $this->add_render_attribute('od-button-arg', 'target', '_self');
                $this->add_render_attribute('od-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
            } else {
                if (! empty($od_btn_link['url'])) {
                    $this->add_link_attributes('od-button-arg', $od_btn_link);
                    $this->add_render_attribute('od-button-arg', 'class', 'it-btn-primary');
                }
            }
        ?>


            <div class="it-hero-area it-hero-3 it-hero-3-space it-about-style-3 grey-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="it-hero-content-wrap p-relative">
                                <div class="it-hero-title-box mb-30">
                                    <span class="it-section-subtitle wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"><?php echo od_kses($od_subtitle, 'ordainit-toolkit') ?></span>
                                    <h3 class="it-slider-title mb-20 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s"><?php echo od_kses($od_title, 'ordainit-toolkit') ?></h3>
                                    <p class="wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s"><?php echo od_kses($od_description, 'ordainit-toolkit') ?></p>
                                </div>
                                <div class="it-hero-button-area d-flex align-items-center wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                                    <div class="it-hero-action mr-20">
                                        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
                                            <?php echo esc_html($od_btn_text, 'ordainit-toolkit') ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="it-about-thumb-wrap it-hero-3-thumb-pl d-flex justify-content-center">
                                <div class="it-about-main-thumb z-index p-relative">
                                    <?php
                                    $alt_text_1 = str_replace(['-', '_'], ' ', pathinfo($od_thumbnail_image['url'], PATHINFO_FILENAME));
                                    ?>
                                    <img src="<?php echo $od_thumbnail_image['url'] ?>" alt="<?php echo esc_attr($alt_text_1); ?>">

                                    <span class="it-about-thumb-shape"></span>
                                    <div class="it-about-thumb-rocket d-none d-sm-block">
                                        <?php
                                        $alt_text_2 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_1['url'], PATHINFO_FILENAME));
                                        ?>
                                        <img src="<?php echo $od_shape_image_1['url'] ?>" alt="<?php echo esc_attr($alt_text_2); ?>">
                                    </div>
                                    <div class="it-about-thumb-cloud-1 d-none d-sm-block">
                                        <span>
                                            <?php
                                            $alt_text_3 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_2['url'], PATHINFO_FILENAME));
                                            ?>
                                            <img src="<?php echo $od_shape_image_2['url'] ?>" alt="<?php echo esc_attr($alt_text_3); ?>">

                                        </span>
                                    </div>
                                    <div class="it-about-thumb-cloud-2 d-none d-sm-block">
                                        <span>
                                            <?php
                                            $alt_text_3 = str_replace(['-', '_'], ' ', pathinfo($od_shape_image_3['url'], PATHINFO_FILENAME));
                                            ?>
                                            <img src="<?php echo $od_shape_image_3['url'] ?>" alt="<?php echo esc_attr($alt_text_3); ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new Hero_Banner());
