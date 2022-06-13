$(document).ready(function () {
  // owl carousel
  $("#banner-area .owl-carousel").owlCarousel({
    dots: true,
    items: 1,
  });

  //top-sale
  $("#top-sale .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });
  //isotope filter
  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
  });

  //filter on btn click
  $(".button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });
});

// product qty section
// let QTY_UP = document.querySelectorAll(`.qty-up`);
// let QTY_DOWN = document.querySelectorAll(".qty-down");
// const INPUT = document.querySelector(".qty_input");

//loop through it all
Array.from(document.querySelectorAll(`.qty-up`)).forEach((element) => {
  element.addEventListener("click", (e) => {
    let dataset = element.dataset.id;

    let input = document.querySelector(`.qty_input[data-id = "${dataset}"]`);

    if (input.value >= 1 && input.value < 10) {
      input.value++;
    }
  });
});
Array.from(document.querySelectorAll(".qty-down")).forEach((element) => {
  element.addEventListener("click", () => {
    let dataset = element.dataset.id;

    let input = document.querySelector(`.qty_input[data-id= "${dataset}"]`);
    if (input.value > 1) {
      input.value--;
    }
  });
});
// QTY_DOWN.addEventListener("click", (e) => {
//   let input = document.querySelector(`.qty_input[data-id]`);
//   if (input.value > 1) {
//     input.value--;
//   }
// });
