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
class od_About_Image_Box extends Widget_Base
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
        return 'about-image-boz';
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
        return __('About Image Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/about-image-box.php');
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

        $od_about_image_box1 = $settings['od_about_image_box1'];
        $od_about_image_box2 = $settings['od_about_image_box2'];
        $od_about_image_box3 = $settings['od_about_image_box3'];


?>

        <?php if ($settings['od_design_style']  == 'layout-2'):
            $od_about_experienct_box_switcher = $settings['od_about_experienct_box_switcher'];
            $od_about_experienct_box_title = $settings['od_about_experienct_box_title'];
            $od_about_experienct_box_subtitle = $settings['od_about_experienct_box_subtitle'];
            $od_about_experienct_box_counter = $settings['od_about_experienct_box_counter'];
            $od_about_experienct_box_counter_symbol = $settings['od_about_experienct_box_counter_symbol'];
        ?>
            <div class="it-about-style-2 ">
                <div class="it-about-thumb-wrap d-flex justify-content-sm-center justify-content-md-end">
                    <div class="it-about-main-thumb p-relative">
                        <img src="<?php echo esc_url($od_about_image_box1['url'], 'ordainit-toolkit'); ?>" alt="">
                        <?php if (!empty($od_about_experienct_box_switcher)): ?>
                            <div class="it-about-experience-box theme-bg-2 d-flex align-items-center" style="background-image: url();">
                                <h3 class="it-about-experience-title">
                                    <b class="purecounter" data-purecounter-duration="0" data-purecounter-end="<?php echo esc_attr($od_about_experienct_box_counter, 'ordainit-toolkit'); ?>"><?php echo esc_html($od_about_experienct_box_counter, 'ordainit-toolkit'); ?></b>
                                    <?php echo esc_html($od_about_experienct_box_counter_symbol, 'ordainit-toolkit'); ?><br><?php echo esc_html($od_about_experienct_box_title, 'ordainit-toolkit'); ?>
                                </h3>
                                <span class="it-about-experience-text"><?php echo esc_html($od_about_experienct_box_subtitle, 'ordainit-toolkit'); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="it-about-sub-thumb d-none d-md-block">
                            <img src="<?php echo esc_url($od_about_image_box2['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                    </div>
                </div>

            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-3'):
            $od_about_image_box_shap1 = $settings['od_about_image_box_shap1'];
            $od_about_image_box_shap2 = $settings['od_about_image_box_shap2'];
            $od_about_image_box_shap3 = $settings['od_about_image_box_shap3'];
        ?>
            <div class="it-about-style-3">

                <?php if (!empty($od_about_image_box1['url'])): ?>

                    <div class="it-about-thumb-wrap d-flex justify-content-center">
                        <div class="it-about-main-thumb z-index p-relative">
                            <img src="<?php echo esc_url($od_about_image_box1['url'], 'ordainit-toolkit'); ?>" alt="">
                            <span class="it-about-thumb-shape"></span>
                            <div class="it-about-thumb-rocket d-none d-sm-block">
                                <img src="<?php echo esc_url($od_about_image_box_shap1['url'], 'ordainit-toolkit'); ?>" alt="">
                            </div>
                            <div class="it-about-thumb-cloud-1">
                                <span>
                                    <img src="<?php echo esc_url($od_about_image_box_shap2['url'], 'ordainit-toolkit'); ?>" alt="">
                                </span>
                            </div>
                            <div class="it-about-thumb-cloud-2">
                                <span>
                                    <img src="<?php echo esc_url($od_about_image_box_shap3['url'], 'ordainit-toolkit'); ?>" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        <?php elseif ($settings['od_design_style']  == 'layout-4'):


            $od_about_image_box1 = $settings['od_about_image_box1'];
            $od_about_image_box2 = $settings['od_about_image_box2'];
            $od_about_image_box3 = $settings['od_about_image_box3'];
            $od_about_image_box_shap21 = $settings['od_about_image_box_shap21'];
            $od_about_experienced_box4_counter_text = $settings['od_about_experienced_box4_counter_text'];
            $od_about_experienced_box4_counter_number = $settings['od_about_experienced_box4_counter_number'];


        ?>
            <div class="inner-about-style">


                <div class="it-about-thumb-wrap d-sm-flex align-items-center justify-content-center justify-content-lg-end">
                    <div class="it-about-thumb-box d-flex flex-column">
                        <div class="it-about-thumb-1 text-center text-sm-end">
                            <img src="<?php echo esc_url($od_about_image_box1['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                        <div class="it-about-thumb-2">
                            <img src="<?php echo esc_url($od_about_image_box2['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                    </div>
                    <div class="it-about-thumb-single text-center text-sm-start">
                        <div class="it-about-thumb-shape d-none d-sm-block">
                            <img src="<?php echo esc_url($od_about_image_box_shap21['url'], 'ordainit-toolkit'); ?>" alt="">
                        </div>
                        <img class="mb-30" src="<?php echo esc_url($od_about_image_box3['url'], 'ordainit-toolkit'); ?>" alt="">
                        <div class="it-about-experience p-relative">
                            <div class="it-about-experience-icon">
                                <span>
                                    <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.6406 7.41602L28.0643 7.41602L28.0643 21.8397" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.86719 27.6133L27.8632 7.6173" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                            <h3 class="it-about-experience-number">
                                <b class="purecounter" data-purecounter-duration="0" data-purecounter-end="<?php echo esc_attr($od_about_experienced_box4_counter_number, 'ordainit-toolkit'); ?>"><?php echo esc_html($od_about_experienced_box4_counter_number, 'ordainit-toolkit'); ?></b>
                            </h3>
                            <i><?php echo esc_html($od_about_experienced_box4_counter_text, 'ordainit-toolkit'); ?></i>
                        </div>
                    </div>
                </div>

            </div>

        <?php else: ?>


            <div class="it-about-thumb-wrap">
                <div class="it-about-main-thumb p-relative text-center">
                    <img src="<?php echo esc_url($od_about_image_box1['url'], 'ordainit-toolkit'); ?>" alt="">
                    <div class="it-about-sub-thumb-1 d-none d-lg-block">
                        <img src="<?php echo esc_url($od_about_image_box2['url'], 'ordainit-toolkit'); ?>" alt="">
                    </div>
                    <div class="it-about-sub-thumb-2 d-none d-lg-block">
                        <img src="<?php echo esc_url($od_about_image_box3['url'], 'ordainit-toolkit'); ?>" alt="">
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

$widgets_manager->register(new od_About_Image_Box());
