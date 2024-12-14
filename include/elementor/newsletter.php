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
class Od_Newsletter extends Widget_Base
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
        return 'newsletter';
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
        return __('Newsletter', 'ordainit-toolkit');
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


    public function get_od_contact_form()
    {
        if (! class_exists('WPCF7')) {
            return;
        }
        $od_cfa         = array();
        $od_cf_args     = array('posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form');
        $od_forms       = get_posts($od_cf_args);
        $od_cfa         = ['0' => esc_html__('Select Form', 'odcore')];
        if ($od_forms) {
            foreach ($od_forms as $od_form) {
                $od_cfa[$od_form->ID] = $od_form->post_title;
            }
        } else {
            $od_cfa[esc_html__('No contact form found', 'odcore')] = 0;
        }
        return $od_cfa;
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/newsletter.php');
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

        $od_newsletter_title_content_title = $settings['od_newsletter_title_content_title'];
        $od_newsletter_title_content_subtitle = $settings['od_newsletter_title_content_subtitle'];
        $od_newsletter_contact_form = $settings['od_newsletter_contact_form_list'];
        $od_newsletter_title_content_shape_1 = $settings['od_newsletter_title_content_shape_1'];
        $od_newsletter_title_content_shape_2 = $settings['od_newsletter_title_content_shape_2'];
        $od_newsletter_title_content_shape_3 = $settings['od_newsletter_title_content_shape_3'];
?>

        <div class="it-newsletter-area it-newsletter-height fix p-relative theme-bg-2">
            <div class="it-newsletter-shape-1 d-none d-lg-block">
                <img src="<?php echo esc_url($od_newsletter_title_content_shape_1['url'], 'ordainit-toolkit'); ?>" alt="">
            </div>
            <div class="it-newsletter-shape-2 d-none d-lg-block">
                <img src="<?php echo esc_url($od_newsletter_title_content_shape_2['url'], 'ordainit-toolkit'); ?>" alt="">
            </div>
            <div class="it-newsletter-shape-3 d-none d-xl-block">
                <img src="<?php echo esc_url($od_newsletter_title_content_shape_3['url'], 'ordainit-toolkit'); ?>" alt="">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="it-newsletter-left">
                            <h4 class="it-section-title"><?php echo esc_html($od_newsletter_title_content_title, 'ordainit-toolkit'); ?></h4>
                            <?php if (!empty($od_newsletter_title_content_subtitle)): ?>
                                <span><?php echo esc_html($od_newsletter_title_content_subtitle, 'ordainit-toolkit'); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <?php echo do_shortcode('[contact-form-7  id="' . $od_newsletter_contact_form . '"]'); ?>
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

$widgets_manager->register(new Od_Newsletter());
