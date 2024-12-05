document.addEventListener("DOMContentLoaded", function () {
  const quantityInputs = document.querySelectorAll(".it-cart-input");
  const totalCostElement = document.getElementById("total-cost");
  const proceedToBookButton = document.getElementById("proceed-to-book");

  let totalCost = 0;

  // Dynamic prices passed from PHP (this object should be available globally)
  const prices = dynamicPrices;

  // Function to calculate total cost
  function calculateTotal() {
    totalCost = 0;

    quantityInputs.forEach((input) => {
      const quantity = parseInt(input.value) || 0;
      const category = input.dataset.category;

      if (category && prices[category]) {
        // Use sale price if available, otherwise use regular price
        const price =
          parseFloat(prices[category].sale) ||
          parseFloat(prices[category].regular) ||
          0;
        totalCost += price * quantity;
      }
    });

    totalCostElement.textContent = `$${totalCost.toFixed(2)}`;
  }

  // Function to gather ticket quantities
  function getTicketQuantities() {
    let quantities = {};
    quantityInputs.forEach((input) => {
      const category = input.dataset.category;
      const quantity = parseInt(input.value) || 0;
      if (category) {
        quantities[category] = quantity;
      }
    });
    return quantities;
  }

  // Add event listeners for quantity input changes
  quantityInputs.forEach((input) => {
    input.addEventListener("input", calculateTotal);
  });

  // Handle Proceed to Book button click
  proceedToBookButton.addEventListener("click", function () {
    if (totalCost > 0) {
      const quantities = getTicketQuantities();

      // Send data to PHP via AJAX
      jQuery.ajax({
        url: odTourajaxData.ajax_url, // Ensure the AJAX URL is correctly localized
        method: "POST",
        data: {
          action: "add_to_wc_cart",
          security: odTourajaxData.nonce, // Ensure nonce is properly localized
          adults_quantity: quantities.adults || 0,
          kids_quantity: quantities.kids || 0,
          children_quantity: quantities.children || 0,
          prices: prices,
        },
        success: function (response) {
          if (response.success) {
            // Redirect directly to the WooCommerce checkout page
            window.location.href = wc_checkout_params.checkout_url;
          } else {
            alert("Something went wrong. Please try again.");
          }
        },
        error: function () {
          alert("An error occurred while processing your request.");
        },
      });
    } else {
      alert("Please select at least one ticket to proceed.");
    }
  });

  // Initial calculation when the page loads
  calculateTotal();
});
