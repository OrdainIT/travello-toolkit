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
class OD_Button extends Widget_Base
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
        return 'od-button';
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
        return __('Button', 'ordainit-toolkit');
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

// Button Type Section
$this->start_controls_section(
    'od_btn_type',
    [
        'label' => __('Button Types', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_class',
    [
        'label' => __('Button Type', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'it-btn-primary' => __('Primary', 'ordainit-toolkit'),
            'it-btn-secondary' => __('Secondary', 'ordainit-toolkit'),
        ],
        'default' => 'it-btn-primary',
        'label_block' => true,
    ]
);

$this->end_controls_section();

// Button Content Section
$this->start_controls_section(
    'od_btn_content',
    [
        'label' => __('Button Content', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_text',
    [
        'label' => esc_html__('Button Text', 'ordainit-toolkit'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('OD Button', 'ordainit-toolkit'),
        'title' => esc_html__('Enter button text', 'ordainit-toolkit'),
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_link_type',
    [
        'label' => esc_html__('Button Link Type', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT,
        'options' => [
            '1' => 'Custom Link',
            '2' => 'Internal Page',
        ],
        'default' => '1',
        'label_block' => true,
    ]
);

$this->add_control(
    'od_btn_link',
    [
        'label' => esc_html__('Button link', 'ordainit-toolkit'),
        'type' => Controls_Manager::URL,
        'dynamic' => [
            'active' => true,
        ],
        'placeholder' => esc_html__('htods://your-link.com', 'ordainit-toolkit'),
        'show_external' => false,
        'default' => [
            'url' => '#',
            'is_external' => true,
            'nofollow' => true,
            'custom_attributes' => '',
        ],
        'condition' => [
            'od_btn_link_type' => '1',
        ],
        'label_block' => true,
    ]
);
$this->add_control(
    'od_btn_page_link',
    [
        'label' => esc_html__('Select Button Page', 'ordainit-toolkit'),
        'type' => Controls_Manager::SELECT2,
        'label_block' => true,
        'options' => od_get_all_pages(),
        'condition' => [
            'od_btn_link_type' => '2',
        ]
    ]
);

$this->end_controls_section();

// Style Section Starts
$this->start_controls_section(
    'od_btn_style',
    [
        'label' => __('Button Style', 'ordainit-toolkit'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_responsive_control(
    'od_btn_padding',
    [
        'label' => esc_html__('Button Padding', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => '20',
            'right' => '30',
            'bottom' => '20',
            'left' => '30',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .it-btn-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);


$this->add_control(
    'od_btn_border_radius',
    [
        'label' => esc_html__('Border Radius', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em', 'rem'],
        'default' => [
            'top' => '5',
            'right' => '5',
            'bottom' => '5',
            'left' => '5',
            'unit' => 'px',
        ],
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            '{{WRAPPER}} .it-btn-secondary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);



$this->start_controls_tabs(
    'od_btn_style_tabs'
);

$this->start_controls_tab(
    'od_btn_style_normal_tab',
    [
        'label' => esc_html__('Normal', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_normal_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_btn_style_normal_bgcolor',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary' => 'background-color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'od_btn_style_hover_tab',
    [
        'label' => esc_html__('Hover', 'ordainit-toolkit'),
    ]
);

$this->add_control(
    'od_btn_style_hover_color',
    [
        'label' => esc_html__('Button Text Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary:hover' => 'color: {{VALUE}};',
        ],
    ]
);
$this->add_control(
    'od_btn_style_hover_bgcolor',
    [
        'label' => esc_html__('Button BG Color', 'ordainit-toolkit'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .it-btn-primary:hover' => 'background-color: {{VALUE}};',
            '{{WRAPPER}} .it-btn-secondary:hover' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'label' => esc_html__('Button Typography', 'ordainit-toolkit'),
        'name' => 'od_button_typography',
        'selector' => '{{WRAPPER}} .it-btn-primary, {{WRAPPER}} .it-btn-secondary',
    ]
);



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
        $od_btn_class = $settings['od_btn_class'];
        $od_btn_text = $settings['od_btn_text'];
        $od_btn_link_type = $settings['od_btn_link_type'];
        $od_btn_link = $settings['od_btn_link'];
        $od_btn_page_link = $settings['od_btn_page_link'];
?>
        <?php
        // Link
        if ('2' == $od_btn_link_type) {
            $this->add_render_attribute('od-button-arg', 'href', get_permalink($od_btn_page_link));
            $this->add_render_attribute('od-button-arg', 'target', '_self');
            $this->add_render_attribute('od-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('od-button-arg', 'class', esc_attr($od_btn_class));
        } else {
            if (! empty($od_btn_link['url'])) {
                $this->add_link_attributes('od-button-arg', $od_btn_link);
                $this->add_render_attribute('od-button-arg', 'class', esc_attr($od_btn_class));
            }
        }
        ?>

        <a <?php echo $this->get_render_attribute_string('od-button-arg'); ?>>
            <?php echo esc_html($od_btn_text, 'ordainit-toolkit') ?>
        </a>


        <script>
            jQuery(document).ready(function($) {

            });
        </script>
<?php
    }
}

$widgets_manager->register(new OD_Button());
