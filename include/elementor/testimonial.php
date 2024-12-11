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
class OD_Testimonial extends Widget_Base
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
        return 'od-testimonial';
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
        return __('Testimonial', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/testimonial.php');
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
        $od_testimonial_single_description = $settings['od_testimonial_single_description'];
        $od_testimonial_single_author = $settings['od_testimonial_single_author'];
        $od_testimonial_single_designation = $settings['od_testimonial_single_designation'];
        $od_testimonial_single_avatar = $settings['od_testimonial_single_avatar'];
?>

        <div class="it-testi-inner-2">
            <div class="it-testi-item">
                <div class="it-testi-dsc p-relative">
                    <p><?php echo od_kses($od_testimonial_single_description, 'ordainit-toolkit') ?></p>
                </div>
                <div class="it-testi-author-box mb-30 d-flex align-items-center justify-content-center">
                    <div class="it-testi-author-thumb mr-30">
                        <img src="<?php echo esc_url($od_testimonial_single_avatar['url'], 'ordainit-toolkit') ?>" alt="<?php echo esc_html($od_testimonial_single_author, 'ordainit-toolkit')  ?>">
                    </div>
                    <div class="it-testi-author-text">
                        <h3 class="it-testi-author-title"><?php echo esc_html($od_testimonial_single_author, 'ordainit-toolkit')  ?></h3>
                        <span class="it-testi-author-desig"><?php echo esc_html($od_testimonial_single_designation, 'ordainit-toolkit') ?></span>
                    </div>
                </div>
            </div>
        </div>


        <script>
            jQuery(document).ready(function($) {



            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Testimonial());
