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
class OD_Team extends Widget_Base
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
        return 'od-team';
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
        return __('Team', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/team.php');
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
        $od_team_single_thumbnail = $settings['od_team_single_thumbnail'];
        $od_team_single_author = $settings['od_team_single_author'];
        $od_team_single_url = $settings['od_team_single_url'];
        $od_team_single_designation = $settings['od_team_single_designation'];
        $od_team_single_social_lists = $settings['od_team_single_social_lists'];
?>

        <div class="it-team-item">
            <div class="it-team-content text-center">
                <div class="it-team-thumb">
                    <img src="<?php echo esc_url($od_team_single_thumbnail['url'], 'ordainit-toolkit') ?>" alt="">
                </div>
                <div class="it-team-text mb-30">
                    <h3 class="it-team-title">
                        <a href="<?php echo esc_url($od_team_single_url, 'ordainit-toolkit'); ?>"><?php echo esc_html($od_team_single_author, 'ordainit-toolkit') ?></a>
                    </h3>
                    <span class="it-team-designation"><?php echo esc_html($od_team_single_designation, 'ordainit-toolkit') ?></span>
                </div>
                <div class="it-team-social-box">
                    <?php foreach ($od_team_single_social_lists as $od_team_single_social_list) :
                        $social_value = $od_team_single_social_list['od_team_single_social_title']
                    ?>
                        <a href="#"><i class="<?php echo esc_attr($social_value['value'], 'ordainit-toolkit') ?>"></i></a>
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

$widgets_manager->register(new OD_Team());
