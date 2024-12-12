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
class OD_Portfolio extends Widget_Base
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
        return 'od-portfolio';
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
        return __('Portfolio', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/portfolio.php');
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
        $od_portfolio_title = $settings['od_portfolio_title'];
        $od_portfolio_subtitle = $settings['od_portfolio_subtitle'];
        $od_portfolio_masonry_tabs = $settings['od_portfolio_masonry_tabs'];
        $od_portfolio_masonry_items = $settings['od_portfolio_masonry_items'];
?>


        <div class="it-portfolio-area it-inner-destination">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-6 col-lg-6">
                        <div class="it-portfolio-title-box">
                            <span class="it-section-subtitle"><?php echo esc_html($od_portfolio_subtitle, 'ordainit-toolkit') ?></span>
                            <h3 class="it-section-title"><?php echo esc_html($od_portfolio_title, 'ordainit-toolkit') ?></h3>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="it-portfolio-filter text-lg-end">
                            <div class="masonary-menu">

                                <?php foreach ($od_portfolio_masonry_tabs as $index => $od_portfolio_masonry_tab): ?>
                                    <button
                                        class="<?php echo esc_attr($index === 0 ? 'active' : ''); ?>"
                                        data-filter="<?php echo $od_portfolio_masonry_tab['od_portfolio_masonry_tab_filter'] === '*'
                                                            ? esc_attr($od_portfolio_masonry_tab['od_portfolio_masonry_tab_filter'])
                                                            : '.' . esc_attr($od_portfolio_masonry_tab['od_portfolio_masonry_tab_filter']); ?>">
                                        <?php echo esc_html($od_portfolio_masonry_tab['od_portfolio_masonry_tab_name']); ?>
                                    </button>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="it-portfolio-wrap mt-65">
                    <div class="row grid">
                        <?php foreach ($od_portfolio_masonry_items as $od_portfolio_masonry_item): ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 <?php echo esc_attr($od_portfolio_masonry_item['od_portfolio_masonry_item_category'], 'ordainit-toolkit'); ?> grid-item">
                                <div class="it-dest-item">
                                    <div class="it-dest-thumb fix mb-20">
                                        <img src="<?php echo esc_url($od_portfolio_masonry_item['od_portfolio_masonry_item_image']['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_attr($od_portfolio_masonry_item['od_portfolio_masonry_item_title'], 'ordainit-toolkit'); ?>">
                                    </div>
                                    <div class="it-dest-content d-flex align-items-center justify-content-between">
                                        <div class="it-dest-text">
                                            <h3 class="it-dest-title">
                                                <a href="<?php echo esc_url($od_portfolio_masonry_item['od_portfolio_masonry_item_url'], 'ordainit-toolkit') ?>">
                                                    <?php echo esc_html($od_portfolio_masonry_item['od_portfolio_masonry_item_title'], 'ordainit-toolkit'); ?></a>
                                            </h3>
                                            <span><?php echo esc_html($od_portfolio_masonry_item['od_portfolio_masonry_item_subtitle'], 'ordainit-toolkit'); ?></span>
                                        </div>
                                        <div class="it-dest-icon">
                                            <a href="<?php echo esc_url($od_portfolio_masonry_item['od_portfolio_masonry_item_url'], 'ordainit-toolkit') ?>">
                                                <i class="fa-regular fa-arrow-right-long"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

$widgets_manager->register(new OD_Portfolio());
