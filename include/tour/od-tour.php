<?php
class OdPostTour
{

    public function __construct()
    {
        // Hook into WordPress actions and filters
        add_action('init', [$this, 'register_tour_post_type']);
        add_action('add_meta_boxes', [$this, 'add_tour_price_meta_box']);
        add_action('save_post', [$this, 'save_tour_price_meta_box']);
        add_filter('template_include', [$this, 'tour_template_include']);
    }

    // Filter to include custom single template for the "tour" custom post type
    public function tour_template_include($template)
    {
        if (is_singular('tour')) {
            return $this->get_tour_template('single-tour.php');
        }
        return $template;
    }

    // Function to locate and return the custom template
    public function get_tour_template($template)
    {
        if ($theme_file = locate_template([$template])) {
            // Use the template file from the active theme if it exists
            $file = $theme_file;
        } else {
            // Fallback to plugin's template directory
            $file = plugin_dir_path(__FILE__) . '/' . $template;
        }
        return apply_filters(__FUNCTION__, $file, $template);
    }

    // Register Tour Custom Post Type
    public function register_tour_post_type()
    {
        register_post_type('tour', [
            'label' => 'Tours',
            'public' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'has_archive' => true,
            'rewrite' => ['slug' => 'tours'],
        ]);

        // Register Tour Category Taxonomy
        register_taxonomy('tour_category', 'tour', [
            'label' => 'Tour Categories',
            'hierarchical' => true,
            'show_admin_column' => true,
            'rewrite' => ['slug' => 'tour-category'],
        ]);

        // Register Tour Destination Taxonomy
        register_taxonomy('tour_destination', 'tour', [
            'label' => 'Tour Destinations',
            'hierarchical' => true,
            'show_admin_column' => true,
            'rewrite' => ['slug' => 'tour-destination'],
        ]);
    }

    // Add Meta Box for Tour Pricing
    public function add_tour_price_meta_box()
    {
        add_meta_box(
            'tour_price_meta_box',
            'Tour Pricing',
            [$this, 'tour_price_meta_box_callback'],
            'tour',
            'normal',
            'high'
        );
    }

    // Meta Box Callback to Display Fields
    public function tour_price_meta_box_callback($post)
    {
        $prices = get_post_meta($post->ID, '_tour_prices', true);

        $prices = wp_parse_args($prices, [
            'adults_regular' => '',
            'adults_sale' => '',
            'kids_regular' => '',
            'kids_sale' => '',
            'children_regular' => '',
            'children_sale' => '',
        ]);
?>
        <label>Adults (18+ years): Regular Price</label>
        <input type="number" name="tour_prices[adults_regular]" value="<?php echo esc_attr($prices['adults_regular']); ?>"><br>
        <label>Adults (18+ years): Sale Price</label>
        <input type="number" name="tour_prices[adults_sale]" value="<?php echo esc_attr($prices['adults_sale']); ?>"><br>
        <label>Kids (13+ years): Regular Price</label>
        <input type="number" name="tour_prices[kids_regular]" value="<?php echo esc_attr($prices['kids_regular']); ?>"><br>
        <label>Kids (13+ years): Sale Price</label>
        <input type="number" name="tour_prices[kids_sale]" value="<?php echo esc_attr($prices['kids_sale']); ?>"><br>
        <label>Children (5+ years): Regular Price</label>
        <input type="number" name="tour_prices[children_regular]" value="<?php echo esc_attr($prices['children_regular']); ?>"><br>
        <label>Children (5+ years): Sale Price</label>
        <input type="number" name="tour_prices[children_sale]" value="<?php echo esc_attr($prices['children_sale']); ?>">
<?php
    }

    // Save Meta Box Data
    public function save_tour_price_meta_box($post_id)
    {
        if (isset($_POST['tour_prices'])) {
            update_post_meta($post_id, '_tour_prices', $_POST['tour_prices']);
        }
    }
}

// Initialize the class
new OdPostTour();
