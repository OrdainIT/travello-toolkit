   <?php
    // Get the tour prices meta data
    $tour_prices = get_post_meta(get_the_ID(), '_tour_prices', true);

    $tour_id = get_the_ID();



    // Parse prices with defaults to prevent undefined errors
    $tour_prices = wp_parse_args($tour_prices, [
        'adults_regular' => 0,
        'adults_sale' => 0,
        'kids_regular' => 0,
        'kids_sale' => 0,
        'children_regular' => 0,
        'children_sale' => 0,
    ]);

    // Determine the price to display for each category
    $adults_price = !empty($tour_prices['adults_sale']) ? $tour_prices['adults_sale'] : $tour_prices['adults_regular'];
    $kids_price = !empty($tour_prices['kids_sale']) ? $tour_prices['kids_sale'] : $tour_prices['kids_regular'];
    $children_price = !empty($tour_prices['children_sale']) ? $tour_prices['children_sale'] : $tour_prices['children_regular'];
    // Calculate the total price
    $total_price = $adults_price + $kids_price + $children_price;
    ?>

   <div class="it-discover-right">
       <div class="it-discover-package mb-60">
           <div class="it-discover-package-item">
               <h3 class="it-discover-package-title">Package Details</h3>
               <?php echo $tour_id; ?>
               <div class="it-discover-package-content">
                   <div class="it-discover-package-list d-flex align-items-center">
                       <span>Date</span>
                       <div class="it-discover-package-box d-flex justify-content-between">
                           <span>Select a Date</span>
                           <div class="it-discover-package-icon">
                               <i class="fa-solid fa-calendar-days"></i>
                           </div>
                       </div>
                   </div>

                   <div class="it-discover-package-list d-flex align-items-center">
                       <span>Time</span>
                       <div class="nice-select" tabindex="0">
                           <span class="current">Default sorting</span>
                           <ul class="list">
                               <li data-value="Default Sorting" class="option selected focus">Default sorting</li>
                               <li data-value="Low to Hight" class="option">Low to Hight</li>
                               <li data-value="High to Low" class="option">High to Low</li>
                               <li data-value="New Added" class="option">New Added</li>
                               <li data-value="On Sale" class="option">On Sale</li>
                           </ul>
                       </div>
                   </div>

                   <div class="it-discover-package-list mt-20">
                       <span class="it-discover-tickets">Tickets</span>
                       <div class="it-discover-passenger d-flex align-items-center justify-content-between">
                           <h3 class="it-discover-passenger-categories">

                               <?php echo esc_html__(' Adults (18+years)', 'ordainit-toolkit'); ?>

                               <span>
                                   <?php
                                    // Get the Regular Price and Sale Price from the tour's meta fields
                                    $adults_regular = get_post_meta(get_the_ID(), '_tour_prices', true)['adults_regular'];
                                    $adults_sale = get_post_meta(get_the_ID(), '_tour_prices', true)['adults_sale'];

                                    // Check if both regular and sale prices are empty
                                    if (empty($adults_regular) && empty($adults_sale)) {
                                        echo '<p class="error">Free</p>'; // Error message when both prices are missing
                                    } else {
                                        // Check if Sale Price is available
                                        if (!empty($adults_sale)) {
                                            echo '<del>$' . number_format($adults_regular, 2) . '</del> ';
                                            echo '$' . number_format($adults_sale, 2);
                                        } else {
                                            // If no Sale Price, just display the Regular Price
                                            echo '$' . number_format($adults_regular, 2);
                                        }
                                    }
                                    ?>
                               </span>

                           </h3>
                           <div class="it-discover-passenger-quantity d-flex align-items-center">
                               <span class="it-cart-minus">
                                   <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                               </span>
                               <input class="it-cart-input" type="text" value="1" data-category="adults">
                               <span class="it-cart-plus">
                                   <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                               </span>
                           </div>
                       </div>
                       <div class="it-discover-passenger d-flex align-items-center justify-content-between">
                           <h3 class="it-discover-passenger-categories">
                               <?php echo esc_html__('Kids (13years)', 'ordainit-toolkit'); ?>

                               <span>
                                   <?php
                                    // Get the Kids Regular Price and Sale Price
                                    $kids_regular = get_post_meta(get_the_ID(), '_tour_prices', true)['kids_regular'];
                                    $kids_sale = get_post_meta(get_the_ID(), '_tour_prices', true)['kids_sale'];
                                    // Check if both regular and sale prices are empty
                                    if (empty($kids_regular) && empty($kids_sale)) {
                                        echo '<p class="error">Free</p>'; // Error message when both prices are missing
                                    } else {

                                        // Check if Sale Price is available
                                        if (!empty($kids_sale)) {
                                            // Show Regular Price with Strike-through and Sale Price inside the same span
                                            echo '<del>$' . number_format($kids_regular, 2) . '</del> ';
                                            echo '$' . number_format($kids_sale, 2);
                                        } else {
                                            // If no Sale Price, just display the Regular Price
                                            echo '$' . number_format($kids_regular, 2);
                                        }
                                    }

                                    ?>
                               </span>
                           </h3>
                           <div class="it-discover-passenger-quantity d-flex align-items-center">
                               <span class="it-cart-minus">
                                   <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                               </span>
                               <input class="it-cart-input" type="text" value="1" data-category="kids">
                               <span class="it-cart-plus">
                                   <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                               </span>
                           </div>
                       </div>
                       <div class="it-discover-passenger d-flex align-items-center justify-content-between">
                           <h3 class="it-discover-passenger-categories">
                               <?php echo esc_html__('Children (5+years)', 'ordainit-toolkit'); ?>
                               <span>
                                   <?php
                                    // Get the Children Regular Price and Sale Price
                                    $children_regular = get_post_meta(get_the_ID(), '_tour_prices', true)['children_regular'];
                                    $children_sale = get_post_meta(get_the_ID(), '_tour_prices', true)['children_sale'];

                                    // Check if both regular and sale prices are empty
                                    if (empty($children_regular) && empty($children_sale)) {
                                        echo '<p class="error">Free</p>'; // Error message when both prices are missing
                                    } else {

                                        // Check if Sale Price is available
                                        if (!empty($children_sale)) {
                                            // Show Regular Price with Strike-through and Sale Price inside the same span
                                            echo '<del>$' . number_format($children_regular, 2) . '</del> ';
                                            echo '$' . number_format($children_sale, 2);
                                        } else {
                                            // If no Sale Price, just display the Regular Price
                                            echo '$' . number_format($children_regular, 2);
                                        }
                                    }


                                    ?>
                               </span>
                           </h3>
                           <div class="it-discover-passenger-quantity d-flex align-items-center">
                               <span class="it-cart-minus">
                                   <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                               </span>
                               <input class="it-cart-input" type="text" value="1" data-category="children">
                               <span class="it-cart-plus">
                                   <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                               </span>
                           </div>
                       </div>
                   </div>

                   <div class="it-discover-package-service mb-30">
                       <h3 class="it-discover-service-title mb-35">Additional Service</h3>
                       <div class="it-discover-service-item d-flex align-items-center justify-content-between">
                           <div class="it-discover-service-checkbox d-flex align-items-center">
                               <input type="checkbox">
                               <span>Additional Guide</span>
                           </div>
                           <div class="it-discover-service-price">
                               <span>$420</span>
                           </div>
                       </div>
                       <div class="it-discover-service-item d-flex align-items-center justify-content-between">
                           <div class="it-discover-service-checkbox d-flex align-items-center">
                               <input type="checkbox">
                               <span>Internet</span>
                           </div>
                           <div class="it-discover-service-price">
                               <span>$420</span>
                           </div>
                       </div>
                       <div class="it-discover-service-item d-flex align-items-center justify-content-between">
                           <div class="it-discover-service-checkbox d-flex align-items-center">
                               <input type="checkbox">
                               <span>Photography</span>
                           </div>
                           <div class="it-discover-service-price">
                               <span>$420</span>
                           </div>
                       </div>
                   </div>

                   <div class="it-discover-package-total">
                       <h3 class="it-discover-package-total-text mb-30">
                           Total Cost: <span id="total-cost"><?php echo $total_price; ?></span> / Person
                       </h3>


                       <div class="it-discover-package-proceed">




                           <button type="submit" id="proceed-to-book" class="it-btn-primary">Proceed to Book</button>
                       </div>
                   </div>


               </div>
           </div>
       </div>

       <div class="it-discover-info mb-60">
           <h3 class="it-discover-package-title">Tour Information</h3>
           <div class="it-discover-info-box">
               <div class="it-discover-info-item d-flex align-items-center">
                   <div class="it-discover-info-icon">
                       <i class="fa-solid fa-users"></i>
                   </div>
                   <div class="it-discover-info-text">
                       <span class="it-discover-info-subtitle">Max Guests</span>
                       <h5>Date</h5>
                   </div>
               </div>
               <div class="it-discover-info-item d-flex align-items-center">
                   <div class="it-discover-info-icon">
                       <i class="fa-solid fa-users"></i>
                   </div>
                   <div class="it-discover-info-text">
                       <span class="it-discover-info-subtitle">Min Age</span>
                       <h5>12+</h5>
                   </div>
               </div>
               <div class="it-discover-info-item d-flex align-items-center">
                   <div class="it-discover-info-icon">
                       <i class="fa-solid fa-plane-departure"></i>
                   </div>
                   <div class="it-discover-info-text">
                       <span class="it-discover-info-subtitle">Tour Location</span>
                       <h5>America</h5>
                   </div>
               </div>
               <div class="it-discover-info-item d-flex align-items-center">
                   <div class="it-discover-info-icon">
                       <i class="fa-solid fa-globe"></i>
                   </div>
                   <div class="it-discover-info-text">
                       <span class="it-discover-info-subtitle">Languages Support</span>
                       <h5>Global</h5>
                   </div>
               </div>
           </div>
       </div>

       <div class="it-discover-deals">
           <h3 class="it-discover-package-title">Last Minute Deals</h3>
           <div class="it-discover-deals-box">
               <div class="it-discover-deals-item">
                   <div class="it-discover-deals-content d-flex align-items-center">
                       <div class="it-discover-deals-thumb">
                           <a href="#">
                               <img src="assets/img/inner-page/discover/discover-sidebar-1-1.jpg" alt="">
                           </a>
                       </div>
                       <div class="it-discover-deals-dsc">
                           <div class="it-discover-deals-rating">
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <h3 class="it-discover-deals-text">
                               <a href="#">Iconic Landmark Connecting History and</a>
                           </h3>
                           <span class="it-discover-deals-price">From <span>$129.00</span></span>
                       </div>
                   </div>
               </div>
               <div class="it-discover-deals-item">
                   <div class="it-discover-deals-content d-flex align-items-center">
                       <div class="it-discover-deals-thumb">
                           <a href="#">
                               <img src="assets/img/inner-page/discover/discover-sidebar-1-2.jpg" alt="">
                           </a>
                       </div>
                       <div class="it-discover-deals-dsc">
                           <div class="it-discover-deals-rating">
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <h3 class="it-discover-deals-text">
                               <a href="#">Unveiling the Serenity of Maldivian Islands</a>
                           </h3>
                           <span class="it-discover-deals-price">From <span>$129.00</span></span>
                       </div>
                   </div>
               </div>
               <div class="it-discover-deals-item">
                   <div class="it-discover-deals-content d-flex align-items-center">
                       <div class="it-discover-deals-thumb">
                           <a href="#">
                               <img src="assets/img/inner-page/discover/discover-sidebar-1-3.jpg" alt="">
                           </a>
                       </div>
                       <div class="it-discover-deals-dsc">
                           <div class="it-discover-deals-rating">
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                               <span><i class="fa-solid fa-star"></i></span>
                           </div>
                           <h3 class="it-discover-deals-text">
                               <a href="#">Vibrant Helsinki, A Fusion of Culture and Cuisine</a>
                           </h3>
                           <span class="it-discover-deals-price">From <span>$129.00</span></span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>