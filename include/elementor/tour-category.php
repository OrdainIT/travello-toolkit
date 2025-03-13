<?php

namespace ordainit_toolkit\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class OD_Tour_Category extends Widget_Base
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
        return 'od-tour-category';
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
        return __('Tour Category', 'ordainit-toolkit');
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
      // Title & Content Section
$this->start_controls_section(
    'od_tour_category_content',
    [
        'label' => __('Category Title & Content', 'ordainit-toolkit'),
    ]
);

// Title
$this->add_control(
    'od_tour_category_title',
    [
        'label' => __('Title', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Title', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your title here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

// Subtitle
$this->add_control(
    'od_tour_category_subtitle',
    [
        'label' => __('Subtitle', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Subtitle', 'ordainit-toolkit'),
        'placeholder' => esc_html__('Type your subtitle here', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);

$this->add_control(
    'od_tour_category_shape',
    [
        'label' => esc_html__('Choose Shape Image', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' =>
            ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/category-shape.png',
        ],
    ]
);

$this->end_controls_section();


// Category List Content
$this->start_controls_section(
    'od_tour_category_content_list',
    [
        'label' => __('Category Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_lists',
    [
        'label' => esc_html__('Category List', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'od_tour_category_list_title',
                'label' => esc_html__('Category Title', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('OD Category Title', 'ordainit-toolkit'),
                'label_block' => true,
            ],
            [
                'name' => 'od_tour_category_list_icon_img',
                'label' => esc_html__('Choose Icon Image', 'ordainit-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>
                    ORDAINIT_TOOLKIT_ADDONS_URL . 'assets/dummy/svg-img/sunbathing.png',
                ],

            ],

        ],
        'default' => [
            [
                'od_tour_category_list_title' => esc_html__('Sunbathing', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Paragliding', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Sports', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Wildlife', 'ordainit-toolkit'),
            ],
            [
                'od_tour_category_list_title' => esc_html__('Windsurfing', 'ordainit-toolkit'),
            ],
        ],
        'title_field' => '{{{ od_tour_category_list_title }}}',
    ]
);

$this->end_controls_section();

// Category Slider settings
$this->start_controls_section(
    'od_tour_category_slider_settings',
    [
        'label' => __('Category Slider Settings', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_slider_autoplay',
    [
        'label' => esc_html__('Autoplay On / Off', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('On', 'ordainit-toolkit'),
        'label_off' => esc_html__('Off', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();

// Arrow Switcher
$this->start_controls_section(
    'od_tour_category_slider_arrow_switcher_section',
    [
        'label' => __('Testimonial Arrow Switcher', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_slider_arrow_switcher',
    [
        'label' => esc_html__('Show / Hide Arrow', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'ordainit-toolkit'),
        'label_off' => esc_html__('Hide', 'ordainit-toolkit'),
        'return_value' => 'yes',
        'default' => 'yes',
    ]
);

$this->end_controls_section();

// Style starts

$this->start_controls_section(
    'od_tour_category_style',
    [
        'label' => __('Category Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'od_tour_category_style_area_bg_color',
    [
        'label' => esc_html__('Category Area BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .black-bg' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_section();

$this->start_controls_section(
    'od_tour_category_heading_style',
    [
        'label' => __('Category Heading Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

//Title Style
$this->add_control(
    'od_tour_category_heading_title_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_tour_category_heading_title_typography',
        'selector' => '{{WRAPPER}} .it-section-title',
    ]
);

//Subtitle Style
$this->add_control(
    'od_tour_category_heading_subtitle_color',
    [
        'label' => esc_html__('Subtitle Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-section-subtitle' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Subtitle Typography', 'ordainit-toolkit'),
        'name' => 'od_tour_category_heading_subtitle_typography',
        'selector' => '{{WRAPPER}} .it-section-subtitle',
    ]
);

$this->end_controls_section();

// Category Content style
$this->start_controls_section(
    'od_tour_category_content_style',
    [
        'label' => __('Category Content Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_tour_category_style_tabs'
);

$this->start_controls_tab(
    'od_tour_category_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_style_title_normal_color',
    [
        'label' => esc_html__('Title Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_icon_box_normal_bg_color',
    [
        'label' => esc_html__('Icon Box BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-icon span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_item_box_normal_bg_color',
    [
        'label' => esc_html__('Item Box BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

//Hover style
$this->start_controls_tab(
    'od_tour_category_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_tour_category_style_title_hover_color',
    [
        'label' => esc_html__('Title Hover Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item:hover .it-categories-title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_icon_box_hover_bg_color',
    [
        'label' => esc_html__('Icon Box Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item:hover .it-categories-icon span' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'od_tour_category_style_item_box_hover_bg_color',
    [
        'label' => esc_html__('Item Box Hover BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-item:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
    'hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

//Title Typo
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Title Typography', 'ordainit-toolkit'),
        'name' => 'od_tour_category_style_title_typography',
        'selector' => '{{WRAPPER}} .it-categories-title',
    ]
);

$this->end_controls_section();


// Arrow Style
$this->start_controls_section(
    'od_tour_category_arrow_style',
    [
        'label' => __('Category Arrow Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs(
    'od_tour_category_arrow_style_tabs'
);

$this->start_controls_tab(
    'od_tour_category_arrow_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_normal_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button' => 'background-color: {{VALUE}}',

        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_normal_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_normal_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();

$this->start_controls_tab(
    'od_tour_category_arrow_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_hover_bg_color',
    [
        'label' => esc_html__('Arrow BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button:hover' => 'background-color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_hover_color',
    [
        'label' => esc_html__('Arrow Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button:hover' => 'color: {{VALUE}}',
        ],
    ]
);
$this->add_control(
    'od_tour_category_arrow_style_hover_border_color',
    [
        'label' => esc_html__('Arrow Border Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-categories-arrow-box button:hover' => 'border-color: {{VALUE}}',
        ],
    ]
);
$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

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
        $od_tour_category_title = $settings['od_tour_category_title'];
        $od_tour_category_subtitle = $settings['od_tour_category_subtitle'];
        $od_tour_category_shape = $settings['od_tour_category_shape'];
        $od_tour_category_slider_arrow_switcher = $settings['od_tour_category_slider_arrow_switcher'];
        $od_tour_category_slider_autoplay = $settings['od_tour_category_slider_autoplay'];
        $od_tour_category_lists = $settings['od_tour_category_lists'];
?>

        <div class="it-categories-area it-categories-pd black-bg">
            <div class="it-categories-wrap p-relative">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-6">
                            <div class="it-categories-title-box mb-55 p-relative">
                                <div class="it-categories-shape d-none d-xl-block">
                                    <span>
                                        <img src="<?php echo esc_url($od_tour_category_shape['url'], 'ordainit-toolkit') ?>" alt="">
                                    </span>
                                </div>
                                <span class="it-section-subtitle"><?php echo esc_html($od_tour_category_subtitle, 'ordainit-toolkit') ?></span>
                                <h3 class="it-section-title"><?php echo esc_html($od_tour_category_title, 'ordainit-toolkit') ?></h3>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <?php if (!empty($od_tour_category_slider_arrow_switcher)) : ?>
                                <div class="it-categories-arrow-box">
                                    <button class="it-cat-prev" tabindex="0">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </button>
                                    <button class="it-cat-next" tabindex="0">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="swiper-container it-categories-active">
                                <div class="swiper-wrapper">
                                    <?php foreach ($od_tour_category_lists as $od_tour_category_list) :
                                        $icon_img_url = $od_tour_category_list['od_tour_category_list_icon_img'];
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="it-categories-item text-center">
                                                <div class="it-categories-icon mb-15">
                                                    <span>
                                                        <img src="<?php echo esc_url($icon_img_url['url'], 'ordainit-toolkit') ?>"
                                                            alt="">

                                                    </span>

                                                </div>
                                                <h3 class="it-categories-title">
                                                    <a href="#"><?php echo esc_html($od_tour_category_list['od_tour_category_list_title'], 'ordainit-toolkit') ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            jQuery(document).ready(function($) {

                const sliderAutoplay = <?php echo $od_tour_category_slider_autoplay ? 'true' : 'false'; ?>;

                const categoriesSwiper = new Swiper('.it-categories-active', {
                    speed: 1000,
                    slidesPerView: 5,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: sliderAutoplay ? {
                        delay: 3000
                    } : false,
                    breakpoints: {
                        '1400': {
                            slidesPerView: 5,
                        },
                        '1200': {
                            slidesPerView: 5,
                        },
                        '992': {
                            slidesPerView: 3,
                        },
                        '768': {
                            slidesPerView: 2,
                        },
                        '576': {
                            slidesPerView: 1,
                        },
                        '0': {
                            slidesPerView: 1,
                        },
                    },
                    navigation: {
                        prevEl: '.it-cat-prev',
                        nextEl: '.it-cat-next',
                    }
                });

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Tour_Category());
