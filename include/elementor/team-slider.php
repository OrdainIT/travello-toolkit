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
class OD_Team_Slider extends Widget_Base
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
        return 'od-team-slider';
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
        return __('Team Slider', 'ordainit-toolkit');
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
        include_once(ORDAINIT_TOOLKIT_ELEMENTS_PATH . '/control/team-slider.php');
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
        $od_team_slider_autoplay = $settings['od_team_slider_autoplay'];
        $od_team_lists = $settings['od_team_lists'];
?>
        <?php if ($settings['od_design_style']  == 'layout-2'): ?>

            <div class="it-team-style-3">
                <div class="swiper-container it-team-3-active">
                    <div class="swiper-wrapper text-center text-sm-start">
                        <?php foreach ($od_team_lists as $od_team_list):
                            $team_thumbnail_url = $od_team_list['od_team_list_thumbnail'];
                        ?>
                            <div class="swiper-slide">
                                <div class="it-team-3-item">
                                    <div class="it-team-3-thumb mb-25">
                                        <img
                                            src="<?php echo esc_url($team_thumbnail_url['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_html($od_testimonial_list['od_team_list_author']); ?>">
                                    </div>
                                    <div class="it-team-3-content">
                                        <h3 class="it-team-title">
                                            <a href="<?php echo esc_url($od_team_list['od_team_list_url']); ?>"><?php echo esc_html($od_team_list['od_team_list_author']); ?></a>
                                        </h3>
                                        <span class="it-team-designation"><?php echo esc_html($od_team_list['od_team_list_designation']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="swiper-container it-team-active">
                <div class="swiper-wrapper">
                    <?php foreach ($od_team_lists as $od_team_list):
                        $team_thumbnail_url = $od_team_list['od_team_list_thumbnail'];
                    ?>
                        <div class="swiper-slide">
                            <div class="it-team-item">
                                <div class="it-team-content text-center">
                                    <div class="it-team-thumb">
                                        <img
                                            src="<?php echo esc_url($team_thumbnail_url['url'], 'ordainit-toolkit'); ?>"
                                            alt="<?php echo esc_html($od_testimonial_list['od_team_list_author']); ?>">
                                    </div>
                                    <div class="it-team-text mb-30">
                                        <h3 class="it-team-title">
                                            <a href="<?php echo esc_url($od_team_list['od_team_list_url']); ?>"><?php echo esc_html($od_team_list['od_team_list_author']); ?></a>
                                        </h3>
                                        <span class="it-team-designation"><?php echo esc_html($od_team_list['od_team_list_designation']); ?></span>
                                    </div>
                                    <div class="it-team-social-box">
                                        <a href="<?php echo esc_url($od_team_list['od_team_list_facebook_url']); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="<?php echo esc_url($od_team_list['od_team_list_twitter_url']); ?>"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="<?php echo esc_url($od_team_list['od_team_list_skype_url']); ?>"><i class="fa-brands fa-skype"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif; ?>



        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_team_slider_autoplay ? 'true' : 'false'; ?>;
                const sliderAutoplay2 = <?php echo $od_team_slider_autoplay ? 'true' : 'false'; ?>;

                // Team Layout - 01
                const innerTeamSwiper = new Swiper('.it-team-active', {
                    speed: 1000,
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 3,
                        },
                        '1200': {
                            slidesPerView: 3,
                        },
                        '992': {
                            slidesPerView: 3,
                        },
                        '768': {
                            slidesPerView: 2,
                        },
                        '576': {
                            slidesPerView: 2,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                });


                // Team layout - 2
                const innerTeam3Swiper = new Swiper('.it-team-3-active', {
                    speed: 1000,
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay2 ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 4,
                        },
                        '1200': {
                            slidesPerView: 4,
                        },
                        '992': {
                            slidesPerView: 3,
                        },
                        '768': {
                            slidesPerView: 3,
                        },
                        '576': {
                            slidesPerView: 2,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                });


            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Team_Slider());
