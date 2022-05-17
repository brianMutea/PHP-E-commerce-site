const dropContainers = document.querySelectorAll(".drop-container");
const dropdownItems = document.querySelectorAll(".drop-down-items");
const chevronArrow = document.querySelector(".fa-chevron-down");
const accountHolder = document.querySelector(".account-info-holder");
const appHelp = document.querySelector(".app-help");
const cart = document.querySelector(".cart");
const addToCart = document.querySelectorAll("[data-add-to-cart]");
const addToBag = document.querySelector("#add-to-bag");
const overlay = document.querySelector(".overlay");
const dropAccItem = document.querySelector("#account-info-holder");
const appHelpId = document.querySelector("#app-help");
const cartId = document.querySelector("#cart");

// addToCart.forEach((cartbtn) => {
//   cartbtn.addEventListener("click", () => {
//     cartId.classList.add("show-items");

//     setTimeout(() => {
//       cartId.classList.remove("show-items");
//     }, 2000);
//   });
// });

const toggleItems = function (element) {
  if (element.classList.contains("show-items")) {
    element.classList.remove("show-items");
    // chevronArrow.style.display = "none";
  } else {
    element.classList.add("show-items");
    // chevronArrow.style.display = "block";
  }
};

accountHolder.addEventListener("click", () => {
  toggleItems(dropAccItem);
  const chevronArrow = accountHolder.querySelector(".fa-chevron-down");
  if (chevronArrow.classList.contains("chev-rotate")) {
    chevronArrow.classList.remove("chev-rotate");
  } else {
    chevronArrow.classList.add("chev-rotate");
  }
});

appHelp.addEventListener("click", () => {
  toggleItems(appHelpId);
  const chevronArrow = appHelp.querySelector(".fa-chevron-down");
  if (chevronArrow.classList.contains("chev-rotate")) {
    chevronArrow.classList.remove("chev-rotate");
  } else {
    chevronArrow.classList.add("chev-rotate");
  }
});
cart.addEventListener("click", () => {
  toggleItems(cartId);
});
const mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// const cartStatus = document.querySelector("#cart_status");
// setTimeout(hidecartsatus, 2000);

// function hidecartsatus() {
//   cartStatus.style.display = "none";
// }

// const forms = document.querySelectorAll("form");
// forms.forEach((e) => {
//   e.addEventListener("click", function (event) {
//     event.preventDefault();
//   });
// });

// ADDING TO CART FUNCTIONALITY

$(document).ready(function () {
  $(document).on("click", "[data-add-to-cart]", function (e) {
    e.preventDefault();
    console.log("hey");
    let form = $(this).closest(".form-submit");
    let id = form.find(".p_id").val();
    let name = form.find(".p_name").val();
    let price = form.find(".p_price").val();
    let init_price = form.find(".p_init_price").val();
    let pImage = form.find(".p_image").val();
    let code = form.find(".p_code").val();
    // console.log(form, id, name, price, init_price, pImage, code);

    $.ajax({
      url: "cartaction.php",
      method: "post",
      data: {
        p_id: id,
        p_name: name,
        p_price: price,
        p_init_price: init_price,
        p_image: pImage,
        p_code: code,
      },
      success: function (response) {
        $("#alert-cart-message").html(response);
        $("#alert-cart-message").css("display", "block");
        $("#alert-cart-message").delay(3500).fadeOut("fast");
        // window.scrollTo(0, 0);
        load_cart_item_number();
      },
    });
  });

  load_cart_item_number();

  function load_cart_item_number() {
    $.ajax({
      url: "cartaction.php",
      method: "get",
      data: { cartItem: "cart_item" },
      success: function (response) {
        $("#cart-counter").html(response);
      },
    });
  }

  // for the spinner input
  let maxBound = 20;
  function disableBtn(btn) {
    $(btn).attr("disabled", true);
    $(btn).css({
      background: "rgb(223, 201, 3)",
      cursor: "not-allowed",
    });
  }
  $(" #decrease_quant ").on("click", function () {
    let inputField = $(this).closest(".operations").find(".item_quantity");
    let prev = parseInt(inputField.val());

    if (prev > 1) {
      let prevVal = --prev;
      inputField.val(prevVal);
    }
    if (prev === 1) {
      inputField.val(1);

      disableBtn("#decrease_quant");
    }
    if (prev < maxBound) {
      $("#increase_quant").attr("disabled", false);
      $("#increase_quant").css({
        background: "",
        cursor: "",
      });
    }
  });
  $(" #increase_quant ").on("click", function () {
    let inputField = $(this).closest(".operations").find(".item_quantity");
    let inc = parseInt(inputField.val());

    if (inc != maxBound) {
      let incVal = ++inc;
      inputField.val(incVal);
    }
    if (inc === maxBound) {
      inputField.val(maxBound);

      disableBtn("#increase_quant");
    }
    if (inc > 1) {
      $("#decrease_quant").attr("disabled", false);
      $("#decrease_quant").css({
        background: "",
        cursor: "",
      });
    }
  });

  // Updating Item Quantity in Cart

  $(".item_quantity").on("change", function () {
    console.log("Hey");
    let hide = $(this).closest(".operations");
    let id = hide.find(".p_id").val();
    let price = hide.find(".p_price").val();
    let quantity = hide.find(".item_quantity").val();

    $.ajax({
      url: "cartaction.php",
      method: "post",
      cache: false,
      data: { p_quantity: quantity, p_id: id, p_price: price },
      success: function (response) {
        setInterval("location.reload()", 2000);
        $(".small-loader").css({ display: "flex" });
      },
    });
  });
});
