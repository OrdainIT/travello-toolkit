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
class Od_Destination extends Widget_Base
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
        return 'od-destination';
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
        return __('Destination', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/destination.php');
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
        $od_destination_content_title = $settings['od_destination_content_title'];
        $od_destination_content_subtitle = $settings['od_destination_content_subtitle'];
        $od_destination_content_url = $settings['od_destination_content_url'];
        $od_destination_content_thumbnail = $settings['od_destination_content_thumbnail'];
        $od_destination_content_tour_count = $settings['od_destination_content_tour_count'];
        $od_destination_content_traveler_count = $settings['od_destination_content_traveler_count'];
?>

        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="it-destination-list-item p-relative">
                <span class="it-destination-list-number"><?php echo esc_html($od_destination_content_tour_count, 'ordainit-toolkit'); ?> Tours</span>
                <div class="it-destination-list-thumb fix p-relative">
                    <a href="">
                        <img src="<?php echo esc_url($od_destination_content_thumbnail['url'], 'ordainit-toolkit'); ?>" alt="">
                    </a>
                    <div class="it-destination-list-text">
                        <h3 class="it-destination-list-title"><a href="<?php echo esc_url($od_destination_content_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($od_destination_content_title, 'ordainit-toolkit'); ?></a></h3>
                        <span class="it-destination-list-departures"><?php echo esc_html($od_destination_content_traveler_count, 'ordainit-toolkit'); ?> Departures</span>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="it-inner-destination">
                <div class="it-dest-item">
                    <div class="it-dest-thumb fix mb-20">
                        <img src="<?php echo esc_url($od_destination_content_thumbnail['url'], 'ordainit-toolkit'); ?>" alt="">
                    </div>
                    <div class="it-dest-content d-flex align-items-center justify-content-between">
                        <div class="it-dest-text">
                            <h3 class="it-dest-title">
                                <a href="<?php echo esc_url($od_destination_content_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($od_destination_content_title, 'ordainit-toolkit'); ?></a>
                            </h3>
                            <span><?php echo esc_html($od_destination_content_subtitle, 'ordainit-toolkit'); ?></span>
                        </div>
                        <div class="it-dest-icon">
                            <a href="<?php echo esc_url($od_destination_content_url, 'ordainit-toolkit'); ?>">
                                <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
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

$widgets_manager->register(new Od_Destination());
