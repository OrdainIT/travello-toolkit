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
class OD_Icon_Box extends Widget_Base
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
        return 'od-icon-box';
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
        return __('Icon Box', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/icon-box.php');
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
        $od_icon_box_icon_class = $settings['od_icon_box_icon_class'];
        $od_icon_box_title = $settings['od_icon_box_title'];
        $od_icon_box_description = $settings['od_icon_box_description'];
        $od_icon_box_counter_end = $settings['od_icon_box_counter_end'];
        $od_icon_box_counter_text = $settings['od_icon_box_counter_text'];
        $od_icon_box_icon_image = $settings['od_icon_box_icon_image'];
?>

        <?php if ($settings['od_design_style']  == 'layout-4'): ?>



            <div class="it-about-service-item d-flex align-items-center">
                <div class="it-about-service-icon mr-20">
                    <span>
                        <?php
                        $alt_text = str_replace(['-', '_'], ' ', pathinfo($od_icon_box_icon_image['url'], PATHINFO_FILENAME));
                        ?>
                        <img src="<?php echo $od_icon_box_icon_image['url'] ?>" alt="<?php echo esc_attr($alt_text); ?>">
                    </span>
                </div>

                <div class="it-about-service-text">
                    <h3 class="it-about-service-title"><?php echo od_kses($od_icon_box_title, 'ordainit-toolkit'); ?></h3>
                    <p><?php echo od_kses($od_icon_box_description, 'ordainit-toolkit'); ?>
                    </p>
                </div>
            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-3'): ?>

            <div class="it-chooseus-rating-content d-flex align-items-center">
                <div class="it-chooseus-rating-icon">
                    <i class="<?php echo esc_attr($od_icon_box_icon_class); ?>"></i>
                </div>

                <div class="it-chooseus-rating-text">
                    <h3 class="it-chooseus-rating-title">
                        <b class="purecounter"
                            data-purecounter-duration="1"
                            data-purecounter-end="<?php echo esc_attr($od_icon_box_counter_end, 'ordainit-toolkit'); ?>">
                            <?php echo esc_html($od_icon_box_counter_end, 'ordainit-toolkit'); ?>
                        </b>+
                    </h3>
                    <p><?php echo esc_html($od_icon_box_counter_text, 'ordainit-toolkit'); ?></p>
                </div>
            </div>


        <?php elseif ($settings['od_design_style']  == 'layout-2'): ?>

            <!-- Layout - 2 -->
            <div class="it-chooseus-service-content d-flex align-items-center">
                <div class="it-chooseus-service-icon">
                    <i class="<?php echo esc_attr($od_icon_box_icon_class); ?>"></i>
                </div>
                <h3 class="it-chooseus-service-title"><?php echo od_kses($od_icon_box_title, 'ordainit-toolkit'); ?></h3>
            </div>

        <?php else: ?>
            <!-- Layout - 1 -->

            <div class="it-about-service-item d-flex align-items-center">
                <div class="it-about-service-icon mr-20">
                    <span>
                        <i class="<?php echo esc_attr($od_icon_box_icon_class); ?>"></i>
                    </span>
                </div>
                <div class="it-about-service-text">
                    <h3 class="it-about-service-title"><?php echo od_kses($od_icon_box_title, 'ordainit-toolkit'); ?></h3>
                    <p><?php echo od_kses($od_icon_box_description, 'ordainit-toolkit'); ?></p>
                </div>
            </div>

        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {
                if ($(".purecounter").length) {
                    new PureCounter({
                        filesizing: true,
                        selector: ".filesizecount",
                        pulse: 2,
                    });
                    new PureCounter();
                }

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Icon_Box());
