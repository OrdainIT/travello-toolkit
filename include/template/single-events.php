<?php get_header();

// Get the current post ID
$event_id = get_the_ID();
$event_meta = get_post_meta($event_id);

$travello_event_expolore_options = get_post_meta($event_id, 'travello_events_expolore_options', true);
$travello_extra_options = get_post_meta($event_id, 'travello_events_extra_meta_options', true);

$event_expolore_title = $travello_event_expolore_options['event_expolore_title'];
$event_expolore_content = $travello_event_expolore_options['event_expolore_content'];
$event_expolore_content_img = $travello_event_expolore_options['event_expolore_content_img'];


$event_date_title = $travello_extra_options['event_date_title'];
$event_date = $travello_extra_options['event_date'];
$event_location_title = $travello_extra_options['event_location_title'];
$event_location = $travello_extra_options['event_location'];
$event_time = $travello_extra_options['event_time'];
$event_button_text = $travello_extra_options['event_button_text'];
$event_button_url = $travello_extra_options['event_button_url'];
$event_location_switcher = $travello_extra_options['event_location_switcher'];
$event_date_switcher = $travello_extra_options['event_date_switcher'];











?>

<?php //var_dump($travello_extra_options); 
?>
<!-- start events-details area  -->
<div class="it-events-details-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="it-events-details-thumb text-md-center mr-40">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="it-events-details-content">

                    <h3 class="it-section-title mb-25"><?php the_title(); ?></h3>
                    <div class="it-events-details-info mb-30">
                        <div class="row align-items-center">
                            <?php if (!empty($event_date_switcher)): ?>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="it-events-details-info-wrap">
                                        <div class="it-events-details-info-box d-flex align-items-center">
                                            <div class="it-events-details-info-icon">
                                                <i class="fa-light fa-calendar"></i>
                                            </div>
                                            <div class="it-events-details-info-content">
                                                <h3 class="it-events-details-info-title"><?php echo esc_html($event_date_title, 'ordainit-toolkit'); ?></h3>
                                                <span><?php echo esc_html($event_date, 'travello'); ?> <br><?php echo esc_html($event_time, 'travello'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($event_location_switcher)): ?>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="it-events-details-info-wrap">
                                        <div class="it-events-details-info-box d-flex align-items-center">
                                            <div class="it-events-details-info-icon">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="it-events-details-info-content">
                                                <h3 class="it-events-details-info-title"><?php echo esc_html($event_location_title, 'travello'); ?> </h3>
                                                <span><?php echo esc_html($event_location, 'travello'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php the_content(); ?>
                    <div class="it-events-btn mb-40">
                        <a href="<?php echo esc_url($event_button_url, 'ordainit-toolkit'); ?>" class="it-btn-primary">
                            <span><?php echo esc_html($event_button_text, 'ordainit-toolkit'); ?>
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <?php if (!empty($event_date_switcher)): ?>
                        <div class="it-events-details-link">
                            <div class="it-events-details-link-content d-sm-flex align-items-center">
                                <div class="it-events-details-lunch d-flex align-items-center">
                                    <div class="it-events-details-lunch-icon">
                                        <i class="fa-light fa-calendar"></i>
                                    </div>
                                    <span><?php echo esc_html($event_date, 'travello'); ?> <?php echo esc_html($event_time, 'travello'); ?></span>
                                </div>
                                <div class="it-events-details-lunch d-flex align-items-center">
                                    <div class="it-events-details-lunch-icon">
                                        <i class="fa-regular fa-globe"></i>
                                    </div>
                                    <span>
                                        <a href="<?php echo esc_url($event_button_url, 'ordainit-toolkit'); ?>"><?php echo esc_url($event_button_url, 'ordainit-toolkit'); ?></a>
                                    </span>
                                </div>
                                <div class="it-events-details-bars">
                                    <button>
                                        <i class="fa-regular fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="it-events-details-bottom pt-40">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="it-events-details-content">
                        <h3 class="it-section-title mb-20"><?php echo esc_html__($event_expolore_title, 'ordainit-toolkit'); ?></h3>
                        <?php echo od_kses($event_expolore_content, 'ordainit-toolkit')
                        ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="it-events-details-thumb d-flex justify-content-end">
                        <img src="<?php echo esc_url($event_expolore_content_img['url']); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end events-details area  -->


<?php get_footer();
