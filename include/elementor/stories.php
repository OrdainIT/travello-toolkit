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
class OD_Stories extends Widget_Base
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
        return 'od-stories';
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
        return __('Stories', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/stories.php');
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
        $od_stories_title = $settings['od_stories_title'];
        $od_stories_subtitle = $settings['od_stories_subtitle'];
        $od_stories_masonry_tabs = $settings['od_stories_masonry_tabs'];
        $od_stories_masonry_items = $settings['od_stories_masonry_items'];
?>


        <div class="it-stories-area p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="it-stories-title-box mb-20 text-center">
                            <span class="it-section-subtitle"><?php echo esc_html($od_stories_subtitle, 'ordainit-toolkit') ?></span>
                            <h3 class="it-section-title"><?php echo esc_html($od_stories_title, 'ordainit-toolkit') ?></h3>
                        </div>
                        <div class="masonary-menu mb-80 d-md-flex justify-content-md-center">
                            <?php foreach ($od_stories_masonry_tabs as $index => $od_stories_masonry_tab): ?>
                                <button
                                    class="<?php echo esc_attr($index === 0 ? 'active' : ''); ?>"
                                    data-filter="<?php echo $od_stories_masonry_tab['od_stories_masonry_tab_filter'] === '*'
                                                        ? esc_attr($od_stories_masonry_tab['od_stories_masonry_tab_filter'])
                                                        : '.' . esc_attr($od_stories_masonry_tab['od_stories_masonry_tab_filter']); ?>">
                                    <?php echo esc_html($od_stories_masonry_tab['od_stories_masonry_tab_name']); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row grid">

                    <?php foreach ($od_stories_masonry_items as $od_stories_masonry_item): ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 <?php echo esc_attr($od_stories_masonry_item['od_stories_masonry_item_category'], 'ordainit-toolkit'); ?> grid-item">
                            <div class="it-stories-item mb-30 p-relative">
                                <div class="it-stories-thumb mb-30">
                                    <img src="<?php echo esc_url($od_stories_masonry_item['od_stories_masonry_item_image']['url'], 'ordainit-toolkit'); ?>"
                                        alt="<?php echo esc_attr($od_stories_masonry_item['od_stories_masonry_item_title'], 'ordainit-toolkit'); ?>">
                                </div>
                                <div class="it-stories-content">
                                    <div class="it-stories-meta-box mb-25 d-flex align-items-center">
                                        <span class="it-stories-categories">
                                            <?php echo esc_html($od_stories_masonry_item['od_stories_masonry_item_subtitle'], 'ordainit-toolkit'); ?>
                                        </span>
                                        <span class="it-stories-meta-text">
                                            <?php echo esc_html($od_stories_masonry_item['od_stories_masonry_item_published_date'], 'ordainit-toolkit'); ?>
                                        </span>
                                    </div>
                                    <h3 class="it-stories-title">
                                        <a
                                            href="<?php echo esc_url($od_stories_masonry_item['od_stories_masonry_item_url'], 'ordainit-toolkit') ?>">
                                            <?php echo esc_html($od_stories_masonry_item['od_stories_masonry_item_title'], 'ordainit-toolkit'); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

$widgets_manager->register(new OD_Stories());
